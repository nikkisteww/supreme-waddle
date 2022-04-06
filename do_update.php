<?php session_start();
if (!isset($_SESSION['username'])) {
    header("location:index.php");
    // Make sure that code below does not execute when we redirect.
    exit;
}

// TODO: connect to the database
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "softball";


$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
echo "Connected successfully";

$opponent = $_POST['opponent'];
$site = $_POST['site'];
$result = $_POST['result'];
$id = $_POST['id'];


// TODO: initialize the variables used in $sql via the POST superglobal
$sql = "UPDATE games SET opponent='$opponent', site='$site', result='$result' WHERE id=" . $id;

// TODO: execute the query and if it works clear the error in the session
// (just to make sure)
// else
if ($conn->query($sql) === TRUE) {
    echo "Record updated successfully";
} else {
    echo "Error Updating record: " . $sql . "<br>" . $conn->error;
}


//TODO: set the error in the session to read "Error updating record: "
// and append the sql error message from the database


// TODO: close the db connection
$conn->close();

header("location:index.php");
?>
