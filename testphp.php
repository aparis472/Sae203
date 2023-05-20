<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "sae";

// connect to the database
$conn = new mysqli($servername, $username, $password, $dbname);

// check if there's an error in the connection
if ($conn->connect_errno) {
    echo "Failed to connect to MySQL: " . $conn->connect_error;
    exit();
}

$sql = "SELECT * FROM Mangas";
$result = $conn->query($sql);

// declare an array to store the data from the database
$rows = [];

if ($result->num_rows > 0) {
    // fetch all data from the database into the array
    $rows = $result->fetch_all(MYSQLI_ASSOC);
}
?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
</head>
<body>
    <h1>SAE : </h1>
<h2> Voici ce que contient ma base de données</h2>
    <?php
    if (!empty($rows)) {
        foreach ($rows as $row) {
           ?><h3><?php echo $row['Nom'];?></h3> <?php
        echo $row['Chapitres'];?><br> <?php
        echo $row['Note'];?>
        <br><br><?php
        }
    }
    ?>
</body>
</html>

<?php
// close the database connection
mysqli_close($conn);
?>