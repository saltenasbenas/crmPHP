<?php
use app\Customer;


require_once 'config.php';
require_once 'db/DB.php';
require_once 'app/Customer.php';
require_once 'app/Information.php';

$customer=new Customer($_GET['id']);

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
<title>Stock List Laptops</title>
</head>
<body>
	<div class="title"><?=$customer->name?> <?=$customer->surname?> Conversation List</div>

	<div class="tableContainer">

		<table>


			<thead>
				<tr>
					<th>Conversation ID</th>
					<th>Customer ID</th>
					<th>Date</th>
					<th>Conversation</th>
					

				</tr> 
			</thead>
			<tbody>
			<?php

foreach 
($customer->getInfo() as $information) {
    
    ?>
				<tr>
					<td><?=$information->id?></td>
					<td><?=$information->costumer_id?></td>
					<td><?=$information->date?></td>
					<td><?=$information->conversation?></td>
					

					<td><a class="button"><img class='img' src='images/delete.svg'
							alt='delete' /></a></td>
					<td><a href="customer_edit.php?id=<?=$customer->id?>" class="button"><img class='img' src='images/edit.svg'
							alt='edit' /></a></td>
				</tr>
<?php }?>
			</tbody>

		</table>





	</div>
	
	
	







</body>
</html>