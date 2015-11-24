<!doctype html>
<html> 
<head>
</head> 
<body> 
<img>
<?php 

$name=$_POST["typeahead"];    
$gndr=$_POST["gender"];
//$year=$_POST["year"];
$strt=$_POST["start"];
$arr=array();
$host="localhost";
$user="root";
$password="";
$c=0;
$con=mysqli_connect($host,$user,$password,'names')or die("error connecting to the database");
//echo($qur);
for($i=$strt;$i<=2013;$i++)
{

$table=$gndr.'_'.$i;		
$qur="select  amount from $table where name='$name'";
//echo $qur;
$result=mysqli_query($con,$qur)or die("error querying database") or die("error querying database");
$final=mysqli_fetch_array($result);
$val=$final["amount"];
$arr[$c][0]=$i;
$arr[$c][1]=$val;
$c++;

}
/>
