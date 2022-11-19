create DATABASE hoteldata;

CREATE TABLE hotel(
    id BIGSERIAL PRIMARY KEY,
    hotel_name VARCHAR(50) NOT NULL,
    phone_number integer NOT NULL,
    hotel_address VARCHAR(50) NOT NULL
);

insert into hotel (hotel_name,phone_number,hotel_address) VALUES ('mshotel',651544151,'AshokNagar');

CREATE TABLE room(
    id BIGSERIAL PRIMARY KEY,
    room_type VARCHAR(50) NOT NULL,
    room_number integer NOT NULL,
    room_price integer NOT NULL
);

insert into room (room_type,room_number,room_price) VALUES ('Normal',11,5000);
insert into room (room_type,room_number,room_price) VALUES ('Normal',12,5000);
insert into room (room_type,room_number,room_price) VALUES ('Deluxe',21,10000);
insert into room (room_type,room_number,room_price) VALUES ('Deluxe',22,10000);
insert into room (room_type,room_number,room_price) VALUES ('Suite',31,25000);
insert into room (room_type,room_number,room_price) VALUES ('Suite',32,25000);

CREATE TABLE reservation(
    id BIGSERIAL PRIMARY KEY,
    room_id integer references room(id),
    guest_id integer references guest(id),
    from_date date NOT NULL,
    to_date date NOT NULL    
);

insert into reservation (room_id,guest_id,from_date,to_date) VALUES (2,1,'17-11-2022','18-11-2022');
insert into reservation (room_id,guest_id,from_date,to_date) VALUES (1,2,'17-11-2022','19-11-2022');
insert into reservation (room_id,guest_id,from_date,to_date) VALUES (5,3,'15-11-2022','18-11-2022');

CREATE TABLE guest(
    id BIGSERIAL PRIMARY KEY,
    first_name VARCHAR(50) NOT NULL,
    last_name VARCHAR(50) NOT NULL,
    gender VARCHAR(50) NOT NULL,
    age integer NOT NULL,
    mobile_number integer NOT NULL,
    personal_address VARCHAR(50) NOT NULL,
    personal_proof VARCHAR(50) NOT NULL
);

insert into guest (first_name,last_name,gender,age,mobile_number,personal_address,personal_proof) VALUES ('syam','v','male',23,65465465,'JMD','Aadhar');
insert into guest (first_name,last_name,gender,age,mobile_number,personal_address,personal_proof) VALUES ('ms','v','female',40,65466655,'PDTR','Aadhar');
insert into guest (first_name,last_name,gender,age,mobile_number,personal_address,personal_proof) VALUES ('mk','v','male',44,65462515,'KVP','Aadhar');
insert into guest (first_name,last_name,gender,age,mobile_number,personal_address,personal_proof) VALUES ('venu','G','male',27,65461525,'KDP','Aadhar');
insert into guest (first_name,last_name,gender,age,mobile_number,personal_address,personal_proof) VALUES ('vishnu','J','male',29,65467106,'KNL','Aadhar');


--- Queries


--- 1st Query for How many types of rooms 
select r.room_type,count(r.room_type) from room r group by r.room_type;

--- 2nd Query for How many rooms occupied on a particular date
select count(r.room_id) from reservation r where from_date ='15-11-2022';

--- 3rd Query for display Guest name, room type, room number ,from date and to date
select g.first_name,r.room_type,r.room_number,re.from_date,re.to_date from reservation re, guest g,room r where re.room_id = r.id and re.guest_id = g.id and from_date between '17-11-2022' and '18-11-2022';

--- 4th Query for how many rooms are available 
select r.id,r.room_type from room r left join reservation re on r.id = re.room_id where re.room_id is null;

--- 5th Query for Guest Check out date
select r.room_number,r.room_type,g.first_name,g.last_name,re.to_date from reservation re,guest g,room r where re.room_id = r.id and re.guest_id = g.id;
