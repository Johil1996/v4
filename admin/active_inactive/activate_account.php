<?php include '../database/database.php';

if (isset($_GET['id'])) {

$id = $_GET['id'];

	$Activate = "verified";
	$Code = "0";

    $query = mysqli_query($con,"SELECT * FROM account WHERE id = '$id'");
    while($row = mysqli_fetch_assoc($query)) {

    }

    mysqli_query($con,"UPDATE account SET status = '$Activate' WHERE id = '$id'");
    mysqli_query($con,"UPDATE account SET Code = '$Code' WHERE id = '$id'");

    echo "<script>alert('Successfull activate')</script>";
    header('location: /v4/admin/account.php?id='); 

    }
?>


