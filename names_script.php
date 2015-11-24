<html> 
<head>
<link type="text/css" rel="stylesheet" href="script2_style.css">
</head> 
<body> 
<?php 
$host="localhost";
$user="root";
$password="";

$rng=$_POST["output"];
$year=$_POST["year"];
if(($year>2013)||$year<1944)
{
header("refresh:2;url=names.html");
echo "<h3>year out of bound ! You will be redireted to main page</h3>";
}
else
{
$con=mysqli_connect($host,$user,$password,'names')or die("error connecting to the database");
$gender=$_POST["gender"];
foreach($gender as $gndr)
{
$heading='<h3> SHOWING TOP  '.$rng.' RESULTS FOR '.strtoupper($gndr).'<br>'.'</h3>';
echo $heading;
$table=$gndr.'_'.$year;		
$qur="select name from $table limit 0,$rng";

//echo($qur);
$result=mysqli_query($con,$qur)or die("error querying database");
$i=1;
while($row=mysqli_fetch_array($result))
{
echo '<p>'.$i.' POSITION '.$row["name"].'<br>'.'</p>';
$i++;
}
echo '<br>';
}
mysqli_close($con);
}
?>
</body> 
</html> 
