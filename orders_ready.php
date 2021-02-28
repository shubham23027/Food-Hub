<?php
session_start();   
include "connection.php";
?>

<?php
    
    $sql="SELECT o.order_id ,f.name,o.order_type,a.quantity from orders as o, food as f ,order_food as a where o.order_id=a.order_id and a.food_id=f.food_id AND o.order_status=3";
    $sql2="UPDATE orders SET order_status=4 WHERE order_id=1";
?>

<!DOCTYPE html>
<html lang="en" class="no-js">
<head>
<style>
    .scrollable{
        height: 1000px;

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
            
     .container{
        margin-left: 18%;
        margin-top: 7%;
        overflow-y:auto;
     }
    .menu{
         background-color: #D1EAE2;
     }
</style>

<meta charset="UTF-8" />
	<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1"> 
	<meta name="viewport" content="width=device-width, initial-scale=1.0"> 
    <link href="home.css" rel="stylesheet" media="all">
    <title>Orders</title>
    </head>
    <body>
         <div class=scrollable id="list">
            <div class="container">
            <?php
                $sql="SELECT o.order_id ,f.name,o.order_type,a.quantity from orders as o, food as f ,order_food as a where o.order_id=a.order_id and a.food_id=f.food_id AND o.order_status=3";

                $result = mysqli_query($conn,$sql);
               
                while($row=mysqli_fetch_assoc($result))
			    {
            ?>
            <div  style="display:flex; height:250px;">
                <div class="menu" style="width:100px; height:220px;">
                </div>

                <div class="menu" style="width:500px; height:220px;">
                    <h4>ORDER ID:<?php echo $row['order_id'] ?></h4>
                    <h4>NAME:<?php echo $row['name'] ?></h4>
                    <h4>ORDER Destination:<?php echo $row['order_type'] ?></h4>
                    <h4>(0:self service) </h4>
                    <h4>QUANTITY:<?php echo $row['quantity'] ?></h4>
                </div>

                <div class="menu" style="width:460px; height:220px;">
                    <a href="update_order2.php?order_id=<?php echo $row["order_id"];?>"><input type=submit class=button1 value="Proceed"></a>
                </div>
            </div>
                <?php
                }
                ?>
                
                <div>
                    <?php
                        $sql1="SELECT count(order_id) as count1 from orders where order_status=3";
                        $result1=mysqli_query($conn,$sql1);
                        $row = mysqli_fetch_array($result1);
                        $count=$row['count1'];
                        $x=0;
                        if($count==$x)
                        {
                        ?>
                        <h1>No new orders ready to deliver</h1>
                        <?php
                        }
                        ?>

                </div>
            </div>
        </div>
    </body>
</html>