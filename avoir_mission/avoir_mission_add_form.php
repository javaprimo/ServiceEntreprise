<?php

	require("./dbconnexion.php");
	$r = "SELECT `IDAM`, a.`IDCHEFDESERVICE`, a.`IDMISSION`, s.ACRONYME, s.IDSERVICE, e.IDEMPLOYE, s.NOMSERVICE, e.NOM, e.PRENOM, m.TITREMISSION, m.DDM, m.DFTM, m.DFRM FROM `avoirmission` as a left join chefdeservice as c on a.IDCHEFDESERVICE = c.IDCHEFDESERVICE left join employe as e on c.IDEMPLOYE = e.IDEMPLOYE left join service as s on c.IDSERVICE = s.IDSERVICE left join mission as m on a.idmission = m.IDMISSION where m.DFRM IS NOT NULL ORDER BY e.NOM";
	$res = mysql_query($r);
	$dataAvoirMission = mysql_fetch_array($res);
	mysql_close($con);
?>


<div class="panel panel-info">
	<div class="panel-heading">
		<h3 class="panel-title">Ajout d'une nouvelle affectation d'unr mission</h3>
	</div>
	<div class="panel-body">
		<form method="POST" action="index.php?page=avoir_mission/avoir_mission_add">
			<div class="form-row">
				<div class="form-group col-md-4">
					<label for="inputIDChefDeService">Service d'affectation</label>
					<select id="inputIDChefDeService" name="inputIDChefDeService" class="form-control" >
					<?php
						require("./dbconnexion.php");
						$r = "SELECT DISTINCT a.`IDCHEFDESERVICE`, s.ACRONYME, s.NOMSERVICE, e.NOM, e.PRENOM FROM chefdeservice as c left join `avoirmission` as a on a.IDCHEFDESERVICE = c.IDCHEFDESERVICE left join employe as e on c.IDEMPLOYE = e.IDEMPLOYE left join service as s on c.IDSERVICE = s.IDSERVICE left join mission as m on a.idmission = m.IDMISSION where m.DFRM IS NOT NULL ORDER BY e.NOM ";
						$res = mysql_query($r);
						while ($dataAvoirNoMission = mysql_fetch_array($res)) 
						{
							?>
							<option value="<?php echo $dataAvoirNoMission['IDCHEFDESERVICE'];?>" >
							<?php
								echo strtoupper($dataAvoirNoMission['NOM']) . " " . $dataAvoirNoMission['PRENOM'];
								echo " [Chef du " . $dataAvoirNoMission['ACRONYME'] . " | " . $dataAvoirNoMission['NOMSERVICE'] . "]";
							?>
							</option>
						<?php
						}
						mysql_close($con);
						?>
					</select>
				</div>
				<div class="form-group col-md-4">
					<label for="inputIDMission">Mission</label>
					<select id="inputIDMission" name="inputIDMission" class="form-control">
						<?php
						require("./dbconnexion.php");
						$reqMission = "SELECT IDMISSION, TITREMISSION FROM mission WHERE DFRM IS NULL ORDER BY TITREMISSION";
						$resMission = mysql_query($reqMission);
						while ($dataMission = mysql_fetch_array($resMission)) {
						?>
							<option value="<?php echo $dataMission['IDMISSION'];?>" 
							<?php
							if($dataAvoirMission['IDMISSION'] == $dataMission['IDMISSION'])
							{
								echo " selected";
							}
							?>>
							<?php
								echo $dataMission['TITREMISSION'];
							?>
							</option>
						<?php
						}
						mysql_close($con);
						?>
					</select>
				</div>
			<div class="form-row">
				<div class="form-group col-md-6">
					<button type="submit" class="btn btn-primary stretched-link">Sauvegarder</button>
					<a type="submit" href="index.php?page=avoir_mission/avoir_mission_list&success=2" class="btn btn-success stretched-link">Annuler</a>
				</div>
			</div>
		</form>
	</div>
</div>
