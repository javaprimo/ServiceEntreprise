<?php
$idEmp = $_GET['id'];
require("./dbconnexion.php");
$r = "select * from employe where idemploye = $idEmp";
$res = mysql_query($r);
$dataEmp = mysql_fetch_array($res);
mysql_close($con);
?>
<div class="panel panel-info">
	<div class="panel-heading">
		<h3 class="panel-title">Mise à jour des données de l'employé <?php echo strtoupper($dataEmp['NOM']) . " " . $dataEmp['PRENOM'] ?></h3>
	</div>
	<div class="panel-body">
		<form method="POST" action="index.php?page=employe/emp_update">
			<div class="form-row">
				<div class="form-group col-md-6">
					<label for="inputNom">NOM</label>
					<input type="text" class="form-control" id="inputNom" name="inputNom" value="<?php echo strtoupper($dataEmp['NOM']); ?>" />
				</div>
				<div class="form-group col-md-6">
					<label for="inputPrenom">PRENOM</label>
					<input type="text" class="form-control" id="inputPrenom" name="inputPrenom" value="<?php echo $dataEmp['PRENOM']; ?>" />
				</div>
			</div>
			<div class="form-row">
				<div class="form-group col-md-6">
					<label for="inputCIN">CIN</label>
					<input type="text" class="form-control" id="inputCIN" name="inputCIN" placeholder="LE123456" value="<?php echo $dataEmp['CIN']; ?>" />
				</div>
				<div class="form-group col-md-6">
					<label for="inputDDN">DDN</label>
					<input type="text" class="form-control" id="inputDDN" name="inputDDN" placeholder="jj/mm/aaaa" value="<?php echo date("d/m/Y", strtotime($dataEmp['DDN'])); ?>" />
				</div>
			</div>
			<div class="form-row">
				<div class="form-group col-md-6">
					<label for="inputAdresse">Adresse</label>
					<input type="text" class="form-control" id="inputAdresse" name="inputAdresse" placeholder="17 rue de la victoire" value="<?php echo $dataEmp['ADRESSE']; ?>" />
				</div>
				<div class="form-group col-md-6">
					<label for="inputVille">Ville</label>
					<input type="text" class="form-control" id="inputVille" name="inputVille" value="<?php echo $dataEmp['VILLE']; ?>" />
				</div>
			</div>
			<div class="form-row">
				<div class="form-group col-md-6">
					<label for="inputSpecialite">Specialit&eacute;</label>
					<input type="text" class="form-control" id="inputSpecialite" name="inputSpecialite" value="<?php echo $dataEmp['ADRESSE']; ?>" />
				</div>
				<div class="form-group col-md-4">
					<label for="inputServiceAffectation">Service d'affectation</label>
					<select id="inputServiceAffectation" class="form-control" disabled>
						<?php
						require("./dbconnexion.php");
						$reqService = "SELECT s.IDSERVICE, s.ACRONYME, s.NOMSERVICE FROM affectation as a LEFT JOIN service as s ON a.IDSERVICE = s.IDSERVICE WHERE a.IDEMPLOYE=" . $idEmp . " ORDER BY DDA DESC LIMIT 1 ";
						$resService = mysql_query($reqService);
						while ($dataService = mysql_fetch_array($resService)) {
						?>
							<option selected value="<?php echo $dataService['IDSERVICE']; ?>">
								<?php
								echo $dataService['ACRONYME'] . " | " . $dataService['NOMSERVICE'];
								?>
							</option>
						<?php
						}
						mysql_close($con);
						?>
					</select>
				</div>
			</div>
			<div class="form-row">
				<div class="form-group col-md-6">
					<label for="inputDDR">Date de recrutement</label>
					<input type="text" class="form-control" id="inputDDR" name="inputDDR" placeholder="jj/mm/aaaa" value="<?php echo date("d/m/Y", strtotime($dataEmp['DDR'])); ?>" />
				</div>
				<div class="form-group col-md-6">
					<label for="inputEmail">Email</label>
					<input type="text" class="form-control" id="inputEmail" name="inputEmail" value="<?php echo $dataEmp['EMAIL']; ?>" />
				</div>
				<input type="hidden" name="idEmp" value=<?php echo $dataEmp['IDEMPLOYE']; ?> />
			</div>
			<div class="form-row">
				<div class="form-group col-md-6">
					<button type="submit" class="btn btn-primary stretched-link">Sauvegarder</button>
					<a type="submit" href="index.php?page=employe/emp_list&success=2" class="btn btn-success stretched-link">Annuler</a>
				</div>
			</div>
		</form>
	</div>
</div>