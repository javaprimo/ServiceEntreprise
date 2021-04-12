<?php
if (!isset($_SESSION['SESSION_ID'])) {
	header('location: index.php?page=connexion');
}

require("./dbconnexion.php");
$r = "SELECT * FROM mission ORDER BY titremission";
$res = mysql_query($r);

?>

<div class="col-md-6">
	<table class="table table-striped">
		<thead>
			<tr>
				<th><a href="index.php?page=mission/mission_add_form"> <img src="images/add.png" /></a></th>
				<th>Titre</th>
				<th>Commentaires</th>
				<th>Date D&eacute;but</th>
				<th>Date Fin Th&eacute;orique</th>
				<th>Date Fin R&eacute;elle</th>
			</tr>
		</thead>
		<tbody>

			<?php

			while ($data = mysql_fetch_array($res)) {
			?>
				</tr>
					<td><?php echo $data['IDMISSION']; ?></td>
					<td><?php echo $data['TITREMISSION']; ?></td>
					<td><?php echo $data['COMMENTAIRE']; ?></td>
					<td><?php echo date("d/m/Y", strtotime($data['DDM'])); ?></td>
					<td><?php echo date("d/m/Y", strtotime($data['DFTM'])); ?></td>
					<td><?php echo date("d/m/Y", strtotime($data['DFRM'])); ?></td>
					<td><a href="index.php?page=mission/mission_update_form&id=<?php echo $data['IDMISSION']; ?>"> <img src="images/modifier.png" /></a></td>
					<td><a href="index.php?page=mission/mission_delete_confirm&id=<?php echo $data['IDMISSION']; ?>"> <img src="images/supprimer.png" /></a></td>
				</tr>

			<?php
			}

			mysql_close($con);

			?>
		</tbody>
	</table>
</div>