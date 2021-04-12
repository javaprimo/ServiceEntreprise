<div class="panel panel-info">
	<div class="panel-heading">
		<h3 class="panel-title">Ajout d'une nouvelle mission</h3>
	</div>
	<div class="panel-body">
		<form method="POST" action="index.php?page=mission/mission_add">
			<div class="form-row">
				<div class="form-group col-md-6">
					<label for="inputTitreMission">Titre</label>
					<input type="text" class="form-control" id="inputTitreMission" name="inputTitreMission" />
				</div>
				<div class="form-group col-md-6">
					<label for="inputCommentaire">Commentaire</label>
					<input type="text" class="form-control" id="inputCommentaire" name="inputCommentaire" />
				</div>
			</div>
			<div class="form-row">
				<div class="form-group col-md-6">
					<label for="inputDDM">Date D&eacute;but</label>
					<input type="text" class="form-control" id="inputDDM" name="inputDDM" placeholder="jj/mm/aaaa" />
				</div>
				<div class="form-group col-md-6">
					<label for="inputDFTM">Date Fin Th&eacute;orique</label>
					<input type="text" class="form-control" id="inputDFTM" name="inputDFTM" placeholder="jj/mm/aaaa" />
				</div>
			</div>
			<div class="form-row">
				<div class="form-group col-md-6">
					<label for="inputDFRM">Date Fin R&eacute;elle</label>
					<input type="text" class="form-control" id="inputDFTM" name="inputDFRM" placeholder="jj/mm/aaaa" />
				</div>
			</div>
			<div class="form-row">
				<div class="form-group col-md-6">
					<button type="submit" class="btn btn-primary stretched-link">Sauvegarder</button>
					<a type="submit" href="index.php?page=mission/mission_list&success=2" class="btn btn-success stretched-link">Annuler</a>
				</div>
			</div>
		</form>
	</div>
</div>
