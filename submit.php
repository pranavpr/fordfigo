<?php
$fbid=$_POST['fbid']; 
$name=$_POST['name']; 
$comment=$_POST['comment']; 
# This function reads your DATABASE_URL configuration automatically set by Heroku
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
$result = pg_query($db, "insert into Persons (Name, FacebookId, Comment) values ('$name', '$fbid', '$comment');");
//dump the result object
var_dump($result);

// Closing connection
pg_close($db);
?>