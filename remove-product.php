<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8">
		<link rel="stylesheet" type="text/css" href="css/add-product.css">
	<title>
		Home
	</title>
	</head>

	<body>

		<header>
			<h1 class="title">Mini Ecommerce</h1>

		</header>

		<center>

		<section class = "forms">
			<form class = ".new-product-form" action="add-product-result.php" method="post" enctype="multipart/form-data">
				<h3 class = "form-title" >REMOVE  PRODUCT</h3>
				<fieldset  class = "product-fieldset">
					<legend>SET PRODUCT</legend>
    				Product Name:<br/>
    				<input class="product-data" type="text" name="name" placeholder="Insert product name" />
    				<br/>
				</fieldset>
						<input class="product-submit" type = "submit" value="Remove product">
			</form>
			<a class="cancel-link" href="index.php">
				<button class="cancel">Cancel</button>
			</a>
		</section>
		</center>
	</body>
</html>
