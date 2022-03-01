DROP DATABASE IF EXISTS iesvideo;
CREATE DATABASE iesvideo;
USE iesvideo;

CREATE TABLE film (
  film_id SMALLINT UNSIGNED NOT NULL AUTO_INCREMENT,
  title VARCHAR(255) NOT NULL,
  release_year YEAR DEFAULT NULL,
  rental_rate DECIMAL(4,2) NOT NULL DEFAULT 4.99,
  theme VARCHAR(255) NOT NULL,
  CONSTRAINT pk_film PRIMARY KEY  (film_id)
)ENGINE=InnoDB DEFAULT CHARSET=utf8;

INSERT INTO film VALUES (1,'ACADEMY DINOSAUR',2006,'4.99','Adventures'),
(2,'ACE GOLDFINGER',2006,'4.99','Thriller'),
(3,'ADAPTATION HOLES',2008,'2.99','SciFi'),
(4,'AFFAIR PREJUDICE',2012,'2.99','Thriller'),
(5,'AFRICAN EGG',2004,'2.99','Adventures'),
(6,'AGENT TRUMAN',2006,'2.99','SciFi'),
(7,'AIRPLANE SIERRA',2006,'4.99','Adventures'),
(8,'AIRPORT POLLOCK',2009,'4.99','Adventures'),
(9,'ALABAMA DEVIL',2011,'2.99','Thriller'),
(10,'ALADDIN CALENDAR',2021,'4.99','SciFi');
COMMIT;

CREATE TABLE inventory (
  film_id SMALLINT UNSIGNED NOT NULL,
  quantity TINYINT UNSIGNED NOT NULL,
  CONSTRAINT pk_film PRIMARY KEY  (film_id),
  CONSTRAINT fk_inventory_film FOREIGN KEY (film_id) REFERENCES film (film_id)
)ENGINE=InnoDB DEFAULT CHARSET=utf8;

INSERT INTO inventory VALUES (1,1), (2,2), (3,3), (4,1), (5,1), (6,1), (7,0), (8,1), (9,0), (10,10);
COMMIT;

CREATE TABLE customer (
  customer_id SMALLINT UNSIGNED NOT NULL AUTO_INCREMENT,
  first_name VARCHAR(45) NOT NULL,
  last_name VARCHAR(45) NOT NULL,
  email VARCHAR(50) DEFAULT NULL,
  active BOOLEAN NOT NULL DEFAULT TRUE,
  CONSTRAINT pk_customer PRIMARY KEY  (customer_id) 
)ENGINE=InnoDB DEFAULT CHARSET=utf8;

INSERT INTO customer VALUES (1,'MARY','SMITH','MARY.SMITH@sakilacustomer.org',1),
(2,'PATRICIA','JOHNSON','PATRICIA.JOHNSON@sakilacustomer.org',1),
(3,'LINDA','WILLIAMS','LINDA.WILLIAMS@sakilacustomer.org',1),
(4,'BARBARA','JONES','BARBARA.JONES@sakilacustomer.org',1),
(5,'ELIZABETH','BROWN','ELIZABETH.BROWN@sakilacustomer.org',1),
(6,'JENNIFER','DAVIS','JENNIFER.DAVIS@sakilacustomer.org',1),
(7,'MARIA','MILLER','MARIA.MILLER@sakilacustomer.org',1),
(8,'SUSAN','WILSON','SUSAN.WILSON@sakilacustomer.org',1),
(9,'MARGARET','MOORE','MARGARET.MOORE@sakilacustomer.org',0),
(10,'DOROTHY','TAYLOR','DOROTHY.TAYLOR@sakilacustomer.org',0);
COMMIT;


CREATE TABLE rental (
  film_id SMALLINT UNSIGNED NOT NULL AUTO_INCREMENT,
  rental_date DATETIME NOT NULL,
  customer_id SMALLINT UNSIGNED NOT NULL,
  return_date DATETIME DEFAULT NULL,
  CONSTRAINT pk_rental PRIMARY KEY (film_id,customer_id,rental_date),
  CONSTRAINT fk_rental_film FOREIGN KEY (film_id) REFERENCES film (film_id),
  CONSTRAINT fk_rental_customer FOREIGN KEY (customer_id) REFERENCES customer (customer_id)
)ENGINE=InnoDB DEFAULT CHARSET=utf8;


INSERT INTO rental VALUES (1,'2021-05-24 22:53:30',1,'2021-05-26 22:04:30'),
(2,'2021-05-24 22:54:33',1,'2021-05-28 19:40:33'),
(3,'2021-05-24 23:03:39',1,'2021-06-01 22:12:39'),
(4,'2021-05-24 23:04:41',1,'2021-06-03 01:43:41'),
(5,'2021-05-24 23:05:21',2,'2021-06-02 04:33:21'),
(6,'2021-05-24 23:08:07',2,'2021-05-27 01:32:07'),
(7,'2022-02-24 09:11:53',5,NULL),
(2,'2021-05-24 23:31:46',6,'2021-05-27 23:33:46'),
(9,'2022-02-24 08:11:11',8,NULL),
(10,'2021-05-25 00:02:21',1,'2021-05-31 22:44:21'),
(1,'2020-05-25 00:09:02',8,'2020-06-02 20:56:02'),
(2,'2022-02-01 00:19:27',1,'2022-02-02 00:19:27'),
(2,'2022-02-02 00:22:55',2,'2022-02-03 00:19:27');
COMMIT;


