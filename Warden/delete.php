<?php
		$host = "localhost";
        $dbUsername = "id16977335_teamgoogle";
        $dbPassword = "Password123?";
        $dbName = "id16977335_parcel";
$con=mysqli_connect($host, $dbUsername, $dbPassword,$dbName);
// Check connection
if (mysqli_connect_errno())
{
echo "Failed to connect to MySQL: " . mysqli_connect_error();
}		
$sql = "DELETE FROM warden WHERE id='" . $_GET["id"] . "'";
if (mysqli_query($con, $sql)) {
    header("Location: warden.php");
} else {
    echo "Error deleting record: " . mysqli_error($conn);
}

mysqli_close($con);
?>