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


$con = mysqli_connect("localhost","test","123","guestbook",null,"/cloudsql/phpmysql-153207:asia-east1:phpmysql1");

// Check connection
if (mysqli_connect_errno())
  {
  echo "Failed to connect to MySQL: " . mysqli_connect_error();
  }else{
    $sql="SELECT * FROM entries";

if ($result=mysqli_query($con,$sql))
  {
    
  ?>  
  
  <table style="width:100%">
  <tr>
    <th>Col 1</th>
    <th>Col 2</th>
    <th>Col 3</th>
  </tr>
  <?php    
  while ($row=mysqli_fetch_assoc($result))
    {
    ?>  
     <tr><td><?php echo $row["guestName"];?></td><td><?php echo $row["content"];?></td><td><?php echo $row["content"];?></td></tr> 
   
    <?php  
    }
  ?>
   </table>
  <?php  
  
  mysqli_free_result($result);
}

mysqli_close($con);
}
echo "hello";

