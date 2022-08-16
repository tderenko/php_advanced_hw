<?php


namespace classes;


class User
{
    protected int $id = 0;
    public string $name;
    public string $surname;
    public int $age;
    public string $email;

    protected \PDO $db;
    protected array $log = [];

    public function __construct()
    {
        global $dbConnection;
        $this->db = $dbConnection;
    }

    public function getId()
    {
        return $this->id;
    }

    public function tableExist(): bool
    {
        $query = $this->db->prepare('SHOW TABLES LIKE "users"');
        $query->execute();
        return boolval($query->fetch());
    }

    public function createTable(): void
    {
        $this->db->exec("
        CREATE TABLE IF NOT EXISTS users(
            id BIGINT PRIMARY KEY AUTO_INCREMENT,
            name VARCHAR(50) NOT NULL,
            surname VARCHAR(100) NOT NULL,
            age TINYINT NOT NULL,
            email VARCHAR(250) NOT NULL UNIQUE 
        )
        ");
    }

    public function dropTable(): void
    {
        $this->db->exec("
        DROP TABLE IF EXISTS users;
        ");
    }

    public function validate(array $data): bool
    {
        if ($missFields = array_diff(['name', 'surname', 'age', 'email'], array_keys($data))) {
            $this->log[] = 'You pass incorrect count of fields! You miss ' . implode(', ', $missFields);
            return false;
        }

        foreach ($data as $key => $value) {
            $valid = match ($key) {
                'name', 'surname' => is_string($value) && trim($value),
                'email' => filter_var($value, FILTER_VALIDATE_EMAIL),
                'age' => is_numeric($value) && $value > 0 && $value < 120,
                default => true
            };
            if (!$valid) {
                $this->log[] = "The field $key \"$value\" is incorrect!!!";
                return false;
            }
        }
        return true;
    }

    public function getAll()
    {
        $query = $this->db->prepare('SELECT * FROM users');
        $query->execute();
        return $query->fetchAll(\PDO::FETCH_CLASS, self::class);
    }

    public function addUser(array $data)
    {
        if (!$this->validate($data)) {
            throw new \InvalidArgumentException("You pass incorrect fields! Please try again! \n" . implode("\n", $this->log));
        }

        $query = $this->db->prepare("
            INSERT INTO users (`name`, `surname`, `age`, `email`) 
            VALUES (:name, :surname, :age, :email)
            ");

        $query->bindParam('name', $data['name']);
        $query->bindParam('surname', $data['surname']);
        $query->bindParam('age', $data['age']);
        $query->bindParam('email', $data['email']);

        $query->execute();
    }

    public function removeUsers(array $ids)
    {
        $ids = array_filter($ids, 'is_numeric');
        $query = $this->db->prepare("DELETE FROM users WHERE ID IN (" . implode(',', array_fill(0, count($ids), '?')) . ")");
        $query->execute($ids);
    }
}
