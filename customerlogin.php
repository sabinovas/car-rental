<?php
include('login_customer.php'); // Includes Login Script

if(isset($_SESSION['login_customer'])){
header("location: index.php"); //Redirecting
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Car Rental.</title>
    <link rel="stylesheet" href="./css/car_rental.css">
    <link rel="stylesheet" href="./css/bootstrap.min.css">
</head>
<body>
<header>
        <a href="#" class="logo">Car Rental<span>.</span></a>
        <div class="menutoggle" onclick="togglemenu();"></div>
        <?php
                if(isset($_SESSION['login_client'])){
            ?> 
                 <ul class="navigation">
            <li><a href="#banner" onclick="togglemenu();">Home</a></li>
            <li><a href="#about" onclick="togglemenu();">About</a></li>
            <li><a href="#menu" onclick="togglemenu();">Menu</a></li>
            <li><a href="#expert" onclick="togglemenu();">Expert</a></li>
            <li><a href="#testimonials" onclick="togglemenu();">testimonials</a></li>
            <li><a href="#contact" onclick="togglemenu();">Contact</a></li>
        </ul>
            <?php
                }
                else if (isset($_SESSION['login_customer'])){
            ?>
                <ul class="navigation">
            <li><a href="#banner" onclick="togglemenu();">Home</a></li>
            <li><a href="#about" onclick="togglemenu();">About</a></li>
            <li><a href="#menu" onclick="togglemenu();">Menu</a></li>
            <li><a href="#expert" onclick="togglemenu();">Expert</a></li>
            <li><a href="#testimonials" onclick="togglemenu();">testimonials</a></li>
            <li><a href="#contact" onclick="togglemenu();">Contact</a></li>
        </ul>
            <?php
            }
                else {
            ?>
                <ul class="navigation">
            <li><a href="#banner" onclick="togglemenu();">Home</a></li>
            <li><a href="#about" onclick="togglemenu();">Employee</a></li>
            <li><a href="customerlogin.php" onclick="togglemenu();">Customer</a></li>
            <li><a href="#expert" onclick="togglemenu();">Expert</a></li>
            <li><a href="#testimonials" onclick="togglemenu();">testimonials</a></li>
            <li><a href="#contact" onclick="togglemenu();">Contact</a></li>
        </ul>
            
                <?php   }
                ?>
    </header>
<div class="container" style="margin-top: 2%; margin-bottom: 2%;">
            <div class="col-md-5 col-md-offset-4">
                <label style="margin-left: 5px;color: red;"><span> <?php echo $error;  ?> </span></label>
                <div class="panel panel-primary">
                    <div class="panel-heading"> Login </div>
                    <div class="panel-body">

                        <form action="" method="POST">

                            <div class="row">
                                <div class="form-group col-xs-12">
                                    <label for="customer_username"><span class="text-danger" style="margin-right: 5px;">*</span> Username: </label>
                                    <div class="input-group">
                                        <input class="form-control" id="customer_username" type="text" name="customer_username" placeholder="Username" required="" autofocus="">
                                    
                                    </div>
                                </div>
                            </div>

                            <div class="row">
                                <div class="form-group col-xs-12">
                                    <label for="customer_password"><span class="text-danger" style="margin-right: 5px;">*</span> Password: </label>
                                    <div class="input-group">
                                        <input class="form-control" id="customer_password" type="password" name="customer_password" placeholder="Password" required="">

                                    </div>
                                </div>
                            </div>

                            <div class="row">
                                <div class="form-group col-xs-4">
                                    <button class="btn btn-primary" name="submit" type="submit" value=" Login ">Submit</button>

                                </div>

                            </div>
                            <label style="margin-left: 5px;">or</label> <br>
                            <label style="margin-left: 5px;"><a href="customersignup.php">Create a new account.</a></label>
                        </form>
                    </div>
                </div>
            </div>
        </div>

        
    <div class="copyright-text">
        <p>copyright 2021 <a href="#">Pratik Kamat</a>. All right Reserved</p>
    </div>
    <script src="./js/car_rental.js"></script>
</body>
</html>