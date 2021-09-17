<?php
include 'backend/databaseConnect.php';
?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Welcome to our Brochure | ShopOnline</title>
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
	<div class="forLoggedInCustomer">
        <div class="table-wrapper">
            <div class="table-title">
                <div class="row">
                    <div class="col-sm-6">
						<h2>Your <b>Options</b></h2>
					</div>
					<br>
					<!-- <div id="mySpinner" style="display:none;position:relative;top:70px;width:70px;height:70px;" class="spinner-border" role="status">
						<span class="sr-only">Loading...</span>
					</div> -->
					<br>	
					
                </div>
            </div>
            <table class="table table-striped table-hover">
                <thead>
                    <tr>
						<th>Product ID</th>
                        <th>Product Name</th>
                        <th>Product Price</th>
						<th>Product Stock</th>
                        <th>Product Description</th>
                        <th>Product Photo</th>
                    </tr>
                </thead>
				<tbody>
				
				<?php
				$result = mysqli_query($conn,"SELECT * FROM product");
					$i=1;
					while($row = mysqli_fetch_array($result)) {
				?>
				
				<tr>
				
					<td><?php echo $row["productID"]; ?></td>
					<td><?php echo $row["productName"]; ?></td>
					<td><?php echo $row["productPrice"]; ?></td>
					<td><?php echo $row["productStock"]; ?></td>
					<td><?php echo $row["productDescription"]; ?></td>
                    <td><img src="<?php echo $row["productPhoto"];?>" alt="Photo" style="width:200px;"></td>
                    <td>
                        <button type="button" onclick="setProductClicked('<?php echo $row["productID"]; ?>','<?php echo $row["productName"]; ?>','<?php echo $row["productStock"]; ?>','<?php echo $row["productCap"]; ?>')" class="btn btn-primary"  data-toggle="modal" data-target="#exampleModal">
                            Add to Cart
                        </button>
                    </td>
				</tr>
				<?php
				$i++;
				}
				?>
				</tbody>
			</table>
			
        </div>
    </div>
	<script>
		
        function setProductClicked(prodID, prodName, prodStock, prodCap)
        {
            localStorage.setItem("currentItemID",prodID);
            localStorage.setItem("currentItemName",prodName);
            localStorage.setItem("currentItemStock",prodStock);
            localStorage.setItem("currentItemCap",prodCap);
            cartQtyTrigger();
        }

		if(!localStorage.getItem('loggedCustomer'))
		{
			document.querySelector(".forLoggedInCustomer").style.display='block';
			document.querySelector(".forLoggedInCustomer").innerHTML = "<br><br><h1 align='center'>Login First !!</h1>";
			document.querySelector("#logoutBtn").innerHTML = "Go Home";
		}
	
    </script>
    

    <!-- Add to cart Modal -->
            <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Add to Cart</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form action="backend/addToCart.php" method="POST">
                        <label>Product ID: </label>
                        <input class="form-control" type="text" id="idModal" value="" name="productId" readonly>
                        <br>
                        <input type="hidden" name="personEmail" id="personEmailModal" value="">
                        <label>Product Name: </label>
                        <input class="form-control" type="text" id="nameModal" value="" readonly>
                        <br>
                        <label>Product Stock: </label>
                        <input class="form-control" type="text" id="stockModal" name="productStock" value="" readonly>
                        <br>
                        <input type="number" id="qtyModal" required class="form-control" placeholder="Quantity" name="productQty" min="0" max="" >

                        <script>
                            function cartQtyTrigger()
                            {
                                document.querySelector("#idModal").value="" ;
                                document.querySelector("#nameModal").value="";
                                document.querySelector("#qtyModal").value="";
                                document.querySelector("#stockModal").value="";
                                document.querySelector("#personEmailModal").value+=localStorage.getItem("loggedCustomerEmail");
                                document.querySelector("#idModal").value+=localStorage.getItem("currentItemID");
                                document.querySelector("#nameModal").value+=localStorage.getItem("currentItemName");
                                document.querySelector("#qtyModal").max=localStorage.getItem("currentItemCap");
                                document.querySelector("#stockModal").value+=localStorage.getItem("currentItemStock");
                            }
                        </script>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary">Add</button>
                </div>
                    </form>
                </div>
            </div>
            </div>

</body>
</html>   