<?php
if (!isset($_SESSION['SESSION_ID'])) {
	header('location: index.php?page=connexion');
}

require("./dbconnexion.php");
$r = "SELECT `IDAM`, a.`IDCHEFDESERVICE`, a.`IDMISSION`, s.ACRONYME, s.NOMSERVICE, e.NOM, e.PRENOM, m.TITREMISSION, m.DDM, m.DFTM, m.DFRM FROM `avoirmission` as a left join chefdeservice as c on a.IDCHEFDESERVICE = c.IDCHEFDESERVICE left join employe as e on c.IDEMPLOYE = e.IDEMPLOYE left join service as s on c.IDSERVICE = s.IDSERVICE left join mission as m on a.idmission = m.IDMISSION";
$res = mysql_query($r);

?>

<div class="col-md-6">
	<table class="table table-striped">
		<thead>
			<tr>
				<th><a href="index.php?page=avoir_mission/avoir_mission_add_form"> <img src="images/add.png" /></a></th>
				<th>Acronyme</th>
				<th>Nom Service</th>
				<th>Nom Employ&eacute;</th>
				<th>Titre Mission</th>
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
					<td><?php echo $data['IDAM']; ?></td>
					<td><?php echo $data['ACRONYME']; ?></td>
					<td><?php echo $data['NOMSERVICE']; ?></td>
					<td><?php echo $data['NOM']; ?></td>
					<td><?php echo $data['PRENOM']; ?></td>
					<td><?php echo $data['TITREMISSION']; ?></td>
					<td><?php echo date("d/m/Y", strtotime($data['DDM'])); ?></td>
					<td><?php echo date("d/m/Y", strtotime($data['DFTM'])); ?></td>
					<td><?php echo date("d/m/Y", strtotime($data['DFRM'])); ?></td>
					<td><a href="index.php?page=avoir_mission/avoir_mission_update_form&id=<?php echo $data['IDAM']; ?>"> <img src="images/modifier.png" /></a></td>
					<td><a href="index.php?page=avoir_mission/avoir_mission_delete_confirm&id=<?php echo $data['IDAM']; ?>"> <img src="images/supprimer.png" /></a></td>
				</tr>

			<?php
			}

			mysql_close($con);

			?>
		</tbody>
	</table>
</div>