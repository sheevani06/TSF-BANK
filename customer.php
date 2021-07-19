<?php

    include 'partials/dbconnect.php';
    $sql="SELECT * FROM customer_table";

    $result=mysqli_query($conn,$sql);

    $num=mysqli_num_rows($result);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Customer details</title>
    <link rel="stylesheet" href="css/style.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
</head>
<body>
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
                        <a class="nav-link text-primary mx-2 text-center" href="transfer.php">TRANSFER MONEY</a>
                    </li>  
                    <li class="nav-item">
                        <a class="nav-link text-primary mx-2 text-center" href="contact.php">CONTACT</a>
                    </li>  
                </ul>
            </div>
        </div>
    </nav>
    <div class="container p-4">
        <h1 class="text-center m-3">Customer Details</h1>
        <div class="table-responsive">
            <table class="table table-striped ">
            <tr>
                <th class="heading">Sno.</th>
                <th class="heading">Name</th>
                <th class="heading">Email</th>
                <th class="heading">Current Balance</th>
            </tr>
        
            <?php
                if($num>0){
                    while($row=mysqli_fetch_assoc($result)){
            ?>
            <tr>
                <td><?php   echo $row["sno"];   ?></td>
                <td><?php   echo $row["name"];   ?></td>
                <td><?php   echo $row["email"];   ?></td>
                <td><?php   echo $row["current_balance"];   ?></td>
            </tr>
            <?php
                }}
            ?>
            </table>
        </div>
    </div>

    <div class="container-fluid p-3 bg-secondary">
        <div class="container">
            <span class="glyphicon glyphicon-copyright" aria-hidden="true"></span>
            <p class="text-center m-0">2021 All rights reserved. By Shivani Soni</p>
        </div>
    </div>


    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js" integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous"></script>
</body>
</html>