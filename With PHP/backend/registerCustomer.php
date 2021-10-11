<?php
$fname = trim($_POST['fname']);
$lname = trim($_POST['lname']);
$accountpassword = $_POST['password'];
$dob = trim($_POST['dob']);
$phoneno = trim($_POST['phoneno']);
$email = trim($_POST['email']);
$accesslevel = 'customer';
$paymentpreference = trim($_POST['paymentpreference']);
$address = trim($_POST['address']);

function valid_password($password) {
  $exp = "/((?=.*[0-9])(?=.*[A-Z])(?=.*[a-z])(?=.*[@#$%]).{8,15})/";
  return preg_match($exp, $password);
}

function valid_phoneno($pno) {
  $exp = "/^[1-9][0-9]{9}$/";
  return preg_match($exp, $pno);
}

function valid_dob($date) {
  $d = DateTime::createFromFormat('Y-m-d', $date);
  return $d && $d->format('Y-m-d') === $date;
}

function valid_email($mail) {
  $exp = "/[a-z0-9_-]+@[a-z0-9_-]+\.[a-z]{2,4}$/i";
  return preg_match($exp, $mail);
}

if (
  $fname   === '' ||
  $lname   === '' ||
  $dob     === '' ||
  $phoneno === '' ||
  $email   === '' ||
  $address === '' ||
  $paymentpreference === '' ||
  $accountpassword   === '' ||
  !valid_password($accountpassword) ||
  !valid_phoneno($phoneno) ||
  !valid_dob($dob) ||
  !valid_email($email) 
) {
  exit(require "failedValidation.html");
}

include 'databaseConnect.php';


//create connection
$conn = new mysqli($host, $dbUsername, $dbPassword, $dbname);
if (mysqli_connect_error()) {
  die('Connection Error(' . mysqli_connect_errno() . ')' . mysqli_connect_error());
} else {
  $SELECT_ONE = "SELECT email from persons where email = ? limit 1";
  $INSERT_ONE = "INSERT into persons (fname, lname, accesslevel, accountpassword, dob, phoneno, email, address) values(?, ?, ?, ?, ?, ?, ?, ?)";
  $SELECT_TWO = "SELECT personid from persons where email = ? limit 1";
  $INSERT_TWO = "INSERT into customer (personid, paymentPreference) values(?, ?)";

  //Prepare statement
  $stmt = $conn->prepare($SELECT_ONE);
  $stmt->bind_param("s", $email);
  $stmt->execute();
  $stmt->bind_result($email);
  $stmt->store_result();
  $stmt->fetch();
  $rnum = $stmt->num_rows;
  if ($rnum == 0) {
    $stmt->close();
    $stmt = $conn->prepare($INSERT_ONE);
    $stmt->bind_param("sssssiss", $fname, $lname, $accesslevel, $accountpassword, $dob, $phoneno, $email, $address);
    $stmt->execute();
    $stmt->close();

    $stmt = $conn->prepare($SELECT_TWO);
    $stmt->bind_param("s", $email);
    $stmt->execute();
    $stmt->bind_result($PERSON_ID);
    $stmt->store_result();
    $stmt->fetch();
    $stmt->close();

    $stmt = $conn->prepare($INSERT_TWO);
    $stmt->bind_param("is", $PERSON_ID, $paymentpreference);
    $stmt->execute();
    require "successRegisterCustomer.html";
  } else {
    require 'failedRegisterCustomer.html';
  }
  $stmt->close();
  $conn->close();
}
