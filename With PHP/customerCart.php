<?php
include 'backend/databaseConnect.php';
?>
<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Your Cart | ShopOnline</title>
	<link href="https://unpkg.com/tailwindcss@^1.0/dist/tailwind.min.css" rel="stylesheet">
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
	<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Roboto|Varela+Round">
	<link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
	<link rel="stylesheet" href="css/style.css">
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
    <script src="ajax/ajax.js"></script>
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
	<script src="ajax/ajax.js"></script>
	<link rel="stylesheet" href="button.css">
	<style>
        #logoutBtn
        {
            border:1px solid red;
            padding:5px 10px;
            color:red;
            border-radius:5px;
            transition:0.15s;
        }
        #viewCartBtn
        {
            border:1px solid green;
            padding:5px 10px;
            color:#5cb85c;
            border-radius:5px;
            transition:0.15s;
        }
        #viewOrdersBtn
        {
            border:1px solid green;
            padding:5px 10px;
            color:#5cb85c;
            border-radius:5px;
            transition:0.15s;
        }
        #viewProdBtn
        {
            border:1px solid green;
            padding:5px 10px;
            color:#5cb85c;
            border-radius:5px;
            transition:0.15s;
        }
        #logoutBtn:hover
        {
            background:#d9534f;
            color:white;
            transition:0.20s;
            text-decoration:none;
        }
        #viewCartBtn:hover
        {
            background:#5cb85c;
            color:white;
            transition:0.20s;
            text-decoration:none;
        }
        #viewOrdersBtn:hover
        {
            background:#5cb85c;
            color:white;
            transition:0.20s;
            text-decoration:none;
        }
        #viewProdBtn:hover
        {
            background:#5cb85c;
            color:white;
            transition:0.20s;
            text-decoration:none;
        }
    </style>


</head>
<body>
	<!---navigation bar--->
	<header class="text-gray-700 body-font">
            <div class="container mx-auto flex flex-wrap p-5 flex-col md:flex-row items-center">
              <a class="flex title-font font-medium items-center text-gray-900 mb-4 md:mb-0">
                <img class="ml-3 text-xl" src="https://cdn3.iconfinder.com/data/icons/small/512/buy_cart_ecommerce_shopping_online_store-512.png" style="height: 50px;"></img>
                <span class="ml-3 text-xl"><text  style="font-size: 50px; font-family:'Montserrat', sans-serif;color: #000000;">ShopOnline</text></span>  
            </a>
              <nav class="md:ml-auto flex flex-wrap items-center text-base justify-center">
                <a onclick="clearUser()" id="logoutBtn" class="mr-5 hover:text-gray-900 text-3xl" href="../index.html">Logout</a>
                <a id="viewProdBtn" class="mr-5 hover:text-gray-900 text-3xl" href="customerProductView.php">View Products</a>
                <form action="customerCart.php" method="POST">
                    <input type="hidden" id="emailText" name="email" value="">
                    <button type="submit" id="viewCartBtn" class="mr-5 hover:text-gray-900 text-3xl">View Cart</button> 
                </form> 
                
                <form action="yourOrders.php" method="POST">
                    <input type="hidden" id="emailTextTwo" name="email" value="">
                    <button type="submit" id="viewOrdersBtn" class="mr-5 hover:text-gray-900 text-3xl">View Orders</button> 
                </form> 
                <br>
			  </nav>
			  <br>
			  <br>
			  
            </div>
		  </header>
		  <div class="container">
	<p id="success"></p>
	<h3 class="text-right" id="welcomeMsg">Welcome, </h3>
	<script>
		const username = localStorage.getItem('loggedCustomer');
		console.log(username);
        document.querySelector("#emailText").value=localStorage.getItem('loggedCustomerEmail');
        document.querySelector("#emailTextTwo").value=localStorage.getItem('loggedCustomerEmail');
		document.querySelector("#welcomeMsg").innerHTML+=username;

		function clearUser()
		{
			localStorage.clear();
		}
	</script>
    <div class="container">
	<p id="success"></p>
        <div class="table-wrapper">
            <div class="table-title">
                <div class="row">
                    <div class="col-sm-6">
						<h2>Your <b>Cart</b></h2>
					</div>
					<br>
					<div id="mySpinner" style="display:none;position:relative;top:70px;width:70px;height:70px;" class="spinner-border" role="status">
						<span class="sr-only">Loading...</span>
					</div>
					<br>	
					<br>	
					<br>	
                </div>
            </div>
            <table class="table table-striped table-hover">
                <thead>
                    <tr>
						<th>Product ID</th>
                        <th>Product Name</th>
                        <th>Product Price</th>
						<th>Product quantity</th>
                        <th>Cost</th>
                        <th>Product Photo</th>
                    </tr>
                </thead>
				<tbody>
				
				<?php
				$email=$_POST['email']; 
				$personIDTEMP = $conn->query("select personid from persons where email='".$email."'");
				$personID = mysqli_fetch_array($personIDTEMP);


				$result = mysqli_query($conn,"select productID, productName, productPrice,Quantity,productPrice*quantity as cost,productPhoto from product NATURAL JOIN cart where personId=".$personID[0]." and deliveryID=0");
					$i=1;	

					while($row = mysqli_fetch_array($result)) {
				?>
				
				<tr>
				
					<td><?php echo $row["productID"]; ?></td>
					<td><?php echo $row["productName"]; ?></td>
					<td><?php echo $row["productPrice"]; ?></td>
					<td><?php echo $row["Quantity"]; ?></td>
					<td><?php echo $row["cost"]; ?></td>
					<td><img src="<?php echo $row['productPhoto'];?>" alt="Photo" style="width:200px;"></td>

				</tr>
				<?php
				$i++;
				}
				?>
				</tbody>
			</table>
			
        </div>
    </div>

	
<br><br><br>
<div>
<form action="backend/placeOrder.php" method="POST">
<input type="hidden" id="hiddenID" name="email" value="<?php echo $email ; ?>">
<button type="submit" class="button"><span>Place Order </span></button>
</form>
</div>
<br>

	<div>
<form action="backend/clearCart.php" method="POST">
<input type="hidden" name="email" value="<?php echo $email ; ?>">
<button type="submit" class="button"><span> Clear cart</span></button>
</form>
</div>
<br><br>


</body>
</html>   