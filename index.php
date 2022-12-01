<!DOCTYPE html>
<html lang="en">
<?php 
session_start(); 
require 'connection.php';
$conn = Connect();
?>
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Car Rental.</title>
    <link rel="stylesheet" href="./css/car_rental.css">
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
            <li><a href="logout.php"><span class="glyphicon glyphicon-log-out"></span> Logout</a></li>

            <li><a href="#contact" onclick="togglemenu();">Contact</a></li>
            <li><a href="login.php">login</a></li>
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
            <li><a href="profile.php" onclick="togglemenu();">Profile</a></li>
            <li><a href="logout.php"><span class="glyphicon glyphicon-log-out"></span> Logout</a></li>
            <li><a href="#contact" onclick="togglemenu();">Contact</a></li>
        </ul>
            <?php
            }
                else {
            ?>
                <ul class="navigation">
            <li><a href="#banner" onclick="togglemenu();">Home</a></li>
            <li><a href="loginSupplier.php" onclick="togglemenu();">Supplier</a></li>
            <li><a href="loginCustomer.php" onclick="togglemenu();">Customer</a></li>
            <li><a href="#expert" onclick="togglemenu();">Expert</a></li>
            <li><a href="#testimonials" onclick="togglemenu();">testimonials</a></li>
            <li><a href="#contact" onclick="togglemenu();">Contact</a></li>
        </ul>
            
                <?php   }
                ?>
    </header>
    <section class="banner" id="banner">
        <div class="content">
            <h2>Always Choose The Best</h2>
            <p>A true car enthusiast will always remember people not by their names but by the cars they drive</p>
            <a href="#menu" class="btn" >Our Cars</a>     
        </div>
    </section>

    <section class="about" id="about">
        <div class="row">
            <div class="col50">
                <h2 class="title-text"><span>A</span>bout Us</h2>
                <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit.
                     Corrupti ducimus doloribus accusamus! Ipsam enim aut dolorem 
                     quaerat quae deleniti minus deserunt illo ea repellat non 
                     possimus delectus, corrupti dolorum saepe! Lorem ipsum dolor, 
                     sit amet consectetur adipisicing elit. Earum molestias suscipit
                      magni placeat ratione quidem autem deserunt architecto fugit 
                      quaerat totam, quisquam mollitia vero odit dignissimos sed 
                      ipsa iste. Ipsum!<br><br><br>
                     Lorem ipsum dolor sit amet consectetur adipisicing elit.
                      Eos perspiciatis dolores nam at maiores? Eligendi rem 
                      voluptatum iste libero praesentium unde, ratione laudantium 
                      delectus iusto! Numquam laboriosam aperiam saepe voluptate?
                      Lorem ipsum dolor sit amet consectetur adipisicing elit.
                      Eos perspiciatis dolores nam at maiores? Eligendi rem 
                      voluptatum iste libero praesentium unde, ratione laudantium 
                      delectus iusto! Numquam laboriosam aperiam saepe voluptate?
                    </p>
            </div>
            <div class="col50">
                <div class="imgBx">
                    <img src="images/car1.jpg">
                </div>
            </div>
        </div>
    </section>

    <section class="menu-content">
            <?php   
            $sql1 = "SELECT * FROM cars WHERE car_availability='yes'";
            $result1 = mysqli_query($conn,$sql1);

            if(mysqli_num_rows($result1) > 0) {
                while($row1 = mysqli_fetch_assoc($result1)){
                    $car_id = $row1["car_id"];
                    $car_name = $row1["car_name"];
                    $ac_price = $row1["ac_price"];
                    $ac_price_per_day = $row1["ac_price_per_day"];
                    $non_ac_price = $row1["non_ac_price"];
                    $non_ac_price_per_day = $row1["non_ac_price_per_day"];
                    $car_img = $row1["car_img"];
               
                    ?>
            <a href="booking.php?id=<?php echo($car_id) ?>">
            <div class="sub-menu">
            

            <img class="card-img-top" src="<?php echo $car_img; ?>" alt="Card image cap">
            <h5><b> <?php echo $car_name; ?> </b></h5>
            <h6> AC Fare: <?php echo ("Rs. " . $ac_price . "/km & Rs." . $ac_price_per_day . "/day"); ?></h6>
            <h6> Non-AC Fare: <?php echo ("Rs. " . $non_ac_price . "/km & Rs." . $non_ac_price_per_day . "/day"); ?></h6>

            
            </div> 
            </a>
            <?php }}
            else {
                ?>
<h1> No cars available :( </h1>
                <?php
            }
            ?>                                   
        </section>
        
    <section class="expert" id="expert">
        <div class="title">
            <h2 class="title-text">Our Kitchen <span>E</span>xpert</h2>
            <p>Lorem ipsum dolor sit amet consectetur adipisicing elit.</p>
        </div>
        <div class="content">
            <div class="box">
                <div class="imgBx">
                    <img src="images/person1.jpg">
                </div>
                <div class="text">
                    <h3>Someone Famous</h3>
                </div>
            </div>
            <div class="box">
                <div class="imgBx">
                    <img src="images/person2.jpg">
                </div>
                <div class="text">
                    <h3>Someone Famous</h3>
                </div>
            </div>
            <div class="box">
                <div class="imgBx">
                    <img src="images/person3.jpg">
                </div>
                <div class="text">
                    <h3>Someone Famous</h3>
                </div>
            </div>
           
        </div>
    </section>

    <section class="testimonials" id="testimonials">
        <div class="title white">
            <h2 class="title-text">They <span>S</span>aid About Us</h2>
            <p>Lorem ipsum dolor sit amet consectetur adipisicing elit.</p>
        </div>
        <div>
            <div class="content">
                <div class="box">
                    <div class="imgBx">
                        <img src="images/review1.jpg">
                    </div>
                    <div class="text">
                        <p>Lorem ipsum dolor sit amet consectetur adipisicing elit.
                             Hic eligendi fugiat nisi illum, nesciunt asperiores expedita?
                              Laboriosam quae odio tempore rem amet odit voluptatem, 
                              provident perferendis voluptate. Eveniet, autem quos?</p>
                        <h3>Someone Famous</h3>
                    </div>
                </div>
                <div class="box">
                    <div class="imgBx">
                        <img src="images/review2.jpg">
                    </div>
                    <div class="text">
                        <p>Lorem ipsum dolor sit amet consectetur adipisicing elit.
                             Hic eligendi fugiat nisi illum, nesciunt asperiores expedita?
                              Laboriosam quae odio tempore rem amet odit voluptatem, 
                              provident perferendis voluptate. Eveniet, autem quos?</p>
                        <h3>Someone Famous</h3>
                    </div>
                </div>
                <div class="box">
                    <div class="imgBx">
                        <img src="images/review3.jpg">
                    </div>
                    <div class="text">
                        <p>Lorem ipsum dolor sit amet consectetur adipisicing elit.
                             Hic eligendi fugiat nisi illum, nesciunt asperiores expedita?
                              Laboriosam quae odio tempore rem amet odit voluptatem, 
                              provident perferendis voluptate. Eveniet, autem quos?</p>
                        <h3>Someone Famous</h3>
                    </div>
                </div>


            </div>
        </div>
    </section>

    <section class="contact" id="contact" style="margin-top: 20px;">
        <div class="title">
            <h2 class="title-text"><span>C</span>ontact Us</h2>
            <p style="color: #fff;">Lorem ipsum dolor sit amet consectetur adipisicing elit.</p>
        </div>
        <div class="contact-form">
            <h3>Send Message</h3>
            <div class="input-box">
                <input type="text" placeholder="Name">
            </div>
            <div class="input-box">
                <input type="text" placeholder="Email">
            </div>
            <div class="input-box">
                <textarea placeholder="name"></textarea>
            </div>
            <div class="input-box">
                <input type="submit" value="Send">
            </div>
        </div>
    </section>

    <div class="copyright-text">
        <p>copyright 2021 <a href="#">Pratik Kamat</a>. All right Reserved</p>
    </div>
    <script src="./js/car_rental.js"></script>
</body>
