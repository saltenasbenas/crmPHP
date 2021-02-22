
<?php 

use app\Customer;

require_once 'config.php';
require_once 'db/DB.php';
require_once 'app/Customer.php';

$customer=new Customer($_GET['id']);
if (isset($_POST['name'])){
    $customer->name=$_POST['name'];
    $customer->surname=$_POST['surname'];
    $customer->phone=$_POST['phone'];
    $customer->email=$_POST['email'];
    $customer->address=$_POST['address'];
    $customer->position=$_POST['position'];
    $customer->company_id=$_POST['company_id'];
    $customer->save();
   
}
?>


<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8">
<link href="style.css" rel="stylesheet" type="text/css">
<link rel="preconnect" href="https://fonts.gstatic.com">
<link
	href="https://fonts.googleapis.com/css2?family=Ubuntu&display=swap"
	rel="stylesheet">
<title>Edit Customer Info</title>
</head>
<body>
	<div class="title">Customers Info Edit</div>
	<form method="post" class="form1" action="customer_edit.php?id=<?=$customer->id?>">
		<div class="main">
			<div class="row">
				<label for="fname">Name</label><br> <input class="un " type="text"
					name="name" class="inputEdit" id="name" placeholder="" value="<?=$customer->name?>"
					required><br> 
					<label for="fname">Surname</label><br> <input
					class="un " type="text" name="surname" class="inputEdit"
					id="surname" placeholder="" value="<?=$customer->surname?>" required><br>
			</div>
			<div class="row">
				<label for="fname">Phone</label><br> <input class="un " type="text"
					name="phone" class="inputEdit" id="phone" placeholder="" value="<?=$customer->phone?>"
					required><br>
					 <label for="fname">Email</label><br> <input
					class="un " type="text" name="email" class="inputEdit" id="email"
					placeholder="" value="<?=$customer->email?>" required><br>
			</div>
			<div class="row">
				<label for="fname">Address</label><br> <input class="un "
					type="text" name="address" class="inputEdit" id="address"
					placeholder="" value="<?=$customer->address?>" required><br>
					 <label for="fname">Position</label><br>
				<input class="un " type="text" name="position" class="inputEdit"
					id="position" placeholder="" value="<?=$customer->position?>" required><br>
			</div>
			<div >
				<label for="fname">Company ID</label><br> <input class="un "
					type="text" name="company_id" class="inputEdit" id="company_id"
					placeholder="" value="<?=$customer->company_id?>" required><br>


			</div>
		</div>



		<input type="submit" name="submit" value="Submit" class="submit"><br>
	</form>

</body>
</html>