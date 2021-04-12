<?php
	if(!isset($_GET['id']))
	{
		header('location: index.php?page=employe/emp_list&success=2');
		return;
	}

	$idEmp = $_GET['id'];

	require("./dbconnexion.php");
	$req = "select * from employe where idemploye = $idEmp";
	$res = mysql_query($req);
	$data = mysql_fetch_array($res);
	?>

	<div class="panel panel-info">
		<div class="panel-heading">
			<h3 class="panel-title">Suppression des employés</h3>
		</div>
		<div class="panel-body">
			<div class="media position-relative">
			<img src="images/warning.png" class="col col-lg-2" alt="...">
				<div class="media-body">
					<h5 class="mt-0">Attention les données de l'employé <?php echo strtoupper($data['NOM']) . " " . $data['PRENOM']; ?> seront définitivement supprimées.</h5>
					<p>Etes-vous sûr de vouloir procéder avec cette operation ?</p>
					<a href="index.php?page=employe/emp_delete&id= <?php echo $idEmp; ?>" class="btn btn-primary stretched-link">Supprimer</a>
					<a href="index.php?page=employe/emp_list&success=2" class="btn btn-success stretched-link">Annuler</a>
				</div>
			</div>
		</div>
	</div>
	
<?php
	mysql_close($con);
?>