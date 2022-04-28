<?php
include('db_connect.php');
include('header.php');
?>
<!DOCTYPE html>
<html>

<head>
	<title> Bibliothèque </title>
	<link rel="stylesheet" href="css\listecomplete.css">
	<link rel="stylesheet" href="css\bootstrap.min.css">
	<link rel="stylesheet" href="css\style.css">
</head>

<body>
	<table class="tableau1" >
		<tr>

			<!-- Option de filtre par genre (jeu/film/livre etc...), au coté gauche de la table, ramenant à un genre unique -->
			<li class="nav-item dropdown">
				<a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" role="button" data-toggle="dropdown" aria-expanded="false">
					<h2>Filtrer par :</h2>
				</a>
				<div class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
					<a class="dropdown-item" href="index.php">Tout les documents</a>
					<a class="dropdown-item" href="listeoutil.php">Outils</a>
					<a class="dropdown-item" href="listejeu.php">Jeux</a>
					<a class="dropdown-item" href="listemultimedia.php">Multimédia</a>

				</div>
			</li>

			</li>
			</ul>
			</div>
			</nav>
			</div>
			</section>
			<script src="js\jquery.slim.min.js"></script>
			<script src="js\popper.min.js"></script>
			<script src="js\bootstrap.min.js"></script>

			<!-- Barre de recherche, située en haut à droite -->
			<!-- <h3>Rechercher spécifiquement:
		<input type="validate">  
		 <form name="search_form" method="POST" action="stockists.php">
            <input type="submit" name="search" value="Rechercher">
            </form> -->

			<td <th colspan="5">
				<h2> Liste des Livres </h2>
				</th>
		</tr>

		<th>Genre </th>
		<th>Outil </th>
		<th>Appartenance</th>
		<th>Détails </th>

		</tr>

		<?php while ($rows = mysqli_fetch_assoc($result)) {
		?>
			<tr>
				<td><?php echo $rows['genre']; ?></td>
				<td><?php echo $rows['outil']; ?></td>
				<td><?php echo $rows['appartenance']; ?></td>
				<td> <?php $link_address1 = 'detaillivre.php';
						echo "<a href='" . $link_address1 . "'>Détails document</a>"; ?>
				</td>
			</tr>
		<?php
		}
		?>

	</table>
</body>


</html>


<!-- Pagination, pour ne pas se retrouver avec deux cent occurences renvoyées aux utilisateurs) -->




<br>

<?php include('footer.php'); ?>