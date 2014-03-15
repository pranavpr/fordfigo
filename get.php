<?php
# This function reads DATABASE_URL configuration set by Heroku
# the return value is a string that will work with pg_connect
function pg_connection_string() {
  return "dbname=d56jl9rpuri4us host=ec2-184-73-194-196.compute-1.amazonaws.com port=5432 user=bsegsbwhqrwkvt password=SluOhNXZ9yUxlQaHOtt_8muJCN sslmode=require";
}
 
# Establish db connection
$db = pg_connect(pg_connection_string());
if (!$db) {
    echo "Database connection error.";
    exit;
}
$result = pg_query($db, "select Name, Comment from Persons offset random() * (select count(*) from Persons) limit 1;");
//dump the result
while ($row = pg_fetch_row($result)) {
  echo "$row[0] says $row[1]";
}// Closing connection
pg_close($db);
?>