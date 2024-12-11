<?php
$username=$_POST["username"];
$password=$_POST["password"];

if($username=="admin"and $password==123)
{
    echo ' <script>alert("Submited FeedBack SuccessFully");</script>';
    header("location:view.php");
}
else{
	
    echo ' <script>alert("Password Not Correct");</script>';
	
	
	#header("location:FeedBackFetteche.html");
   // header("location:validate.php");
}
?>
