<?php
	if (!isset($_SESSION['SESSION_ID']))
	{
		header('location: index.php?page=connexion');
	}

	require("./dbconnexion.php");
	$r = "SELECT a.IDAFFECTATION, a.IDEMPLOYE, a.IDSERVICE, a.DDA, a.DFA, a.FONCTION, e.NOM, e.PRENOM, s.NOMSERVICE, s.ACRONYME FROM affectation as a inner join service as s on a.idservice = s.idservice inner join employe as e on a.idemploye = e.idemploye ORDER BY a.IDAFFECTATION";
	$res = mysql_query($r);

?>

<div class="col-md-6">
	<table class="table table-striped">
		<thead>
			<tr>
				<th><a href="index.php?page=affectation/affectation_add_form"> <img src="images/add.png" /></a></th>
				<th>Acronyme</th>
				<th>Nom Service</th>
				<th>Nom Employ&eacute;</th>
				<th>Prenom Employ&eacute;</th>
				<th>Fonction</th>
				<th>Date Debut</th>
				<th>Date Fin</th>
			</tr>
		</thead>
		<tbody>

			<?php

			while ($data = mysql_fetch_array($res)) {
			?>
				</tr>
					<td><?php echo $data['IDAFFECTATION']; ?></td>
					<td><?php echo strtoupper($data['ACRONYME']); ?></td>
					<td><?php echo $data['NOMSERVICE']; ?></td>
					<td><?php echo strtoupper($data['NOM']); ?></td>
					<td><?php echo $data['PRENOM']; ?></td>
					<td><?php echo $data['FONCTION']; ?></td>
					<td><?php echo date("d/m/Y", strtotime($data['DDA'])); ?></td>
					<td><?php echo date("d/m/Y", strtotime($data['DFA']));?></td>
					<td><a href="index.php?page=affectation/affectation_update_form&id=<?php echo $data['IDAFFECTATION']; ?>"> <img src="images/modifier.png" /></a></td>
					<td><a href="index.php?page=affectation/affectation_delete_confirm&id=<?php echo $data['IDAFFECTATION']; ?>"> <img src="images/supprimer.png" /></a></td>
				</tr>

			<?php
			}

			mysql_close($con);

			?>
		</tbody>
	</table>
</div>