<?php
if (!isset($_SESSION['SESSION_ID'])) {
	header('location: index.php?page=connexion');
}

require("./dbconnexion.php");
$reqEmp = "select * from employe order by nom, prenom";
$resEmp = mysql_query($reqEmp);

?>

<div class="col-md-6">
	<table class="table table-striped">
		<thead>
			<tr>
				<th><a href="index.php?page=employe/emp_add_form"> <img src="images/add.png" /></a></th>
				<th>NOM</th>
				<th>PRENOM</th>
				<th>CIN</th>
				<th>DDN</th>
				<th>ADRESSE</th>
				<th>VILLE</th>
				<th>EMAIL</th>
				<th>DDR</th>
				<th>SPECIALITE</th>
				<th>MODIFIER</th>
				<th>SUPPRIMER</th>
			</tr>
		</thead>
		<tbody>

			<?php

			while ($dataEmp = mysql_fetch_array($resEmp)) {
			?>
				</tr>
					<td><?php echo $dataEmp['IDEMPLOYE']; ?></td>
					<td><?php echo strtoupper($dataEmp['NOM']); ?></td>
					<td><?php echo $dataEmp['PRENOM']; ?></td>
					<td><?php echo $dataEmp['CIN']; ?></td>
					<td><?php echo date("d/m/Y", strtotime($dataEmp['DDN'])); ?></td>
					<td><?php echo $dataEmp['ADRESSE']; ?></td>
					<td><?php echo $dataEmp['VILLE']; ?></td>
					<td><?php echo $dataEmp['EMAIL']; ?></td>
					<td><?php echo date("d/m/Y", strtotime($dataEmp['DDR'])); ?></td>
					<td><?php echo $dataEmp['SPECIALITE']; ?></td>
					<td><a href="index.php?page=employe/emp_update_form&id=<?php echo $dataEmp['IDEMPLOYE']; ?>"> <img src="images/modifier.png" /></a></td>
					<td><a href="index.php?page=employe/emp_delete_confirm&id=<?php echo $dataEmp['IDEMPLOYE']; ?>"> <img src="images/supprimer.png" /></a></td>
				</tr>

			<?php
			}

			mysql_close($con);

			?>
		</tbody>
	</table>
</div>