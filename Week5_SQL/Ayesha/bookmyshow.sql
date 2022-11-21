CREATE database book_my_show;

//theatre
CREATE TABLE theatre(
    id SERIAL PRIMARY KEY,
    name VARCHAR(20) NOT NULL
);

//theatre_branch
CREATE TABLE theatre_branch(
    id SERIAL PRIMARY KEY,
    theatre_id int constraint fk_theatre_id REFERENCES theatre(id),
    address VARCHAR(20) NOT NULL
    );

//shows
CREATE TABLE shows(
    id SERIAL PRIMARY KEY,
    theatre_branch_id int constraint fk_theatre_branch REFERENCES theatre_branch(id),
    date date NOT NULL,
    from_time time NOT NULL,
    to_time time NOT NULL,
    movie_id int constraint fk_movies REFERENCES movies(id),
    );

    //movies
CREATE TABLE movies(
    id SERIAL PRIMARY KEY,
    movie_name VARCHAR(15) NOT NULL,
    director VARCHAR(15)  NOT NULL
);

//seats
CREATE TABLE seats(
    id SERIAL PRIMARY KEY,
    shows_id int constraint fk_shows REFERENCES shows(id),
    seat_type VARCHAR(10) NOT NULL
    );

//users
CREATE TABLE users(
    id SERIAL PRIMARY KEY,
    name VARCHAR(10) NOT NULL,
    phno int NOT NULL
    );

//bookings
CREATE TABLE bookings(
    id SERIAL PRIMARY KEY,
    users_id int constraint fk_users REFERENCES users(id)
    );

ALTER TABLE bookings  
ADD COLUMN shows_id int constraint fk_shows REFERENCES shows(id),


//seat_booking
CREATE TABLE seat_booking(
    id SERIAL PRIMARY KEY,
    bookings_id int constraint fk_bookings REFERENCES bookings(id),
    seats_id int constraint fk_seats  REFERENCES seats(id)
    );

//payments
CREATE TABLE payments(
    id SERIAL PRIMARY KEY,
    bookings_id int constraint fk_bookings REFERENCES bookings(id),
    status VARCHAR(10) NOT NULL
    );

1)//inserting into theatre
INSERT INTO theatre(name) values ('PVR'),('Inox'),('Imax');
2)//inserting into theatre_branch
INSERT INTO theatre_branch(theatre_id,address) values (3,'Necklace Road');
3)//inserting into shows
INSERT INTO shows(theatre_branch_id,date,from_time,to_time,movie_id) values (6,'2022-08-25','18:00:00','21:00:00','10A');
4)//inserting into seats
INSERT INTO seats(shows_id,seat_type) values (12,'Executive');
INSERT INTO seats(shows_id,seat_type) values (12,'Recliner');
5)//inserting into users
INSERT INTO users(name,phno) values ('Komal',1234576934);
6)//inserting into movies
INSERT INTO movies(movie_name,director,language) values ('Avatar','James Cameron','English');
7)//inserting into bookings
INSERT INTO bookings(users_id) values (1);
8)//inserting into seat_booking
INSERT INTO seat_booking(bookings_id,seats_id) values (1,1);
9)inserting into payments
INSERT INTO payments(bookings_id,status) values (1,'booked');
