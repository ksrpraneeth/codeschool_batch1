create database AJIOShopping;
//company table
create table Ajioshopping(ProductID int,DressName varchar(40),size varchar(30),cost int);
postgres=#  INSERT INTO Ajioshopping values (0001,'Jeans','small',4000);
INSERT 0 1
postgres=# INSERT INTO Ajioshopping values (0002,'Tops','medium',5000);
INSERT 0 1
postgres=# INSERT INTO Ajioshopping values (0003,'Tshirts','small',4000);
INSERT 0 1
postgres=# INSERT INTO Ajioshopping values (0004,'frocks','large',8000);
INSERT 0 1
postgres=# INSERT INTO Ajioshopping values (0005,'saree','large',12000);
INSERT 0 1
//Buyer table
 create table Buyer ( BuyerId int ,Name varchar(30),username varchar(60),password varchar(40),gender varchar(40),
 mailId varchar(60),province varchar(40),Address varchar(50),ReferenceproductId int);
postgres=# INSERT INTO Buyer values(02,'Sindu','Sindu789','Sindu789@','female','Sindu789@gmail.com','India','Hyderabad',0002);
INSERT 0 1
postgres=# INSERT INTO Buyer values(03,'prasanna','prasanna789','prasanna789@','female','prasanna789@gmail.com','India','vikarabad',0003);
INSERT 0 1
postgres=# INSERT INTO Buyer values(04,'keerthana','keerthana789','keerthana789@','female','keerthu789@gmail.com','India','chevella',0004);
INSERT 0 1
postgres=# INSERT INTO Buyer values(05,'Akhi','Akhi789','Akhi789@','female','akhi789@gmail.com','India','moosapet',0005);
INSERT 0 1
//order table
create table orders ( id int,amount int,orderstatus varchar(20),ordercount varchar(40),ReferencekeyBuyerId int);
 INSERT INTO orders values(002,5000,'process','single',02);
INSERT INTO orders values(003,4000,'delivered','multiple',03);
 INSERT INTO orders values(004,8000,'delivered','multiple',04);
 INSERT INTO orders values(005,12000,'delivered','single',05);
//Address table
 create table Address ( id int,streetaddress varchar(50), city varchar(60),ReferencekeyBuyerId int);
 postgres=# INSERT INTO Address values(1,'2-61Gandhi colony','Vikarabd',01);
INSERT 0 1
postgres=# INSERT INTO Address values(2,'3-63pragathi colony','chevalla',02);
INSERT 0 1
postgres=# INSERT INTO Address values(3,'8-84Teachers colony','moosapet',03);
INSERT 0 1
postgres=# INSERT INTO Address values(4,'9-4Teachers colony','indranagar',04);
INSERT 0 1
postgres=# INSERT INTO Address values(5,'9-89madhu colony','vikarabad',05);
INSERT 0 1
create table payment( id int,Amount int,AmountType varchar(40));
postgres=# INSERT INTO payment values( 1 , 4000 ,'cashondelivery');
INSERT 0 1
postgres=# INSERT INTO payment values( 2 , 3000 ,'onlinepayment');
INSERT 0 1
postgres=# INSERT INTO payment values( 3 , 89000 ,'onlinepayment');
INSERT 0 1
postgres=# INSERT INTO payment values( 4 , 89000 ,'cashondelivery');
INSERT 0 1
postgres=# INSERT INTO payment values( 5 , 8900 ,'cashondelivery');
INSERT 0 1
postgres=#