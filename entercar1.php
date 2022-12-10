<?php
include('login_supplier.php');
require 'connection.php';
$conn = Connect();

function GetImageExtension($imagetype) {
    if(empty($imagetype)) return false;
    
    switch($imagetype) {
        case 'assets/img/cars/bmp': return '.bmp';
        case 'assets/img/cars/gif': return '.gif';
        case 'assets/img/cars/jpeg': return '.jpg';
        case 'assets/img/cars/png': return '.png';
        default: return false;
    }
}

$car_model = $conn->real_escape_string($_POST['car_model']);
$car_no = $conn->real_escape_string($_POST['car_no']);
$car_type = $conn->real_escape_string($_POST['car_type']);
$car_color = $conn->real_escape_string($_POST['car_color']);
$car_price = $conn->real_escape_string($_POST['car_price']);
$car_availability = "yes";
$supplier_email=$_SESSION['login_supplier'];

// if (!empty($_FILES["car_img"]["name"])) {
//     $file_name=$_FILES["car_img"]["name"];
//     $temp_name=$_FILES["car_img"]["tmp_name"];
//     $imgtype=$_FILES["car_img"]["type"];
//     $ext= GetImageExtension($imgtype);
//     $imagename=$_FILES["car_img"]["name"];
//     $target_path = "images/cars/".$imagename;

//     if(move_uploaded_file($temp_name, $target_path)) {
//         //$query0="INSERT into cars (car_img) VALUES ('".$target_path."')";
//       //  $query0 = "UPDATE cars SET car_img = '$target_path' WHERE ";
//         //$success0 = $conn->query($query0);

       

//     } 

    

// }

$query = "INSERT into cars(car_type,car_price,car_model,car_color,car_availability,supplier_email) VALUES('" . $car_type . "','" . $car_price . "','".$car_model."','" . $car_color . "','".$car_availability."','".$supplier_email."')";
$success = $conn->query($query);

echo $success;