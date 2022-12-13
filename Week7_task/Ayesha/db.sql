SELECT sb.id,sb.seat_type,m.movie_name,t.address,s.date,s.from_time from
movies m,theatre_branch t,shows s,seats sb where
m.id=s.movie_id and 
s.id=sb.shows_id and
s.theatre_branch_id=t.id;

SELECT s.id,s.date,s.from_time,t.address,m.movie_name from
shows s,movies m,theatre_branch t where
s.movie_id=m.id and
s.theatre_branch_id=t.id;
