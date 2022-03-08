create table product_menu
( productid int unsigned not null auto_increment primary key,
  productname char(50) not null,
  category char(50) not null,
  price float(6,2) not null,
  img_dir varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  productdesc varchar(255)
);

create table cust_details
(
    custid int(11) not null auto_increment primary key,
    custname char(50) not null,
    custemail char(100) not null,
    custpw char(100) not null 
);

create table cust_order
(
    custid int unsigned not null,
    productname char(50) not null,
    quantity int not null,
    amount float(6,2)

);