<div class="panel panel-info">
	<div class="panel-heading">
		<h3 class="panel-title">Ajout d'un nouveau service</h3>
	</div>
	<div class="panel-body">
		<form method="POST" action="index.php?page=service/service_add">
			<div class="form-row">
				<div class="form-group col-md-6">
					<label for="inputAcronyme">Acronyme</label>
					<input type="text" class="form-control" id="inputAcronyme" name="inputAcronyme" />
				</div>
				<div class="form-group col-md-6">
					<label for="inputNomService">Nom service</label>
					<input type="text" class="form-control" id="inputNomService" name="inputNomService" />
				</div>
			</div>
			<div class="form-row">
				<div class="form-group col-md-6">
					<button type="submit" class="btn btn-primary stretched-link">Sauvegarder</button>
					<a type="submit" href="index.php?page=service/service_list&success=2" class="btn btn-success stretched-link">Annuler</a>
				</div>
			</div>
		</form>
	</div>
</div>
