<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="shortcut icon" href="img/favicon.ico">
    <title>TRANSACTION HISTORY</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z" crossorigin="anonymous">
    <link rel="stylesheet" type="text/css" href="css/table.css">
    <link rel="stylesheet" href="nav.css">
    <link rel="stylesheet" href="table.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

<style type="text/css">
  th{
    background: rgb(14, 5, 254);
    color: rgb(218, 255, 255);
    }
  td{
    background: rgb(25, 29, 0);
    }

body {font-family: "Lato", sans-serif;}
h1 {text-align: center;}

.main {
  margin-left: 160px; 
  padding: 0px 10px;
}

</style>
</head>

<body style="background:rgb(102, 255, 184);">
  <div id="nav">
    <a href="index.php">HOME</a>
    <a href="viewcustomer.php">VIEW CUSTOMERS</a>
    <a href="transfer.php">TRANSFER MONEY</a>
    <a href="transaction.php">TRANSACTION HISTORY</a>        
  </div>
  
<div class="main">
	<div class="container">
    <h2 class="text-center pt-4" style="color:rgb(171, 8, 4);font-family:tahoma;font-size:24px;font-weight:bold">TRANSACTION HISTORY</h2>
    <br>
    <div class="table-responsive-sm">
    <table class="table table-dark table-bordered">
        <thead>
            <tr>
                <th class="text-center">SNO</th>
                <th class="text-center">SENDER</th>
                <th class="text-center">RECEIVER</th>
                <th class="text-center">AMOUNT TRANSFERRED</th>
                <th class="text-center">TRANSACTION TIME</th>
            </tr>
        </thead>
        <tbody>
        <?php

            include 'config.php';

            $sql ="select * from transaction";

            $query =mysqli_query($conn, $sql);

            while($rows = mysqli_fetch_assoc($query))
            {
        ?>

          <tr>
            <td class="py-2"><?php echo $rows['SNO']; ?></td>
            <td class="py-2"><?php echo $rows['SENDER']; ?></td>
            <td class="py-2"><?php echo $rows['RECEIVER']; ?></td>
            <td class="py-2"><?php echo $rows['AMOUNT']; ?> </td>
            <td class="py-2"><?php echo $rows['DATETIME']; ?> </td>
          </tr>
        <?php
            }

        ?>
    
        </tbody>
    </table>

  </div>
</div>
<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ho+j7jyWK8fNQe+A12Hb8AhRq26LrZ/JpcUGGOn+Y7RsweNrtN/tE3MoK7ZeZDyx" crossorigin="anonymous"></script>
</body>
</html>