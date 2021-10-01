<?php

$custEmail = $_POST['custEmail'];
$custPassword = $_POST['custPassword'];

// $host = "localhost";
// $dbUsername = "admin";
// $dbPassword = "admin";
// $dbname = "shoponline";

$host = "localhost";
$dbUsername = "id17684848_admin";
$dbPassword = "s[|^CZh=+m-&)e0o";
$dbname = "id17684848_shoponline";
//create connection
$conn = new mysqli($host, $dbUsername, $dbPassword, $dbname);
$crctPassTEMP = $conn->query("SELECT accountpassword from persons where accesslevel='customer' and email='".$custEmail."'");
$crctPass = mysqli_fetch_array($crctPassTEMP);
$custNameTEMP = $conn->query("SELECT fname from persons where email='".$custEmail."'");
$custName = mysqli_fetch_array($custNameTEMP);

$conn->close();

if($crctPass[0]==$custPassword)
{ ?>

    <script>
        localStorage.setItem('loggedCustomer','<?php echo $custName[0]; ?>');
        localStorage.setItem('loggedCustomerEmail','<?php echo $custEmail; ?>');
        location.replace("../customerProductView.php");
    </script>

<?php
}
else
{
    header("Location: wrongLoginCustomer.html");
    exit();
}
?>