<?php
	if(!isset($_GET['id']))
	{
		header('location: index.php?page=affectation/affectation_list&success=2');
		return;
	}

	$idAffectation = $_GET['id'];
	
	require("./dbconnexion.php");
	$reqAffectation = "select * from affectation where idaffectation = $idAffectation";
	$resAffectation = mysql_query($reqAffectation);
	$dataAffectation = mysql_fetch_array($resAffectation);
	mysql_close($con);
?>


<div class="panel panel-info">
	<div class="panel-heading">
		<h3 class="panel-title">Mise à jour des données d'une affectation</h3>
	</div>
	<div class="panel-body">
		<form method="POST" action="index.php?page=affectation/affectation_update">
			<div class="form-row">
				<div class="form-group col-md-4">
					<label for="inputServiceAffectation">Service d'affectation</label>
					<select id="inputServiceAffectation" class="form-control" disabled>
						<?php
						require("./dbconnexion.php");
						$reqService = "SELECT s.IDSERVICE, s.ACRONYME, s.NOMSERVICE FROM affectation as a LEFT JOIN service as s ON a.IDSERVICE = s.IDSERVICE WHERE a.IDAFFECTATION = " . $idAffectation . " ORDER BY DDA DESC LIMIT 1 ";
						$resService = mysql_query($reqService);
						while ($dataService = mysql_fetch_array($resService)) {
						?>
							<option selected value="<?php $dataService['IDSERVICE']; ?>">
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
				<div class="form-group col-md-4">
					<label for="inputEmploye">Employ&eacute;</label>
					<select id="inputEmploye" name="inputEmploye" class="form-control">
						<?php
						require("./dbconnexion.php");
						$reqEmploye = "SELECT IDEMPLOYE, NOM, PRENOM FROM employe ORDER BY NOM, PRENOM";
						$resEmploye = mysql_query($reqEmploye);
						while ($dataEmploye = mysql_fetch_array($resEmploye)) {
						?>
							<option value="<?php echo $dataEmploye['IDEMPLOYE'];?>" 
							<?php
							if($dataAffectation['IDEMPLOYE'] == $dataEmploye['IDEMPLOYE'])
							{
								echo " selected";
							}
							?>>
								<?php
								echo strtoupper($dataEmploye['NOM']) . " " . $dataEmploye['PRENOM'];
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
					<label for="inputDDA">Date D&eacute;but</label>
					<input type="text" class="form-control" id="inputDDA" name="inputDDA" placeholder="jj/mm/aaaa" value="<?php echo date("d/m/Y", strtotime($dataAffectation['DDA'])); ?>" />
				</div>
				<div class="form-group col-md-6">
					<label for="inputDFA">Date Fin</label>
					<input type="text" class="form-control" id="inputDFA" name="inputDFA" placeholder="jj/mm/aaaa" value="<?php echo date("d/m/Y", strtotime($dataAffectation['DFA'])); ?>" />
				</div>
			</div>
			<div class="form-row">
				<div class="form-group col-md-6">
					<label for="inputFonction">Fonction</label>
					<input type="text" class="form-control" id="inputFonction" name="inputFonction" value="<?php echo strtoupper($dataAffectation['FONCTION']); ?>" />
				</div>
				<input type="hidden" name="idAffectation" value=<?php echo $dataAffectation['IDAFFECTATION']; ?> />
			</div>
			<div class="form-row">
				<div class="form-group col-md-6">
					<button type="submit" href="index.php?page=affectation/affectation_update&id= <?php echo $idAffectation; ?>" class="btn btn-primary stretched-link">Sauvegarder</button>
					<button type="submit" href="index.php?page=affectation/affectation_list&success=2" class="btn btn-success stretched-link">Annuler</button>
				</div>
			</div>
		</form>
	</div>
</div>
