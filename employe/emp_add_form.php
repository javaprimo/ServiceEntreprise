<div class="panel panel-info">
	<div class="panel-heading">
		<h3 class="panel-title">Ajouter un nouvel employé</h3>
	</div>
	<div class="panel-body">
		<form method="POST" action="index.php?page=employe/emp_add">
			<div class="form-row">
				<div class="form-group col-md-6">
					<label for="inputNom">NOM</label>
					<input type="text" class="form-control" id="inputNom" name="inputNom" />
				</div>
				<div class="form-group col-md-6">
					<label for="inputPrenom">PRENOM</label>
					<input type="text" class="form-control" id="inputPrenom" name="inputPrenom" />
				</div>
			</div>
			<div class="form-row">
				<div class="form-group col-md-6">
					<label for="inputCIN">CIN</label>
					<input type="text" class="form-control" id="inputCIN" name="inputCIN" placeholder="LE123456" />
				</div>
				<div class="form-group col-md-6">
					<label for="inputDDN">DDN</label>
					<input type="text" class="form-control" id="inputDDN" name="inputDDN" placeholder="jj/mm/aaaa" />
				</div>
			</div>
			<div class="form-row">
				<div class="form-group col-md-6">
					<label for="inputAdresse">Adresse</label>
					<input type="text" class="form-control" id="inputAdresse" name="inputAdresse" placeholder="17 rue de la victoire" />
				</div>
				<div class="form-group col-md-6">
					<label for="inputVille">Ville</label>
					<input type="text" class="form-control" id="inputVille" name="inputVille" />
				</div>
			</div>
			<div class="form-row">
				<div class="form-group col-md-6">
					<label for="inputSpecialite">Specialit&eacute;</label>
					<input type="text" class="form-control" id="inputSpecialite" name="inputSpecialite" />
				</div>
				<div class="form-group col-md-4">
					<label for="inputServiceAffectation">Service d'affectation</label>
					<select id="inputServiceAffectation" class="form-control" >
						<?php
						require("./dbconnexion.php");
						$reqService = "SELECT * FROM service ORDER BY ACRONYME";
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
					<input type="text" class="form-control" id="inputDDR" name="inputDDR" placeholder="jj/mm/aaaa" />
				</div>
				<div class="form-group col-md-6">
					<label for="inputEmail">Email</label>
					<input type="text" class="form-control" id="inputEmail" name="inputEmail" />
				</div>
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