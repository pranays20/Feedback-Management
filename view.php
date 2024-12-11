

<!DOCTYPE html>
<html lang="en">
<head>
    <title>Informatio</title>
    <link rel="icon" href=".\logo.png" type="image/icon type">

	<meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
            background-color: #f4f4f4;
        }

        .container {
            width: 80%;
            margin: 0 auto;
        }
		.btn{
            
			display: flex;
			justify-content: center; /* Centers content horizontally */
			
			
			color: white;
			font-size: 16px;
			border: none;
			border-radius: 4px;
			
        }
        header {
            background-color: #333;
            color: #fff;
            padding: 20px 0;
            text-align: center;
        }

        h1 {
            margin: 0;
        }

        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 20px;
            background-color: #fff;
            border-radius: 5px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }

        th, td {
            padding: 12px;
            text-align: left;
            border-bottom: 1px solid #ddd;
        }

        th {
            background-color: #007bff;
            color: #fff;
        }

        tr:hover {
            background-color: #f9f9f9;
        }

        td:last-child {
            text-align: center;
        }

        .no-emails {
            text-align: center;
            padding: 20px;
        }
        .form
        {
            padding: 30px;
            bottom: 90px;
            margin:90px;
        }
    </style>
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
    <header>
        <div class="container">
            <h1>Info</h1>
       </div>
	  
    </header>
	<br>
   

    <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
    <label for="filter">Filter by:</label>
    <select name="filter" id="filter">
        <option value="all">All</option>
        <option value="name">Name</option>
        <option value="surname">Surname</option>
        <option value="email">Email</option>
        <option value="message">Message</option>
        <option value="date">Date</option>
        <option value="amenities">amenities</option>
        <option value="cleanliness">cleanliness</option>
        <option value="staff">staff</option>
        
        
        <!-- Add date filter option -->
    </select>
    <!-- Add date range inputs -->
    <label for="from_date">From:</label>
    <input type="date" id="from_date" name="from_date">
    <label for="to_date">To:</label>
    <input type="date" id="to_date" name="to_date">
    <input type="text" name="search" placeholder="Search...">
 
    <input type="submit" value="Apply Filter">
</form>

    <div class="container">
        <table>
            <thead>
                <tr>
                    <th>Name</th>
                    <th>Surname</th>
                    <th>Email</th>
                    <th>Message</th>
                    <th>amenities</th>
                    <th>cleanliness</th>
                    <th>staff</th>


                </tr>
            </thead>
            <tbody>
                <?php
                // Database connection
                $servername = "localhost";
                $username = "root"; // Replace with your MySQL username
                $password = ""; // Replace with your MySQL password
                $dbname = "mayi"; // Replace with your database name

                $conn = new mysqli($servername, $username, $password, $dbname);

                if ($conn->connect_error) {
                    die("Connection failed: " . $conn->connect_error);
                }


                // Fetch data from the database
                $sql = "SELECT * FROM inse";
                $result = $conn->query($sql);


                  
                    // Fetch data from the database based on filter criteria
// Fetch data from the database based on filter criteria
$filter = isset($_POST['filter']) ? $_POST['filter'] : 'all';
$search = isset($_POST['search']) ? $_POST['search'] : '';
$from_date = isset($_POST['from_date']) ? $_POST['from_date'] : '';
$to_date = isset($_POST['to_date']) ? $_POST['to_date'] : '';

$sql = "SELECT * FROM inse";

if ($filter != 'all') {
    if ($filter == 'date' && !empty($from_date) && !empty($to_date)) {
        $sql .= " WHERE submission_date BETWEEN '$from_date' AND '$to_date'";
    } else {
        $sql .= " WHERE $filter LIKE '%$search%'";

    }
}

$result = $conn->query($sql);




                if ($result->num_rows > 0) {
                    // Output data of each row
                    while($row = $result->fetch_assoc()) {
                        echo "<tr>";
                        echo "<td>" . $row["Name"] . "</td>";
                        echo "<td>" . $row["Surname"] . "</td>";
                        echo "<td>" . $row["Email"] . "</td>";
                        echo "<td>" . $row["message"] . "</td>";
                        echo "<td>" . $row["amenities"] . "</td>";
                        echo "<td>" . $row["cleanliness"] . "</td>";
                        echo "<td>" . $row["staff"] . "</td>";
                        
                      //  echo "<td><a href='view_email.php?id=" . $row["id"] . "' target='_blank'>View</a></td>";
                        echo "</tr>";
                    }
                } else {
                    echo "<tr><td colspan='4' class='no-emails'>No emails found.</td></tr>";
                }
                $conn->close();
                ?>
            </tbody>
        </table>
    </div>
	<div class="btn">
	<a href="FeedBackFetteche.html">
		<button>Go to Login</button>
	</a>
	</div>

</body>
</html>
<?php
$conn =mysqli_connect('localhost','root','','mayi');
//$q="INSERT INTO `inse` (`Name`, `Surname`, `Email`, `message`) VALUES ('m', 'oooo', 'mmmmkdjekm', 'iii')";
$q="SELECT * FROM `inse`";

$mmm=mysqli_query($conn,$q);



if($mmm->num_rows>0)
{
    while($row=mysqli_fetch_row($mmm))
    {

    }
}

?>
