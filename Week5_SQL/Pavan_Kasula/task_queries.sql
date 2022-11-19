--Questions 

1 > How many types of rooms and count .
output - room and types - type a 2 and type b 3

2 >How many rooms are occupied per paticular date 
>> type occuipid on this date ,count of typs 

3> all bookings 
bookings with cust name and type and from  and todate and room no 

4> vacencies of all rooms date and dates 
available rooms 
room no room type and date from to 

5> customer checking out date 

on date how many are checkedouts .


--------------------------Queries-----------------

---> 1
select room_type , count(room_type) from room_type group by room_type ;


---> 2.1
select b.room_no , rt.room_type , rt.room_type_id 
from booking_details as b ,room_type as rt 
where  b.room_no=rt.room_no and arrival_date ='2022-05-17';

---> 2.2

select b.room_no , rt.room_type , rt.room_type_id 
from booking_details as b ,room_type as rt 
where  b.room_no=rt.room_no and arrival_date ='2022-05-19';

---> 2.3

select b.room_no , rt.room_type , rt.room_type_id 
from booking_details as b ,room_type as rt 
where  b.room_no=rt.room_no and arrival_date ='2022-05-22';


---> 3
select g.Guest_First_Name ,g.Guest_Last_Name ,rt.room_type, rt.room_no ,rt.room_type_id, b.arrival_date, b.Departurte_Date 
from booking_details as b , room_type as rt , Guest_Detials as g 
where b.room_no = rt.room_no and b.Guest_ID = g.Guest_ID ;

---> 4.1
select b.room_no , rt.room_type , rt.room_type_id 
from booking_details as b ,room_type as rt 
where  b.room_no=rt.room_no and arrival_date not between  '2022-05-17' and '2022-05-18' ;

---> 4.2

select b.room_no , rt.room_type , rt.room_type_id 
from booking_details as b ,room_type as rt 
where  b.room_no=rt.room_no and arrival_date not between  '2022-05-19' and '2022-05-20' ;

---> 4.3

select b.room_no , rt.room_type , rt.room_type_id 
from booking_details as b ,room_type as rt 
where  b.room_no=rt.room_no and arrival_date not between  '2022-05-21' and '2022-05-22' ;

---> 5
select g.Guest_First_Name , g.Guest_Last_Name,rt.room_type  ,rt.room_no,rt.room_type_id , b.Departurte_Date as checkout_date 
 from Guest_Detials as g,booking_details as b,room_type as rt  where g.Guest_ID=b.Guest_ID and b.room_no=rt.room_no;
