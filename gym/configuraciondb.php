<?php
if (isset($_ENV['OPENSHIFT_APP_NAME'])) {
$db_user=$_ENV['OPENSHIFT_MYSQL_DB_USERNAME'];
$db_host=$_ENV['OPENSHIFT_MYSQL_DB_HOST'];
   
$db_name='danigym';
$db_password=$_ENV['OPENSHIFT_MYSQL_DB_PASSWORD'];
}
else{
$db_user='gymadmin';
$db_password='vasygym';
$db_host='localhost';
$db_name='danigym';
}
?>
