<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Transaction</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <link rel="stylesheet" type="text/css" href="css/table.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="table.css">
    <link rel="stylesheet" href="nav.css">

    <style type="text/css">
    	th{
        background: rgb(14, 5, 254);
        color: rgb(218, 255, 255);
        }
		button{
			border:none;
			background: rgb(1, 152, 14);
		}
	    button:hover{
			background-color:rgb(1, 112, 20);
			transform: scale(1.1);
			color:white;
		}
        body {font-family: "Lato", sans-serif;}
        h1 {text-align: center;}

        .main {
            margin-left: 160px; 
            padding: 0px 10px;
        }
    </style>
</head>

<body style="background: rgb(102, 255, 184);">

  <div id="nav">
    <a href="index.php">HOME</a>
    <a href="viewcustomer.php">VIEW CUSTOMERS</a>
    <a href="transfer.php">TRANSFER MONEY</a>
    <a href="transaction.php">TRANSACTION HISTORY</a>        
  </div>

  <div class="main">
    <?php
    include 'config.php';

    if(isset($_POST['cancel'])){
        echo '<script type="text/javascript">';
        echo 'alert("Your Transaction is cancelled")';
        echo '</script>';
    }

    if(isset($_POST['submit']))
    {
    $from = $_GET['id'];
    $to = $_POST['to'];
    $amount = $_POST['BALANCE'];

    $sql = "SELECT * from customers where id=$from";
    $query = mysqli_query($conn,$sql);
    $sql1 = mysqli_fetch_array($query); 

    $sql = "SELECT * from customers where id=$to";
    $query = mysqli_query($conn,$sql);
    $sql2 = mysqli_fetch_array($query);

    if (($amount)<0 || $amount == 0)
   {
        echo '<script type="text/javascript">';
        echo ' alert("Sorry! Invalid Amount cannot be transferred")';  
        echo '</script>';
    }

    else if($amount > $sql1['BALANCE']) 
    {
        
        echo '<script type="text/javascript">';
        echo ' alert("Sorry! Insufficient Balance")'; 
        echo '</script>';
    }

    else 
    {
        $newbalance = $sql1['BALANCE'] - $amount;
        $sql = "UPDATE customers set BALANCE=$newbalance where id=$from";
        mysqli_query($conn,$sql);
             
        $newbalance = $sql2['BALANCE'] + $amount;
        $sql = "UPDATE customers set BALANCE=$newbalance where id=$to";
        mysqli_query($conn,$sql);
                
        $sender = $sql1['NAME'];
        $receiver = $sql2['NAME'];
        $sql = "INSERT INTO transaction(`sender`, `receiver`, `amount`) VALUES ('$sender','$receiver','$amount')";
        $query=mysqli_query($conn,$sql);

        if($query){
            echo "<script> alert('Hurray! Transaction Successful');
                   window.location='transaction.php';
                   </script>";       
                }

        $newbalance= 0;
        $amount =0;
    }
}
?>

	<div class="container">
        <h2 class="text-center pt-4" style="color:rgb(171, 8, 4);font-family:tahoma;font-size:24px;font-weight:bold">TRANSACTION</h2>
            <?php
                include 'config.php';
                $sid=$_GET['id'];
                $sql = "SELECT * FROM  customers where ID=$sid";
                $result=mysqli_query($conn,$sql);
                if(!$result)
                {
                    echo "Error : ".$sql."<br>".mysqli_error($conn);
                }
                $rows=mysqli_fetch_assoc($result);
            ?>
            <form method="post" name="tcredit" class="tabletext" ><br>
            
        <div>
            <table class="table table-dark table-bordered">
                <tr>    
                    <th scope="col" class="text-center py-2">ACC NO</th>
                    <th class="text-center">SENDER</th>
                    <th class="text-center">EMAIL</th>
                    <th class="text-center">BALANCE</th>
                </tr>
                
                <tr>
                    <td class="text-center"><?php echo $rows['ID'] ?></td>
                    <td class="text-center"><?php echo $rows['NAME'] ?></td>
                    <td class="text-center"><?php echo $rows['EMAIL'] ?></td>
                    <td class="text-center"><?php echo $rows['BALANCE'] ?></td>
                </tr>   
            </table>
        </div>
        <br>
        <label>Transfer To:</label>
        <select name="to" class="form-control" required>
            <option value="" disabled selected>Choose Receiver</option>
            <?php
                include 'config.php';
                $sid=$_GET['id'];
                $sql = "SELECT * FROM customers where id!=$sid";
                $result=mysqli_query($conn,$sql);
                if(!$result)
                {
                    echo "Error ".$sql."<br>".mysqli_error($conn);
                }
                while($rows = mysqli_fetch_assoc($result)) {
            ?>
                <option class="table table-dark table-bordered" value="<?php echo $rows['ID'];?>" >
                
                    <?php echo $rows['NAME'] ;?> (Balance: 
                    <?php echo $rows['BALANCE'] ;?> ) 
               
                </option>
            <?php 
                } 
            ?>
            <div>
        </select>
        <br>
        <br>
            <label>Amount:</label>
            <input type="number" class="form-control" name="BALANCE" placeholder="Enter the Amount" required>  
            <br><br>
                <div class="text-center" >
            <button class="btn btn-success" name="submit" type="submit" id="myBtn">Transfer</button>
            &nbsp;&nbsp;&nbsp;
            <button class="btn btn-danger" name="cancel " type="cancel" >Cancel</button>
            
            </div>
        </form>
    </div>
  </div>
<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ho+j7jyWK8fNQe+A12Hb8AhRq26LrZ/JpcUGGOn+Y7RsweNrtN/tE3MoK7ZeZDyx" crossorigin="anonymous"></script>
</body>
</html>