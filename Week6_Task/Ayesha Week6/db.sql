SELECT b.id, m.movie_name, STRING_AGG(sb.id::CHARACTER VARYING, ' , ') FROM bookings b, movies m, seat_booking sb
WHERE b.movie_id = m.id AND b.id=sb.bookings_id AND b.users_id = 37
GROUP BY b.id, m.movie_name;

SELECT b.id, m.movie_name,s.from_time,STRING_AGG(sb.id::CHARACTER VARYING, ' , ') FROM bookings b, movies m, seat_booking sb,shows s
WHERE b.movie_id = m.id AND b.id=sb.bookings_id AND b.users_id = 37 AND s.movie_id=m.id
GROUP BY b.id, m.movie_name,s.from_time;