<html>
	<head>
	<meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
	</head>
	<body>
		<nav class="navbar navbar-default">
  <div class="container-fluid">
    <div class="navbar-header">
      <a class="navbar-brand" href="#">Hotel Management</a>
    </div>
    <ul class="nav navbar-nav">
      <li class="active"><a href="index.html">Home</a></li>
     
    </ul>
  </div>
</nav>
	</body>
</html>
<?php
$name=$_POST["name"];
$surname=$_POST["surname"];
$emails=$_POST["email"];
$message=$_POST["message"];
$cleanliness = $_POST['cleanliness'];
$staff = $_POST['staff'];
$amenities = $_POST['amenities'];

$conn = mysqli_connect("localhost", "root", "", "mayi");
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}

//$q="INSERT INTO `inse` (`Name`, `Surname`, `Email`, `message`) VALUES ('m', 'oooo', 'mmmmkdjekm', 'iii')";
$q ="INSERT INTO inse (Name, Surname, Email, message, cleanliness, staff, amenities) VALUES ('$name', '$surname', '$emails', '$message', '$cleanliness', '$staff', '$amenities')";



$result=mysqli_query($conn,$q);
if($result)
{
   #echo ' <script>alert("Submited FeedBack SuccessFully");</script>';
   echo '<script>
        alert("Submitted Feedback Successfully");
        window.location.href = "FeedBack.html";  // Replace "nextpage.php" with the page you want to redirect to
      </script>';
}
else {
    echo "Error: " . mysqli_error($conn);
}

?>
