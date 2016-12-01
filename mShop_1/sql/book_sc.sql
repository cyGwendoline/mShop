/*创建book_sc数据库*/
create database book_sc;
use book_sc;

CREATE TABLE customers(
  customerid INT unsigned NOT NULL auto_increment PRIMARY KEY ,
  name CHAR(60) NOT NULL ,
  address CHAR(80) NOT NULL ,
  city CHAR(30) NOT NULL ,
  state CHAR(20) ,
  zip CHAR(10) ,
  country CHAR(20) NOT NULL
)ENGINE=InnoDB;

CREATE TABLE orders(
  orderid INT unsigned NOT NULL auto_increment PRIMARY KEY ,
  customerid INT unsigned NOT NULL REFERENCES customers(customerid) ,
  amount FLOAT(6,2) ,
  date DATE NOT NULL ,
  order_status CHAR(10) ,
  ship_name CHAR(60) NOT NULL ,
  ship_address CHAR(80) NOT NULL ,
  ship_city CHAR(30) NOT NULL ,
  ship_state CHAR(20) ,
  ship_zip CHAR(10) ,
  ship_country CHAR(20) NOT NULL
)ENGINE=InnoDB;

CREATE TABLE books(
  isbn CHAR(13) NOT NULL PRIMARY KEY ,
  author CHAR(100) ,
  title CHAR(100) ,
  catid INT unsigned ,
  price FLOAT(4,2) NOT NULL ,
  description VARCHAR(255)
)ENGINE=InnoDB;

CREATE TABLE categories(
  catid INT unsigned NOT NULL auto_increment PRIMARY KEY ,
  catname CHAR(60) NOT NULL
)ENGINE=InnoDB;

CREATE TABLE order_items(
  orderid INT unsigned NOT NULL REFERENCES orders(orderid) ,
  isbn CHAR(13) NOT NULL REFERENCES books(isbn) ,
  item_price FLOAT(4,2) NOT NULL ,
  quantity tinyint unsigned NOT NULL ,
  PRIMARY KEY (orderid,isbn)
)ENGINE=InnoDB;

CREATE TABLE admin(
  username CHAR(16) NOT NULL PRIMARY KEY ,
  password CHAR(40) NOT NULL
)ENGINE=InnoDB;

GRANT SELECT ,INSERT ,UPDATE ,DELETE ON book_sc.* TO myself identified by 'password';