//1.fetch all nurse names who are assigned to room 3

hospital_management=# select n.name,n.id from nurses n,room_nurse_mapping r where n.id=r.nurse_id and r.room_id='3';
  name   | id
---------+----
 jamuna  |  5
 rajesh  |  6
 prudhvi | 10

//2.select the doctor who is having highest patients

hospital_management=# select  d.doctor_id,count(inward_id) from doctor_inwards d group by d.doctor_id order by count(inward_id) desc;
 doctor_id | count
-----------+-------
         8 |     2
         3 |     2
         4 |     2
         6 |     2
         2 |     2
         7 |     2
         1 |     2
         5 |     1


//3.Write a query to get all the patient details who have suffered from fever?

select * from patients,inwards where patients.id=inwards.patient_id and inwards.disease='fever';

//4. Write a query to get inwards whose bill is more than 50000?

hospital_management=# select patient_id,total_bill from inwards where total_bill > 50000;
 patient_id | total_bill
------------+------------
          4 |      60000
          5 |      65000
          6 |      70000
          7 |      80000
          8 |      85000
          9 |      55000
         10 |      60000
         11 |      65000
         12 |      80000
         13 |      90000
         14 |      80000
         15 |      60000

//5. Write a query to get all the doctors who don't even have one inward?
//Another approach is exists or not exists
hospital_management=# select d.id,d.name from doctors d left join doctor_inwards di ON di.doctor_id=d.id where di.doctor_id is null;
 id |       name
----+------------------
  9 | Dr. Mangathayaru

//6. Write a query to get the list of rooms which have vacant beds?

hospital_management=# select r.id,r.status from rooms r where r.status='empty';
 id | status
----+--------
  3 | empty
  4 | empty

//7. Write a query to get list nurses with reported docters.
hospital_management=# select d.doctor_id,r.nurse_id from doctor_inwards d,room_nurse_mapping r ,inwards i where i.id=d.inward_id and r.room_id=i.room_id;
 doctor_id | nurse_id
-----------+----------
         1 |        2
         1 |        1
         1 |        2
         1 |        1
         2 |        2
         2 |        1
         2 |        9
         2 |        4
         2 |        3
         3 |        9
         3 |        4
         3 |        3
         3 |        9
         3 |        4
         3 |        3
         4 |       10
         4 |        6
         4 |        5
         4 |       10
         4 |        6
         4 |        5
         5 |        8
         5 |        7