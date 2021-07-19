<?php
    $showAlert=false;
    $showError=false;
    include 'partials/dbconnect.php';
    if($_SERVER['REQUEST_METHOD']=='POST'){
        $amount=$_POST['amount'];
        $from=$_POST['from'];
        $to=$_POST['to'];

        $check="SELECT current_balance FROM customer_table WHERE email='$from'";
        $result=mysqli_query($conn,$check);
        $row=mysqli_fetch_assoc($result);
        if($row["current_balance"]>=$amount){
            $row["current_balance"]=$row["current_balance"]-$amount;
            $deduct=$row["current_balance"];
            $sql="UPDATE customer_table SET current_balance='$deduct' WHERE email='$from'";
            $result=mysqli_query($conn,$sql);

            $check="SELECT current_balance FROM customer_table WHERE email='$to'";
            $result=mysqli_query($conn,$check);
            $row=mysqli_fetch_assoc($result);
            $row["current_balance"]=$row["current_balance"]+$amount;
            $add=$row["current_balance"];
            $state="UPDATE customer_table SET current_balance='$add' WHERE email='$to'";
            $result=mysqli_query($conn,$state);
            if($result){
                $showAlert=true;
            }
        }
        else{
            $showError="Invalid Credentials";
        }
    }
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Transfer Money</title>
    <link rel="stylesheet" href="css/style.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
</head>
<body>
    <?php
        if($showAlert){
            echo '<div class="alert alert-success alert-dismissible fade show mb-0" role="alert">
        <strong>Transaction done successfully!</strong>
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
       </div>';
        }
        if($showError){
            echo '<div class="alert alert-danger alert-dismissible fade show mb-0" role="alert">
        <strong>Error!</strong> '.$showError.'
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
       </div>';
        }
    
    ?>
    <nav class="navbar navbar-expand-lg bg-dark navbar-dark ">
        <div class="container">
            <a class="navbar-brand" href="#">
                <h2 class="text-light"><small>MY <span class="text-primary">SPARK BANK</span></small></h2>
            </a>

            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#collapsibleNavbar">
                <span class="navbar-toggler-icon"></span>
            </button>

            <div class="collapse navbar-collapse" id="collapsibleNavbar">
                <ul class="navbar-nav ms-auto">
                    <li class="nav-item">
                        <a class="nav-link text-primary mx-2 text-center " href="home.php">HOME</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link text-primary mx-2 text-center" href="customer.php">CUSTOMER</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link text-primary mx-2 text-center" href="#">TRANSFER MONEY</a>
                    </li>  
                    <li class="nav-item">
                        <a class="nav-link text-primary mx-2 text-center" href="contact.php">CONTACT</a>
                    </li>  
                </ul>
            </div>
        </div>
    </nav>

    <div class="container p-4 d-flex flex-column align-items-center ">
        <h1 class=" m-3 text-dark">Transfer your money</h1>
        <div class="container m-5 d-flex flex-column align-items-center ">
            <form action="/bank/transfer.php" class="row g-3 w-100 bg-dark rounded-3 p-4" method="post">

                    <div class="row d-flex flex-column align-items-center ">
                        <div class="col-md-12 col-lg-9 g-3">
                            <label for="amount" class="form-label text-light" name="amount">Amount</label>
                            <input type="number" class="form-control" name="amount" id="amount" placeholder="Enter the amount" required>
                        </div>
                    </div>
                    <div class="row d-flex flex-column align-items-center">
                        <div class="col-md-12 col-lg-9 g-3">
                            <label for="from" class="form-label text-light" name="from">From</label>
                            <input type="email" class="form-control" name="from" id="from" placeholder="Enter the sender's email id" required>
                        </div>
                    </div>
                    <div class="row d-flex flex-column align-items-center">
                        <div class="col-md-12 col-lg-9 g-3">
                            <label for="to" class="form-label text-light" name="to">To</label>
                            <input type="email" class="form-control" name="to" id="to" placeholder="Enter the receiver's email id" required>
                        </div>
                    </div>
                    <div class="col-md-12 d-flex flex-column align-items-center">
                        <input type="submit" class="btn btn-primary" value="Submit">
                    </div>
            </form>
        </div>
        
    </div>
    
    <div class="container-fluid p-3 bg-secondary  ">
        <div class="container">
            <span class="glyphicon glyphicon-copyright" aria-hidden="true"></span>
            <p class="text-center m-0">2021 All rights reserved. By Shivani Soni</p>
        </div>
    </div>
   

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js" integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous"></script>
</body>
