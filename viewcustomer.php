<?php
$pdo = new PDO('mysql:host=localhost;port=3307;dbname=banksystem', 'root', '');
$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
$statement = $pdo->prepare('SELECT * FROM customers ');
$statement->execute();
$products = $statement->fetchAll(PDO::FETCH_ASSOC);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="shortcut icon" href="img/favicon.ico">
    <title>VIEW CUSTOMERS</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <link rel="stylesheet" type="text/css" href="css/table.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="table.css">
    <link rel="stylesheet" href="nav.css">

    <style type="text/css">

      button:hover{
        background-color: black;
        color: white;
        transition: 0.2s;
      }
      th{
        background: rgb(14, 5, 254);
        color: rgb(218, 255, 255);
      }
      td{
        background: rgb(25, 29, 0);
        text-align:center;
      }
      body {
          font-family: "Lato", sans-serif;
        }
      h1 {
            text-align: center;}
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

<?php
    include 'config.php';
    $sql = "SELECT * FROM customers";
    $result = mysqli_query($conn,$sql);
?>

    <div class="container">
        <h2 class="text-center pt-4" style="color: rgb(171, 8, 4);font-family:tahoma;font-size:24px;font-weight:bold">CUSTOMERS</h2>
        <br>
        <div class="bg-img">
            <div class="row">
                <div class="col">
                    <div class="table-responsive-sm">
                    <table class="table table-dark table-bordered">
                        <thead>
                            <tr>
                            <th scope="col" class="text-center py-2">ACC NO</th>
                            <th scope="col" class="text-center py-2">NAME</th>
                            <th scope="col" class="text-center py-2">EMAIL</th>
                            <th scope="col" class="text-center py-2">BALANCE</th>
                            <th scope="col" class="text-center py-2">OPERATION</th>
                            </tr>
                        </thead>
                    <tbody>
                <?php
                    while($rows=mysqli_fetch_assoc($result)){
                ?>
                    <tr>
                        <td class="table-dark"><?php echo $rows['ID'] ?></td>
                        <td class="table-dark"><?php echo $rows['NAME']?></td>
                        <td class="table-dark"><?php echo $rows['EMAIL']?></td>
                        <td class="table-dark"><?php echo $rows['BALANCE']?></td>
                        <td class="table-dark">
                        <a href="viewuser.php?id= <?php echo $rows['ID'] ;?>">
                        <button type="button" class="btn btn-info">View</button></a>
                        </td>
                    </tr>   
                <?php
                    }
                ?>
                    </tbody>
                    </table>
                    </div>
                </div>
            </div>
         </div>
    </div>
</div>
<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ho+j7jyWK8fNQe+A12Hb8AhRq26LrZ/JpcUGGOn+Y7RsweNrtN/tE3MoK7ZeZDyx" crossorigin="anonymous"></script>
</body>
</html>