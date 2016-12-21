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


   


$link = mysql_connect('localhost:/cloudsql/phpmysql-153207:asia-east1:phpmysql1', 'test', '123');
if (!$link) {
    die('Could not connect: ' . mysql_error());
}
echo 'Connected successfully';
$link = mysql_select_db("guestbook");

$qinfo = getquery("entries","","*");
?>
<table style="width:100%">
  <tr>
    <th>Col 1</th>
    <th>Col 2</th>
    <th>Col 3</th>
  </tr>
<?php    
for($i=0;$i<count($qinfo);$i++){
    ?>
    <tr><td><?php echo $qinfo[$i]->guestName;?></td><td><?php echo $qinfo[$i]->content;?></td><td><?php echo  $qinfo[$i]->entryID;?></td></tr> 
 <?php   
  }
?>
    </table>
  <?php  
function getquery($table,$showtype,$fetch = "*",$paging = "N",$debug = "N"){
    $query = "SELECT ".$fetch." FROM ".$table." WHERE 1 ".$showtype." ";
	if($debug == 'Y'){
		echo $query;
	}
	if($paging == 'Y'){
		$query=paging_1($query,"","0%");
	}
    $result = mysql_query($query);
	return createresult($result,$fetch,$debug = "Y");
}
function createresult($result,$fetch = "",$debug = "N"){
	$num  = mysql_num_rows($result);
	$totf = mysql_num_fields($result);
	$c 	  = 0;
	for($i=0;$i<$totf;$i++){
		$meta 	   = mysql_fetch_field($result,$i);
		$rname[$i] = $meta->name;
	}
	while ($row = mysql_fetch_array($result)){
		for($i=0;$i<$totf;$i++){
			$data[$c][$rname[$i]] = $row[$rname[$i]];
		}
		$c++;
	}
	$object = json_decode(json_encode($data), FALSE);
	mysql_free_result($result);
	$data = $result = $fetch = $num = $totf = $meta = $rname = $row = NULL;
	unset($data,$result,$fetch,$num,$totf,$meta,$rname,$row);
	return ($object);
}



