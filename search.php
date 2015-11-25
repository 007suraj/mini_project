<?php
$host="localhost";
$user="root";
$password="";

$con=mysqli_connect($host,$user,$password,'names')or die("error connecting to the database");
 
 $term=$_GET["term"];
 
 $qur="(SELECT name FROM female_2001 where name like '".$term."%') UNION  (SELECT name FROM male_2001 where name like '".$term."%')";

$result=mysqli_query($con,$qur)or die("error querying database"); 
$json=array();
 
//echo($qur);
$i=0;
while($row=mysqli_fetch_array($result))
{
if($i<10)
{
$json[]=array(
                    'value'=> $row[0]
                        );
$i=$i+1;
}
}

 
 
 echo json_encode($json);
 
?>
