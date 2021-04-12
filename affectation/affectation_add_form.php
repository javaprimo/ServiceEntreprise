<div class="panel panel-info">
	<div class="panel-heading">
		<h3 class="panel-title">Mise à jour des données d'une affectation</h3>
	</div>
	<div class="panel-body">
		<form method="POST" action="index.php?page=affectation/affectation_add">
			<div class="form-row">
				<div class="form-group col-md-4">
					<label for="inputServiceAffectation">Service d'affectation</label>
					<select id="inputServiceAffectation" name="inputServiceAffectation" class="form-control" >
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
				<div class="form-group col-md-4">
					<label for="inputEmploye">Employ&eacute;</label>
					<select id="inputEmploye" name="inputEmploye" class="form-control">
						<?php
						require("./dbconnexion.php");
						$reqEmploye = "SELECT * FROM employe ORDER BY NOM, PRENOM";
						$resEmploye = mysql_query($reqEmploye);
						while ($dataEmploye = mysql_fetch_array($resEmploye)) {
						?>
							<option value="<?php echo $dataEmploye['IDEMPLOYE'];?>" >
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
					<input type="text" class="form-control" id="inputDDA" name="inputDDA" placeholder="jj/mm/aaaa" />
				</div>
				<div class="form-group col-md-6">
					<label for="inputDFA">Date Fin</label>
					<input type="text" class="form-control" id="inputDFA" name="inputDFA" placeholder="jj/mm/aaaa" />
				</div>
			</div>
			<div class="form-row">
				<div class="form-group col-md-6">
					<label for="inputFonction">Fonction</label>
					<input type="text" class="form-control" id="inputFonction" name="inputFonction" />
				</div>
			</div>
			<div class="form-row">
				<div class="form-group col-md-6">
					<button type="submit" class="btn btn-primary stretched-link">Sauvegarder</button>
					<a type="submit" href="index.php?page=affectation/affectation_list&success=2" class="btn btn-success stretched-link">Annuler</a>
				</div>
			</div>
		</form>
	</div>
</div>
