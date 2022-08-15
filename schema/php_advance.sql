# 1. Створення бази даних
CREATE DATABASE IF NOT EXISTS autopark CHARACTER SET utf8 COLLATE utf8_general_ci;
USE autopark;


# 2. Створення всіх таблиць та потрібні зв'язки між ними
CREATE TABLE IF NOT EXISTS parks
(
    id BIGINT PRIMARY KEY AUTO_INCREMENT,
    serial_number VARCHAR(16) NOT NULL UNIQUE,
    address VARCHAR(255) NOT NULL
);

CREATE TABLE IF NOT EXISTS cars
(
    id BIGINT PRIMARY KEY AUTO_INCREMENT,
    park_id BIGINT,
    model VARCHAR(20) NOT NULL,
    year YEAR NOT NULL,
    price FLOAT(11, 2) NOT NULL,

    FOREIGN KEY (park_id) REFERENCES parks(id) ON DELETE SET NULL
);

CREATE TABLE IF NOT EXISTS drivers
(
    id BIGINT PRIMARY KEY AUTO_INCREMENT,
    car_id BIGINT,
    full_name VARCHAR(150) NOT NULL,
    license_id VARCHAR(16) NOT NULL UNIQUE,
    birthday DATE NOT NULL,

    FOREIGN KEY (car_id) REFERENCES cars(id) ON DELETE SET NULL
);

CREATE TABLE IF NOT EXISTS customers
(
    id BIGINT PRIMARY KEY AUTO_INCREMENT,
    name VARCHAR(50) NOT NULL,
    surname VARCHAR(100) NOT NULL,
    email VARCHAR(150) NOT NULL UNIQUE
);

CREATE TABLE IF NOT EXISTS orders
(
    id BIGINT PRIMARY KEY AUTO_INCREMENT,
    customer_id BIGINT,
    car_id BIGINT,
    first_address VARCHAR(255) NOT NULL,
    destination_address VARCHAR(255) NOT NULL,

    FOREIGN KEY (customer_id) REFERENCES customers(id) ON DELETE SET NULL,
    FOREIGN KEY (car_id) REFERENCES cars(id) ON DELETE SET NULL
);

CREATE TABLE IF NOT EXISTS for_dropping
(
    id BIGINT PRIMARY KEY AUTO_INCREMENT,
    name VARCHAR(50) NOT NULL,
    surname VARCHAR(100) NOT NULL,
    email VARCHAR(150) NOT NULL UNIQUE
);


# 3. Видалення однієї з таблиць
DROP TABLE for_dropping;


# 4. Модифікація поля таблиці (наприклад, поле типу datetime, стало date (або зміна імені поля) )
ALTER TABLE drivers MODIFY COLUMN birthday DATETIME NOT NULL DEFAULT CURRENT_TIMESTAMP;
ALTER TABLE drivers RENAME COLUMN birthday TO created_at;
ALTER TABLE drivers ADD COLUMN birthday DATE NOT NULL AFTER license_id;


# 5. Заповнення кожної таблиці хоча б по 3-5 записів
INSERT INTO parks (serial_number, address)
VALUES
('1', "Yunosti St, 23, Mykytyntsi, Ivano-Frankivs'ka oblast, 76018"),
('2', "Galytska St, 66, Ivano-Frankivs'k, 76494"),
('3', "Nezalejnosty St, 12, Ivano-Frankivs'k, 76019"),
('4', "Knyagynyn St, 45, Ivano-Frankivs'k, 76016");

INSERT INTO cars (park_id, model, year, price)
VALUES
(1, 'toyota', 2011, 50.5),
(1, 'mazda', 2009, 40.25),
(1, 'BMW', 2002, 22),
(2, 'VW', 2004, 30),
(2, 'Slavuta', 2001, 10),
(3, 'toyota', 2014, 70),
(4, 'mersedes', 2012, 60),
(3, 'BMW', 2009, 39.75),
(4, 'VW', 2022, 100),
(4, 'BMW', 2010, 44);

INSERT INTO drivers (car_id, full_name, license_id, birthday)
VALUES
(1, 'Jony Dep', LEFT(REPLACE(UUID(), '-', ''), 16), 19700301),
(2, 'Bret Peat', LEFT(REPLACE(UUID(), '-', ''), 16), 19800621),
(3, 'Jon Travolta', LEFT(REPLACE(UUID(), '-', ''), 16), 19741113),
(3, 'Clark Kent', LEFT(REPLACE(UUID(), '-', ''), 16), 19890511),
(4, 'Obi-wan Kenobi', LEFT(REPLACE(UUID(), '-', ''), 16), 19940321),
(5, 'Piter Parker', LEFT(REPLACE(UUID(), '-', ''), 16), 20010721),
(6, 'Tony Stark', LEFT(REPLACE(UUID(), '-', ''), 16), 19910101),
(6, 'Leonardo Dikaprio', LEFT(REPLACE(UUID(), '-', ''), 16), 19920411),
(7, 'Vitaliy Klychko', LEFT(REPLACE(UUID(), '-', ''), 16), 19970228),
(8, 'Taras Shevchenko', LEFT(REPLACE(UUID(), '-', ''), 16), 19770707),
(9, 'Mila Kunis', LEFT(REPLACE(UUID(), '-', ''), 16), 19980508),
(9, 'Scarlett Johansson', LEFT(REPLACE(UUID(), '-', ''), 16), 19660606);

