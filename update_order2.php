<?php
session_start();   
include "connection.php";
?>

<?php
$result = mysqli_query($conn, "SELECT * FROM orders WHERE order_id='" . $_GET['order_id'] . "'");
$row = mysqli_fetch_array($result);
$id=$row['order_id'];

$u_id=$row['user_id'];

$conn->query("UPDATE orders SET order_status = '4' WHERE order_id = '$id'");
$result = mysqli_query($conn, $query);

    
$result1=mysqli_query($conn,"SELECT * FROM user where user_id='$u_id'");
$row1=mysqli_fetch_array($result1);
$mail=$row1['email'];

// $to="shubhamkelkar2302@gmail.com";
$body="Your order ORDER ID:$id is ready and will be delivered shortly";
$header="From:manager@Home";
$subject="Your order";

mail($mail,$subject,$body,$header);

    header('location:manager.php');
    header('Refresh:2');

?>