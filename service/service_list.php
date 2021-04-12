<?php
if (!isset($_SESSION['SESSION_ID'])) {
	header('location: index.php?page=connexion');
}

require("./dbconnexion.php");
$r = "SELECT * FROM service ORDER BY ACRONYME";
$res = mysql_query($r);

?>

<div class="col-md-6">
	<table class="table table-striped">
		<thead>
			<tr>
				<th><a href="index.php?page=service/service_add_form"> <img src="images/add.png" /></a></th>
				<th>Acronyme</th>
				<th>Nom</th>
				<th>MODIFIER</th>
				<th>SUPPRIMER</th>
			</tr>
		</thead>
		<tbody>

			<?php

			while ($data = mysql_fetch_array($res)) {
			?>
				</tr>
					<td><?php echo $data['IDSERVICE']; ?></td>
					<td><?php echo strtoupper($data['ACRONYME']); ?></td>
					<td><?php echo $data['NOMSERVICE']; ?></td>
					<td><a href="index.php?page=service/service_update_form&id=<?php echo $data['IDSERVICE']; ?>"> <img src="images/modifier.png" /></a></td>
					<td><a href="index.php?page=service/service_delete_confirm&id=<?php echo $data['IDSERVICE']; ?>"> <img src="images/supprimer.png" /></a></td>
				</tr>

			<?php
			}

			mysql_close($con);

			?>
		</tbody>
	</table>
</div>