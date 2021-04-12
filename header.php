<?php
if (!isset($_SESSION['SESSION_ID']))
{
?>
	<div class="container">
		<div id="loginbox" style="margin-top:50px;" class="mainbox col-md-6 col-md-offset-3 col-sm-8 col-sm-offset-2">
			<div class="panel panel-info">
				<div class="panel-body">
					<h1 style="text-align: center;">Gestion des employés</h1>
				</div>
			</div>
		</div>
	</div>
	
<?php
} 
else 
{
?>
	<nav class="navbar navbar-default">
		<div class="container">
			<div class="navbar-header">
				<button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target=".navbar-collapse">
					<span class="sr-only">Toggle navigation</span>
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
				</button>
				<a class="navbar-brand" href="#">Gestion des employés</a>
			</div>
			<?php
			//menu admin
			if($_SESSION["CODE_AUTORISATION"] == 0)
			{
			?>
			<div class="navbar-collapse collapse">
				<ul class="nav navbar-nav">
					<li class="active"><a href="#">Accueil</a></li>
					<li><a href="index?page=service/service_list">Services</a></li>
					<li><a href="index?page=employe/emp_list">Employés</a></li>
					<li><a href="index?page=affectation/affectation_list">Affectations</a></li>
					<li><a href="index?page=mission/mission_list">Missions</a></li>
					<li><a href="index?page=avoir_mission/avoir_mission_list">Mission Chefs</a></li>
					<li><a href="index?page=taches_list">Taches</a></li>
					<li><a href="index?page=activites_list">Activités</a></li>
					<li><a href="index.php?page=deconnexion">Deconnexion</a></li>
				</ul>
			</div>
			<?php
			}
			//menu chef de service
			else if($_SESSION["CODE_AUTORISATION"] == 1)
			{
			?>
			<div class="navbar-collapse collapse">
				<ul class="nav navbar-nav">
					<li class="active"><a href="index?page=chef_service/chef_service_compte_update_form">Mon Compte</a></li>
					<li><a href="index?page=chef_service/mes_missions_list">Mes Missions</a></li>
					<li><a href="index.php?page=deconnexion">Deconnexion</a></li>
				</ul>
			</div>
			<?php
			}
			//menu employé
			else if($_SESSION["CODE_AUTORISATION"] == 2)
			{
			?>
			<div class="navbar-collapse collapse">
				<ul class="nav navbar-nav">
					<li class="active"><a href="index?page=chef_service/chef_service_compte_update_form">Mon Compte</a></li>
					<li><a href="index?page=chef_service/mes_missions_list">Mes Missions</a></li>
					<li><a href="index.php?page=deconnexion">Deconnexion</a></li>
				</ul>
			</div>
			<?php
			}
		
		?>
			
			<!--/.nav-collapse -->
		</div>
	</nav>
<?php
}
?>

