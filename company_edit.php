
<?php 

use app\Company;

require_once 'config.php';
require_once 'db/DB.php';
require_once 'app/Company.php';

$company=new Company($_GET['id']);
if (isset($_POST['name'])){
    $company->name=$_POST['name'];
    $company->address=$_POST['address'];
    $company->vat_code=$_POST['vat_code'];
    $company->company_name=$_POST['company_name'];
    $company->phone=$_POST['phone'];
    $company->email=$_POST['email'];

    $company->save();
    header('Location: main.php');
    die();
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
	<form method="post" class="form1" action="company_edit.php?id=<?=$company->id?>">
		<div class="main">
			<div class="row">
				<label for="fname">Name</label><br> <input class="un " type="text"
					name="name" class="inputEdit" id="name" placeholder="" value="<?=$company->name?>"
					required><br> 
					<label for="fname">Address</label><br> <input
					class="un " type="text" name="address" class="inputEdit"
					id="address" placeholder="" value="<?=$company->address?>" required><br>
			</div>
			<div class="row">
				<label for="fname">Vat Code</label><br> <input class="un " type="text"
					name="vat_code" class="inputEdit" id="vat_code" placeholder="" value="<?=$company->vat_code?>"
					required><br>
					 <label for="fname">Company Name</label><br> <input
					class="un " type="text" name="company_name" class="inputEdit" id="company_name"
					placeholder="" value="<?=$company->company_name?>" required><br>
			</div>
			<div class="row">
				<label for="fname">Phone</label><br> <input class="un "
					type="text" name="phone" class="inputEdit" id="phone"
					placeholder="" value="<?=$company->phone?>" required><br>
					 <label for="fname">Email</label><br>
				<input class="un " type="text" name="email" class="inputEdit"
					id="email" placeholder="" value="<?=$company->email?>" required><br>
			</div>
			
		</div>



		<input type="submit" name="submit" value="Submit" class="submit"><br>
	</form>

</body>
</html>