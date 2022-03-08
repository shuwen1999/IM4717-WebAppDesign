
create table delivery_details
(
    custid int(11) not null auto_increment primary key,
    recepname char(50) not null,
    recepcontact int not null,
    recepadd char(100) not null,
    receppostal int not null 
);

create table bill_details
(
    custid int(11) not null auto_increment primary key,
    sendername char(50) not null,
    sendercontact int not null,
	senderemail char(100) not null,
    senderadd char(100) not null,
    senderpostal int not null 
);

create table payment_details
(
    custid int(11) not null auto_increment primary key,
    cardname char(50) not null,
    cardnumber char(50) not null,
    expiry char(20) not null,
    cvc int not null
);

create table support
(
    supportid int(11) not null auto_increment primary key, 
    name char(50) not null,
    email char(50) not null,
    msg char(100) not null
);

create table feedback
(
    feedbackid int(11) not null auto_increment primary key, 
    food int not null,
    delivery int not null,
    msg char(100) not null
);