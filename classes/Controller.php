<?php


namespace classes;


use Exception;
use PDO;

class Controller
{
    public function index()
    {
        global $dbConnection;
        $user = new User();

        if (isset($_GET['id'])) {
            $query = $dbConnection->prepare('SELECT * FROM users WHERE id = ?');
            $query->setFetchMode(PDO::FETCH_CLASS, $user::class);
            $query->execute([$_GET['id']]);
            $user = $query->fetch() ?: $user;
            if (!$user->getId()) {
                $error = "the user id \"{$_GET['id']}\" is incorrect!!!";
            }
        }

        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            try {
                switch ($_POST['action']) {
                    case 'create table':
                        $user->createTable();
                        break;
                    case 'remove users':
                        $user->removeUsers($_POST['delete']);
                        break;
                    case 'add user':
                        $user->addUser($_POST);
                        break;
                    case 'drop table':
                        $user->dropTable();
                        break;
                };
                header('location: /');
                die;
            } catch (Exception $e) {
                $error = $e->getMessage();
            }
        }

        require_once basename(__DIR__) . '/views/user.php';
    }
}
