<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="shortcut icon" href="img/favicon.ico">
    <title>CUSTOMER INFORMATION</title>
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
    td{
      background: rgb(25, 29, 0);
      text-align:center;
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

	    <div class="container">
        <h2 class="text-center pt-4" style="color:rgb(171, 8, 4);font-family:tahoma;font-size:24px;font-weight:bold">CUSTOMER INFORMATION</h2>
            <?php
                include 'config.php';
                $sid=$_GET['id'];
                $sql = "SELECT * FROM  customers where id=$sid";
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
                    <th class="text-center">ACC NO</th>
                    <th class="text-center">NAME</th>
                    <th class="text-center">EMAIL</th>
                    <th class="text-center">BALANCE</th>
                </tr>
                <tr>
                    <td class="py-2"><?php echo $rows['ID'] ?></td>
                    <td class="py-2"><?php echo $rows['NAME'] ?></td>
                    <td class="py-2"><?php echo $rows['EMAIL'] ?></td>
                    <td class="py-2"><?php echo $rows['BALANCE'] ?></td>
                </tr>
            </table>
        </div>
    </div>
  </div>
</body>
</html>