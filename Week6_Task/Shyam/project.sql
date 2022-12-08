create DATABASE project

create table userid (
    UserName VARCHAR(50) NOT NULL,
    Password VARCHAR(50) NOT NULL
);

insert into userid(UserName,Password) values('vms','123456');
insert into userid(UserName,Password) values('vmk','1234567');

update userid set Password = 'e10adc3949ba59abbe56e057f20f883e' where UserName ='vms';
update userid set Password = 'fcea920f7412b5da7be0cf42b8c93759' where UserName ='vmk';

create table department(
    departmentid bigserial,
    departmentname VARCHAR(50) PRIMARY KEY NOT NULL,
    departmenthead VARCHAR(50) NOT NULL,
    departmentphonenumber int NOT NULL,
    floor_id int  NOT NULL
);

insert into department(departmentid,departmentname,departmenthead,departmentphonenumber,floor_id) values (1,'NUROLOGY','AlokRanjan',614946164,2);
insert into department(departmentid,departmentname,departmenthead,departmentphonenumber,floor_id) values (2,'Cardiology','SunilKumar',635810651,2);
insert into department(departmentid,departmentname,departmenthead,departmentphonenumber,floor_id) values (3,'Orthopaedics','MuraliKrishna',9032445566,3);
insert into department(departmentid,departmentname,departmenthead,departmentphonenumber,floor_id) values (4,'Ophthalmology','Maheswari',9000404789,4);
insert into department(departmentid,departmentname,departmenthead,departmentphonenumber,floor_id) values (5,'Oncology','VenuVardhan',6328156011,3);


create table roomtype(
    Room_Id bigserial,
    Room_Type VARCHAR(50) PRIMARY KEY NOT NULL,
    Room_Number int NOT NULL,
    Floor_Id int NOT NULL 
);

insert into roomtype(room_id,room_type,room_number,floor_id) values (1,'Single',100,1);
insert into roomtype(room_id,room_type,room_number,floor_id) values (2,'Double',101,2);
insert into roomtype(room_id,room_type,room_number,floor_id) values (3,'Double',200,2);
insert into roomtype(room_id,room_type,room_number,floor_id) values (4,'Double',201,2);
insert into roomtype(room_id,room_type,room_number,floor_id) values (5,'Deluxe',300,3);
insert into roomtype(room_id,room_type,room_number,floor_id) values (5,'Deluxe',301,3);
insert into roomtype(room_id,room_type,room_number,floor_id) values (6,'Suite',310,3);
insert into roomtype(room_id,room_type,room_number,floor_id) values (7,'Suite',311,3);


create table patient(
    Patient_Id int PRIMARY KEY,
    First_Name VARCHAR(50),
    Last_Name VARCHAR(50),
    Age int NOT NULL,
    Disease VARCHAR(50) NOT NULL,
    Department_Name VARCHAR(50) references department(departmentname),
    Room_Type VARCHAR(50) references roomtype(Room_Type)
);

insert into patient(Patient_Id,First_Name,Last_Name,Age,Disease,Department_Name,Room_Type) values (1,'shyam','v',23,'fever');
insert into patient(Patient_Id,First_Name,Last_Name,Age,Disease,Department_Name,Room_Type) values (2,'kiran','k',25,'blood pressure');




ALTER TABLE users ADD COLUMN exp_time TIMESTAMP WITH TIME ZONE DEFAULT CURRENT_TIMESTAMP;



     