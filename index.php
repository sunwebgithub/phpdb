<style>
table {
    font-family: arial, sans-serif;
    border-collapse: collapse;
    width: 100%;
}

td, th {
    border: 1px solid #dddddd;
    text-align: left;
    padding: 8px;
}

tr:nth-child(even) {
    background-color: #dddddd;
}
</style>
<?php


    $host = "localhost";   //See Step 3 about how to get host name
    $user = "test";                     //Your Cloud 9 username
    $pass = "123";                                 //Remember, there is NO password!
    $db = "guestbook";                          //Your database name you want to connect to
    $port = 3306;                               //The port #. It is always 3306



$link = mysql_connect('localhost:/cloudsql/phpmysql-153207:asia-east1:phpmysql1', 'test', '123');
if (!$link) {
    die('Could not connect: ' . mysql_error());
}
echo 'Connected successfully';
mysql_close($link);



