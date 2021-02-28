<?php
session_start();
include "connection.php";
?>
<?php
$sql = "SELECT o.order_id ,f.name,o.order_type,a.quantity from orders as o, food as f ,order_food as a where o.order_id=a.order_id and a.food_id=f.food_id AND o.order_status=3";
$sql2 = "UPDATE orders SET order_status=4 WHERE order_id=$"
?>

<!DOCTYPE html>
<html lang="en" class="no-js">

<head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Orders</title>
    <link href="add.css" rel="stylesheet" media="all">
    <link href="home.css" rel="stylesheet" media="all">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <style>
        body {
            margin: 0;
            font-family: "Lato", sans-serif;
        }

        .scrollable {
            height: 1000px;
            overflow-y: auto;
        }

        .sidebar {
            margin: 0;
            padding: 0;
            top: 60px;
            width: 15%;
            background-color: #17252A;
            position: fixed;
            height: 100%;
            overflow: auto;
        }

        .sidebar a {
            display: block;
            color: white;
            padding: 16px;
            text-decoration: none;
        }

        .sidebar a.active {
            background-color: #4CAF50;
            color: white;
        }

        .sidebar a:hover:not(.active) {
            background-color: #D1EAE2;
            color: black;
        }

        .container1 {
            margin-left: 18%;
            margin-top: 7%;
        }

        div.content {
            margin-left: 200px;
            padding: 1px 16px;
            height: 1000px;
        }

        .menu {
            background-color: #D1EAE2;
        }

        .button1 {
            margin-top: 75px;
            background-color: #2B7A78;
            color: white;
            border: none;
            font-family: "times new roman";
            font-style: "bold";
            padding: 15px 20px;
            text-align: center;
            text-decoration: none;
            display: inline-block;
            font-size: 16px;
            border-radius: 2px;

        }

        h4 {
            color: #2B7A78;
            font-family: 'Franklin Gothic Medium', 'Arial Narrow', Arial, sans-serif
        }

        @media screen and (max-width: 700px) {
            .sidebar {
                width: 100%;
                height: auto;
                position: relative;
            }

            .sidebar a {
                float: left;
            }

            div.content {
                margin-left: 0;
            }
        }

        @media screen and (max-width: 400px) {
            .sidebar a {
                text-align: center;
                float: none;
            }
        }
    </style>

</head>

<body>
    <div class="topnav topnav1">

        <div class="topnav-right">
            <a href="login.html">Logout</a>
        </div>
    </div>
    <div class="sidebar">
        <a class="fa fa-book" href="#menu"> Update Menu</a>
        <a class="fa fa-plus" href="http://localhost/New%20folder/add.php"> Orders</a>
        <a class="fa fa-envelope-o" href="#feedback"> Feedback</a>
        <a class="fa fa-user-o" href="#profile"> Profile</a>
    </div>
    <div class="container1">
        <?php
        $sql = "SELECT o.order_id ,f.name,o.order_type,a.quantity from orders as o, food as f ,order_food as a where o.order_id=a.order_id and a.food_id=f.food_id AND o.order_status=2";

        $result = mysqli_query($conn, $sql);
        while ($row = mysqli_fetch_assoc($result)) {
            ?>

            <div  style="display:flex; height:230px;">
            <div class="menu" style="width:100px; height:200px;">
        </div>
                <div class="menu" style="width:500px; height:200px;">
                    <h4>ORDER ID: <?php echo $row['order_id'] ?></h4>
                    <h4>NAME: <?php echo $row['name'] ?></h4>
                    <h4>ORDER TYPE: <?php echo $row['order_type'] ?></h4>
                    <h4>QUANTITY: <?php echo $row['quantity'] ?></h4>
                </div>
                <div class="menu" style="width:460px; height:200px;">
                    <button class="button1" type="button" class="button">Accept</button>
                </div>
            </div>
        <?php
        }
        ?>


    </div>

</body>

</html>