<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>Names Selection</title>
<link type="text/css" rel="stylesheet" href="style.css">
 <script type="text/javascript"
        src="http://ajax.googleapis.com/ajax/libs/jquery/1.7.2/jquery.min.js"></script>
        <script type="text/javascript"
        src="https://ajax.googleapis.com/ajax/libs/jqueryui/1.8.18/jquery-ui.min.js"></script>
        <link rel="stylesheet" type="text/css"
        href="http://ajax.googleapis.com/ajax/libs/jqueryui/1.8/themes/base/jquery-ui.css" />
 
        <script type="text/javascript">
                $(document).ready(function(){
                    $("#name").autocomplete({
                        source:'search.php',
                        minLength:1,
                        limit : 5
                    });
                });
        </script>

</head>

<body>
<div id="cover">
<div id="header">
<h1>Baby Names</h1>
</div>


<div id="sides">
<h1>Search By Name</h1>
<form  action="" method="POST" >
<h3>Please enter the name</h3>
<label>Name:</label><input type="text" name="typeahead" id='name'/><br><br>
<label>Year: </label><input type="text" name="start"/><br>

<h3>Enter your choice for name</h3>
<label>Girl</label><input type="radio" value="female" name="gender"><br>
<label>Boy</label><input type="radio" value="male" name="gender"><br><br>
<input type="submit" value=submit class="button">
</form>
</div>

<div id="main">
<h1>Search By Year</h1>
<form action="names_script.php" method="POST" >


<h3>Please enter the year</h3>
<label>Year:</label><input type="text" name="year"/><br>

<h3>Enter your choice for gender</h3>
<label>Male</label><input type="checkbox" name="gender[]" value="Male"><br>
<label>female</label><input type="checkbox" name="gender[]" value="Female"><br>
<h3> How many results you want to view</h3>
<label>range:<range><input type="number"  min="1" max="2100" name="output"/><br>
<br>
<input type=submit value=submit class="button">
<br>
</form>
</div>
<div id="footer">
</div>
</div>


</body>

</html>
