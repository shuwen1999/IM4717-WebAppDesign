create table product_menu
( productid int unsigned not null auto_increment primary key,
  productname char(50) not null,
  category char(50) not null,
  price float(6,2) not null
);

create table product_order
( orderid int unsigned not null auto_increment primary key,
  productid int unsigned not null,
  quantity int not null,
  amount float(6,2)
);

create table product_image
(
    imageid int(11) not null auto_increment primary key,
    productid int unsigned not null,
    img_name varchar(255) COLLATE utf8_unicode_ci NOT NULL,
    img_dir varchar(255) COLLATE utf8_unicode_ci NOT NULL
);

create table cust_details
(
    custid int(11) not null auto_increment primary key,
    custname char(50) not null,
    custno int not null,
    custadd char(100) not null,
    custpostal int not null,
    custemail char(100) not null,
    custbillno int not null,
    custbilladd char(100) not null,
    custbillpostal int not null,
    orderid int unsigned not null
    
);

create table payment
(
    paymentid int(11) not null auto_increment primary key,
    custid int unsigned not null,
    cardname char(50) not null,
    cardno int not null,
    carddate int not null,
    cardcvc int not null
);

create table users
(
    loginid INT NOT NULL PRIMARY KEY AUTO_INCREMENT,
    custid int unsigned not null,
    loginemail VARCHAR(255) NOT NULL UNIQUE,
    loginpw VARCHAR(255) NOT NULL
);