INSERT INTO customers (name, surname, email)
VALUES
('Olivia', 'Black', 'olivia@black.com'),
('Katie', 'Red', 'katie@red.com'),
('Brien', 'Blue', 'brien@blue.com'),
('Robin', 'Green', 'robin@green.com'),
('Nikole', 'Grey', 'nikole@grey.com');

INSERT INTO orders (customer_id, car_id, first_address, destination_address)
VALUES
(1, 2, "Galytska St, 66, Ivano-Frankivs'k, 76494", "Yunosti St, 23, Mykytyntsi, Ivano-Frankivs'ka oblast, 76018"),
(2, 5, "Knyagynyn St, 45, Ivano-Frankivs'k, 76016", "Nezalejnosty St, 12, Ivano-Frankivs'k, 76019"),
(3, 7, "Yunosti St, 23, Mykytyntsi, Ivano-Frankivs'ka oblast, 76018", "Knyagynyn St, 45, Ivano-Frankivs'k, 76016");


# 6. Модифікації будь-якого запису (наприклад, змінити серійний номер автопарку)
UPDATE parks SET serial_number = 5 WHERE id = 1;


# 7. Видалення запису з таблиці
DELETE FROM orders WHERE customer_id = 1;


# 8. Ну і пару різних запитів до бази даних (маю на увазі SELECT)
SELECT COUNT(DISTINCT model) FROM cars;
/*
+-----------------------+
| COUNT(DISTINCT model) |
+-----------------------+
|                     6 |
+-----------------------+
  */
SELECT model, COUNT(*) as count FROM cars GROUP BY model HAVING count > 1 ORDER BY count DESC;
/*
+--------+-------+
| model  | count |
+--------+-------+
| BMW    |     3 |
| toyota |     2 |
| VW     |     2 |
+--------+-------+
*/
SELECT full_name, license_id, birthday FROM drivers WHERE birthday > 19900101;
/*
+-------------------+------------------+------------+
| full_name         | license_id       | birthday   |
+-------------------+------------------+------------+
| Obi-wan Kenobi    | 1d0309561a7711ed | 1994-03-21 |
| Piter Parker      | 1d030af21a7711ed | 2001-07-21 |
| Tony Stark        | 1d030c2f1a7711ed | 1991-01-01 |
| Leonardo Dikaprio | 1d030d6b1a7711ed | 1992-04-11 |
| Vitaliy Klychko   | 1d030ecb1a7711ed | 1997-02-28 |
| Mila Kunis        | 1d0311441a7711ed | 1998-05-08 |
+-------------------+------------------+------------+
*/

# 9. 1-2 приклади Join запиту
SELECT c.model, CONCAT(c2.name, ' ', c2.surname) as customer, o.first_address, o.destination_address FROM orders o
    LEFT JOIN cars c on c.id = o.car_id
    LEFT JOIN customers c2 on o.customer_id = c2.id;
/*
+----------+------------+-------------------------------------------------------------+----------------------------------------------+
| model    | customer   | first_address                                               | destination_address                          |
+----------+------------+-------------------------------------------------------------+----------------------------------------------+
| Slavuta  | Katie Red  | Knyagynyn St, 45, Ivano-Frankivs'k, 76016                   | Nezalejnosty St, 12, Ivano-Frankivs'k, 76019 |
| mersedes | Brien Blue | Yunosti St, 23, Mykytyntsi, Ivano-Frankivs'ka oblast, 76018 | Knyagynyn St, 45, Ivano-Frankivs'k, 76016    |
+----------+------------+-------------------------------------------------------------+----------------------------------------------+
*/
SELECT p.serial_number, p.address, c.model, c.year FROM cars c
    LEFT JOIN parks p on p.id = c.park_id
WHERE year > 2008;
/*
+---------------+-------------------------------------------------------------+----------+------+
| serial_number | address                                                     | model    | year |
+---------------+-------------------------------------------------------------+----------+------+
| 5             | Yunosti St, 23, Mykytyntsi, Ivano-Frankivs'ka oblast, 76018 | toyota   | 2011 |
| 5             | Yunosti St, 23, Mykytyntsi, Ivano-Frankivs'ka oblast, 76018 | mazda    | 2009 |
| 3             | Nezalejnosty St, 12, Ivano-Frankivs'k, 76019                | toyota   | 2014 |
| 4             | Knyagynyn St, 45, Ivano-Frankivs'k, 76016                   | mersedes | 2012 |
| 3             | Nezalejnosty St, 12, Ivano-Frankivs'k, 76019                | BMW      | 2009 |
| 4             | Knyagynyn St, 45, Ivano-Frankivs'k, 76016                   | VW       | 2022 |
| 4             | Knyagynyn St, 45, Ivano-Frankivs'k, 76016                   | BMW      | 2010 |
+---------------+-------------------------------------------------------------+----------+------+
*/