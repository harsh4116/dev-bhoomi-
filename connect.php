<?php
$customer_name = $_POST['customer_name'];
$phone_number = $_POST['phone_number'];
$email_address = $_POST['email_address'];
$date = $_POST['date'];
$country = $_POST['country'];

// data base connection
$conn = new mysqli('localhost','root','','devbhoomi');
if($conn->connect_error){
    die('connection failed : '.$conn->connect_error);
}else{
    $stmt = $conn->prepare("insert into booking_form(cutomer_name, phone_number, email_address, date, country)
    values(?,?,?,?,?)");
    $stmt->bind_param("sisis",$customer_name, $phone_number, $email_address, $date, $country);
    $stmt->execute();
    echo "booking succesfull...";
    $stmt->close();
    $conn->close();
}
?>