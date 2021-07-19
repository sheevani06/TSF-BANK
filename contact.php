<?php
    include 'partials/dbconnect.php';
    $showAlert=false;
    $showError=false;
    if($_SERVER['REQUEST_METHOD']=='POST'){
        $fname=$_POST['fname'];
        $lname=$_POST['lname'];
        $email=$_POST['email'];
        $number=$_POST['number'];
        $comments=$_POST['comments'];

        $sql="INSERT INTO contact (fname,lname,email,number,comments) VALUES ('$fname', '$lname','$email','$number','$comments')";
        $result=mysqli_query($conn,$sql);
        if($result){
            $showAlert=true;
        }
    }

?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="css/style.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
</head>
<body>
    
    <?php
        if($showAlert){
            echo '<div class="alert alert-success alert-dismissible fade show mb-0" role="alert">
        <strong>Your details submitted succesfully!</strong>
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
                        <a class="nav-link text-primary mx-2 text-center" href="transfer.php">TRANSFER MONEY</a>
                    </li>  
                    <li class="nav-item">
                        <a class="nav-link text-primary mx-2 text-center" href="contact.php">CONTACT</a>
                    </li>  
                </ul>
            </div>
        </div>
    </nav>

    <div class="container p-5">
        <h1 class="text-center m-4 ">Contact Us</h1>
        <form action="/bank/contact.php" class="row g-3 mt-5" method="post">
            <div class="col-md-6">
                <label for="fname" class="form-label">First Name</label>
                <input type="text" class="form-control" id="fname" name="fname" required>
            </div>
            <div class="col-md-6">
                <label for="lname" class="form-label">Last Name</label>
                <input type="text" class="form-control" id="lname" name="lname" required>
            </div>
            <div class="col-md-6">
                <label for="email" class="form-label">E-mail</label>
                <input type="email" class="form-control" id="email" name="email" required>
            </div>
            <div class="col-md-6">
                <label for="number" class="form-label">Phone Number</label>
                <input type="number" class="form-control" id="number" name="number" required>
            </div>
            <div class="col-md-12">
                <label for="comments" class="form-label">Comments, questions ?</label>
                <textarea name="comments" id="comments" cols="30" rows="3" class="form-control" required></textarea>
            </div>
            <div class="col-md-12">
                <input type="submit" class="btn btn-primary" value="Submit">
            </div>
        </form>
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
</html>