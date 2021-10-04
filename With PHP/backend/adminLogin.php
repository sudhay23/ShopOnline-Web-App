<?php

$adminEmail = $_POST['adminEmail'];
$adminPassword = $_POST['adminPassword'];

include 'databaseConnect.php';


//create connection
$conn = new mysqli($host, $dbUsername, $dbPassword, $dbname);
$crctPassTEMP = $conn->query("SELECT accountpassword from persons where accesslevel='admin' and email='".$adminEmail."'");
$crctPass = mysqli_fetch_array($crctPassTEMP);
$adminNameTEMP = $conn->query("SELECT fname from persons where email='".$adminEmail."'");
$adminName = mysqli_fetch_array($adminNameTEMP);

$conn->close();

if($crctPass[0]==$adminPassword)
{ ?>

    <script>
        localStorage.setItem('loggedAdmin','<?php echo $adminName[0]; ?>');
        localStorage.setItem('loggedAdminEmail','<?php echo $adminEmail; ?>');
        location.replace("../adminProductManage.php");
    </script>

<?php
}
else
{
    header("Location: wrongLoginAdmin.html");
    exit();
}
?>
