create database ifmisdata;

create table users(
    id int  primary key,
    name varchar(255) not null,
    username varchar(25) not null,
    password varchar(45) not null
);
 
insert into users values ('1','pavan','pavan','827ccb0eea8a706c4c34a16891f84e7b');
insert into users values ('2','sai','sai','827ccb0eea8a706c4c34a16891f84e7b'); 


create table modules(
    id int primary key,
    user_id int references users(id),
    module_name varchar(25),
    active_status int 
);

insert into modules values ('1','1','Deposit Accounts','1');   
insert into modules values ('2','1','Bill Section','1');    

insert into modules values ('3','1','HR Section','1');
insert into modules values ('4','1','PRC Section','1'); 
insert into modules values ('5','1','Tutorials Section','1');
insert into modules values ('6','2','Deposit Accounts','1');   
insert into modules values ('7','2','Bill Section','1');    
insert into modules values ('8','2','HR Section','1');
insert into modules values ('9','2','PRC Section','0'); 
insert into modules values ('10','2','Tutorials Section','0');



create table sidebar(
    id int primary key,
    module_id int references modules(id),
    sidebar_name varchar(25) not null,
    active_status int
);

insert into sidebar values ('1','1','Ekubar Return','1');
insert into sidebar values ('2','1','Home','1');
insert into sidebar values ('3','1','Add Agency in Bulk','1');
insert into sidebar values ('4','1','Add New Agency','1');
insert into sidebar values ('5','1','Bill Entry','1');
insert into sidebar values ('6','1','View Bill','1');
insert into sidebar values ('7','1','Print Bill','1');
insert into sidebar values ('8','1','Check Bill Status','1');
insert into sidebar values ('9','1','Pay Slips','1');
insert into sidebar values ('10','1','Reports','1');
insert into sidebar values ('11','1','Reports','1');
insert into sidebar values ('12','1','Cancel Bills','1');
insert into sidebar values ('13','1','Check Form Type','1');


create table employeedata(
    id int primary key,
    bill_id varchar(25) not null,
    employee_name varchar(25) not null,
    employee_fathername varchar(25) not null,
    employee_bankacno varchar(13) not null
);

insert table employeedata values('1','1','vignesh','satyanarayana','1111111111111');
insert into employeedata values('2','1','ganesh','satyaam','2222222222222');
insert into employeedata values('3','2','archana','muthyam','3333333333333');
insert into employeedata values('4','2','sanjana','arutham','4444444444444');
insert into employeedata values ('5','3','ramya','raghava','5555555555555');
insert into employeedata values('6','3','priya','veera','6666666666666');
insert into employeedata values ('7','4','supriya','sumanth','7777777777777');
insert into employeedata values('8','5','rashmi','akhil','8888888888888');
      

create table entries(
    id int primary key,
    entry_type varchar(25) not null,
    entry_name varchar(25) not null
);

 insert into entries values('1','earning','basic');
 insert into entries values('2','earning','hra');
 insert into entries values('3','earning','cca');
 insert into entries values('4','earning','rent allowance');
 insert into entries values('5','earning','spl allowance'); 
 insert into entries values('6','earning','bonas'); 
 insert into entries values('7','deduction','income tax');
 insert into entries values('8','deduction','pf');
 insert into entries values('9','deduction','da');
 insert into entries values('10','deduction','gpf');
 insert into entries values('11','deduction','housing loan');

 
create table emptoentry(
    emp_id int references employeedata(id),
    entry_id int references entries(id)
);



 insert into emptoentry values('2','1');
 insert into emptoentry values('2','2');
 insert into emptoentry values('2','3');
 insert into emptoentry values('2','6');
 insert into emptoentry values('2','7');
 insert into emptoentry values('2','8');
 insert into emptoentry values('2','11');


 insert into emptoentry values('3','1');
 insert into emptoentry values('3','2');
 insert into emptoentry values('3','3');
 insert into emptoentry values('3','7');
 insert into emptoentry values('3','8');
 insert into emptoentry values('3','11');


 insert into emptoentry values('4','1');
 insert into emptoentry values('4','2');
 insert into emptoentry values('4','4');
 insert into emptoentry values('4','8');
 insert into emptoentry values('4','9');
 insert into emptoentry values('4','10');

 insert into emptoentry values('5','1');
 insert into emptoentry values('5','2');
 insert into emptoentry values('5','3');
 insert into emptoentry values('5','7');
 insert into emptoentry values('5','10');
 insert into emptoentry values('5','11');

 insert into emptoentry values('6','1');
 insert into emptoentry values('6','2');
 insert into emptoentry values('6','4');
 insert into emptoentry values('6','5');
 insert into emptoentry values('6','7');
 insert into emptoentry values('6','8');
 insert into emptoentry values('6','11');




create table userstobillidmap(
    id int primary key,
    user_id int references users(id),
    bill_id int 
);

insert into userstobillidmap values('1','1','1');
insert into userstobillidmap values('2','1','2');
insert into userstobillidmap values('3','1','3');
insert into userstobillidmap values('4','2','4');
insert into userstobillidmap values('5','2','5');



create table userbilltable(
    id bigserial primary key,
    user_id int references users(id),
    total_earnings int ,
    total_deductions int,
    net_amount int 
   
);


create table employee_bill(
    user_bill_id int references userbilltable(id),
    id bigserial primary key,
    emp_id int references employeedata(id),
    total_earnings int ,
    total_deductions int,
    net_amount int,
    year_month varchar(25) 
    
);


create table employee_bill_indetails(
    user_bill_id int references userbilltable(id),
    id bigserial primary key ,
    emp_id int references employeedata(id),
    type_of_pay varchar(25),
    amount int
);


