<?php
include 'backend/databaseConnect.php';
?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Listed Products | ShopOnline</title>
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
        #manageDeliveriesBtn
        {
            border:1px solid green;
            padding:5px 10px;
            color:#5cb85c;
            border-radius:5px;
            transition:0.15s;
        }
		#manageProductsBtn 
		{
                border: 1px solid green;
                padding: 5px 10px;
                color: #5cb85c;
                border-radius: 5px;
                transition: 0.15s;
		}
        #logoutBtn:hover
        {
            background:#d9534f;
            color:white;
            transition:0.20s;
            text-decoration:none;
        }
        #manageDeliveriesBtn:hover
        {
            background:#5cb85c;
            color:white;
            transition:0.20s;
            text-decoration:none;
        }
		#manageProductsBtn:hover
		{
			background: #5cb85c;
			color: white;
			transition: 0.2s;
			text-decoration: none;
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
				<a id="manageDeliveriesBtn" href="../cart.html" class="mr-5 hover:text-gray-900 text-3xl">Manage Deliveries</a> 
				<a id="manageProductsBtn" href="adminProductManage.php" class="mr-5 hover:text-gray-900 text-3xl">Manage Products</a> 
			  </nav>
			  <br>
			  <br>
			  
            </div>
          </header>
    <div class="container">
	<p id="success"></p>
	<h3 class="text-right" id="welcomeMsg">Welcome, </h3>
	<script>
		const username = localStorage.getItem('loggedAdmin');
		console.log(username);
		document.querySelector("#welcomeMsg").innerHTML+=username;

		function clearUser()
		{
			localStorage.clear();
		}
	</script>
	<div class="forLoggedInAdmin">
        <div class="table-wrapper">
            <div class="table-title">
                <div class="row">
                    <div class="col-sm-6">
						<h2>Listed <b>Products</b></h2>
					</div>
					<br>
					<div id="mySpinner" style="display:none;position:relative;top:70px;width:70px;height:70px;" class="spinner-border" role="status">
						<span class="sr-only">Loading...</span>
					</div>
					<br>	
					<br>	
					<br>	
					<div class="col-sm-10">
						<a href="#addProductModal" class="btn btn-success" data-toggle="modal"><i class="material-icons"></i> <span>Add New Product</span></a>
					</div>
					<br>
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
						<th>Product Stock</th>
                        <th>Product Description</th>
                        <th>Product Photo</th>
                        <th>Delete</th>
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
						<a href="#deleteProductModal" onclick="deleteTrigger(<?php echo $row["productID"]; ?>)" class="deleteBtn" data-productID="<?php echo $row["productID"]; ?>" data-toggle="modal"><i class="material-icons" data-toggle="tooltip" title="Delete"></i></a>
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
	<!-- Add Modal HTML -->
	<div id="addProductModal" class="modal fade">
		<div class="modal-dialog">
			<div class="modal-content">
				<form id="user_form" action="backend/addProduct.php" method="POST">
					<div class="modal-header">						
						<h4 class="modal-title">Add Product</h4>
						<button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
					</div>
					<div class="modal-body">					
						<div class="form-group">
							<label>Product ID : </label>
							<input type="number" id="productId" name="productId" class="form-control" required>
						</div>
						<div class="form-group">
							<label>Product Name : </label>
							<input type="text" id="productName" name="productName" class="form-control" required>
						</div>
						<div class="form-group">
							<label>Product Price : </label>
							<input type="number" id="productPrice" name="productPrice" class="form-control" required>
						</div>
						<div class="form-group">
							<label>Product Stock : </label>
							<input type="number" id="productStock" name="productStock" class="form-control" required>
						</div>
						<div class="form-group">
							<label>Product Cap (Max Order Qty.) : </label>
							<input type="number" id="productCap" name="productCap" class="form-control" required>
						</div>
						<div class="form-group">
							<label>Product Description : </label>
							<input type="text" id="productDescription" name="productDescription" class="form-control" required>
						</div>				
						<div class="form-group">
							<label>Product Photo URL : </label>
							<input type="text" id="productPic" name="productPhoto" class="form-control" required>
						</div>				
							
					</div>
					<div class="modal-footer">
					    <input type="hidden" value="1" name="type">
						<input type="button" class="btn btn-default" data-dismiss="modal" value="Cancel">
						<button type="submit" class="btn btn-success" id="btn-add">Add</button>
					</div>
				</form>
			</div>
		</div>
	</div>
	<!-- Edit Modal HTML
	<div id="editProductModal" class="modal fade">
		<div class="modal-dialog">
			<div class="modal-content">
				<form id="update_form" action="backend/updateProduct.php" method="POST">
					<div class="modal-header">						
						<h4 class="modal-title">Edit User</h4>
						<button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
					</div>
					<div class="modal-body">
						<input type="hidden" id="id_u" name="productID" class="form-control" required>					
						<div class="form-group">
							<label>Product Name : </label>
							<input type="text" id="name_u" name="productName" class="form-control" required>
						</div>
						<div class="form-group">
							<label>Product Price : </label>
							<input type="number" id="price_u" name="productPrice" class="form-control" required>
						</div>
						<div class="form-group">
							<label>Product Stock : </label>
							<input type="number" id="stock_u" name="productStock" class="form-control" required>
						</div>
						<div class="form-group">
							<label>Product Description : </label>
							<input type="text" id="description_u" name="productDescription" class="form-control" required>
						</div>					
					</div>
					<div class="modal-footer">
					<input type="hidden" value="2" name="type">
						<input type="button" class="btn btn-default" data-dismiss="modal" value="Cancel">
						<button type="button" class="btn btn-info" id="update">Update</button>
					</div>
				</form>
			</div>
		</div>
	</div> -->
	<!-- Delete Modal HTML -->
	<!-- <div id="deleteProductModal" class="modal fade">
		<div class="modal-dialog">
			<div class="modal-content">
				<form  action="backend/deleteProduct.php" method="POST">
						
					<div class="modal-header">						
						<h4 class="modal-title">Delete Product</h4>
						<button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
					</div>
					<div class="modal-body">
						<input type="hidden" id="id_d" name="id" class="form-control">					
						<p>Are you sure you want to delete these products?</p>
						<p class="text-warning"><small>This action cannot be undone.</small></p>
					</div>
					<div class="modal-footer">
						<input type="button" class="btn btn-default" data-dismiss="modal" value="Cancel">
						<button type="button" class="btn btn-danger" id="delete">Delete</button>
					</div>
				</form>
			</div>
		</div>
	</div> -->
	</div>

	<script>
		let allDeleteBtn = document.getElementsByClassName("deleteBtn");
		let i = 0;
		
		function deleteTrigger(prodID)
		{
			console.log("Deleting Product ID: "+prodID);
			
			document.getElementById("mySpinner").style.display = "block";
			

			var urlencoded = new URLSearchParams();
			urlencoded.append("productID", prodID);

			var requestOptions = {
			method: 'POST',
			body: urlencoded,
			redirect: 'follow'
			};

			fetch("backend/deleteProduct.php", requestOptions)
				.then(function(){
					location.replace("adminProductManage.php");
				})
		}

		if(!localStorage.getItem('loggedAdmin'))
		{
			document.querySelector(".forLoggedInAdmin").style.display='block';
			document.querySelector(".forLoggedInAdmin").innerHTML = "<br><br><h1 align='center'>Login First !!</h1>";
			document.querySelector("#logoutBtn").innerHTML = "Go Home";
		}
	
	</script>

</body>
</html>   