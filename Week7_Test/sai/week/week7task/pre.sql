create database employeesdata;
create table users(
       id int primary key,
     username VARCHAR (50)  NOT NULL,
      password  VARCHAR (50) NOT NULL,
      confirmpassword VARCHAR (20) NOT NULL,
      email VARCHAR(40) NOT NULL,
      mobile varchar(50)not null
);
insert into users(id,username,password,confirmpassword,email,mobile) values('1','sai','sai@123','sai@123','sairam@gmail.com','9985660527');


create table users(
id int ,
username VARCHAR (50)  NOT NULL,
password VARCHAR (50) NOT NULL
);
INSERT INTO users(id,username,password) values('1','sai','sai@123');
INSERT INTO users(id,username,password) values('2','ram','ram@123');



create table employees(
   employeeid int primary key,
     Firstname VARCHAR (50)  NOT NULL,
      Lastname VARCHAR (50) NOT NULL,
     AadharnNumber varchar(50) Not NUll
);
INSERT INTO employees(employeeid,Firstname,Lastname,AadharnNumber) values('1','sai','ram','250700888802');
INSERT INTO employees(employeeid,Firstname,Lastname,AadharnNumber) values('12','naga','raj','250700884402');
INSERT INTO employees(employeeid,Firstname,Lastname,AadharnNumber) values('22','raj','kumar','250788024401');
INSERT INTO employees(employeeid,Firstname,Lastname,AadharnNumber) values('32','ganesh','raj','250799002134');

create table employeesdetails