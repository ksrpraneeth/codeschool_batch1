1)Write a query to get the list of theatre branches which is playing KGF on a given date?

SELECT shows.movie_id,theatre_branch.id,shows.theatre_branch_id,theatre_branch.address,movies.movie_name,date
FROM movies,shows,theatre_branch
where shows.movie_id = movies.id and
shows.theatre_branch_id=theatre_branch.id
and movies.movie_name='KGF'and date='2022-08-23';

2)Top played movie?


SELECT movie_id, COUNT(movie_id) AS MOST_FREQUENT
from shows
GROUP BY movie_id
ORDER BY COUNT(movie_id) DESC 
LIMIT 1;

3)Write a query to get list of bookings whose seats contain more than 10?

select bookings_id,count(seats_id), from seat_booking group by bookings_id having count(seats_id) >4;

