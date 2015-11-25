<!doctype html>
<html> 
<head>
  <style><link type="text/css" rel="stylesheet" href="script2_graph.css"></style>

</head> 
<body> 
<img>
<?php 

$name=$_POST["typeahead"];    
$gndr=$_POST["gender"];
//$year=$_POST["year"];
$strt=$_POST["start"];
if(($strt>2013)||($strt<1944))
{
header("refresh:2;url=names.html");
echo "<h3>year out of bound ! You will be redireted to main page</h3>";
}
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
draw_bar_graph(1100,550,$arr,300,"my_image.png");
  // Custom function to draw a bar graph given a data set, maximum value, and image filename
  function draw_bar_graph($width, $height, $data, $max_value, $filename) {
    // Create the empty graph image
    $img = imagecreatetruecolor($width, $height);

    // Set a white background with black text and gray graphics
    $bg_color = imagecolorallocate($img, 0, 0, 0);       // black
    $text_color = imagecolorallocate($img, 255, 255, 255);     // white
    $bar_color = imagecolorallocate($img, 200, 0, 0);            // black
    $border_color = imagecolorallocate($img, 192, 192, 192);   // light gray

    // Fill the background
    imagefilledrectangle($img, 0, 0, $width, $height, $bg_color);

    // Draw the bars
    $bar_width = $width / ((count($data) * 2) + 1);
    for ($i = 0; $i < count($data); $i++) {
      imagefilledrectangle($img, ($i * $bar_width * 2) + $bar_width, $height,
        ($i * $bar_width * 2) + ($bar_width * 2), $height - (($height / $max_value) * $data[$i][1]), $bar_color);
      imagestringup($img, 5, ($i * $bar_width * 2) + ($bar_width), $height - 5, $data[$i][0], $text_color);
    }

    // Draw a rectangle around the whole thing
    imagerectangle($img, 0, 0, $width - 1, $height - 1, $border_color);

    // Draw the range up the left side of the graph
    for ($i = 1; $i <= $max_value; $i=$i+10) {
      imagestring($img, 4, 0, $height - ($i * ($height / $max_value)), $i, $bar_color);
    }

    // Write the graph image to a file
    imagepng($img, $filename, 5);
    imagedestroy($img);
  } // End of draw_bar_graph() function



mysqli_close($con);
echo '<div id="image"> <img src="my_image.png" alt="unable to load" /></div>';
/>
