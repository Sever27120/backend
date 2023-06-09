<?php

require 'functions.php';
require 'produit.php';
// // Démarrage de la session
session_start();

// Vérification si l'utilisateur est connecté et a les permissions pour accéder à cette page
if (
	isset($_SESSION['user_id']) && isset($_SESSION['user_type'])
	&& ($_SESSION['user_type'] == 'gestion' || $_SESSION['user_type'] == 'admin')
) {
	$user_id = $_SESSION['user_id'];


	// 	if ($_SERVER['REQUEST_METHOD'] === 'POST') {
	// 		// Vérification si le formulaire a été soumis
	// 		if (
	// 			isset($_POST['nom_court']) && isset($_POST['nom_long']) && isset($_POST['reference'])
	// 			&& isset($_POST['prix']) && isset($_POST['categorie']) && isset($_FILES['photo'])
	// 		) {
	// 			$noml_produit = $_POST['nom_produit'];
	// 			$nomc_produit = $_POST['nom_produit'];
	// 			$reference_produit = $_POST['reference_produit'];
	// 			$prix_produit = $_POST['prix'];
	// 			$photo_produit = $_FILES['photo_produit'];


	// 			$stmt = $conn->prepare("SELECT * from t_d_categorie where Libelle=:lib");
	// 			$stmt->bindValue(':lib', $_POST['categorie']);
	// 			$stmt->execute();
	// 			$categorie =  $stmt->fetch(PDO::FETCH_ASSOC);

	// 			// Vérification si le fichier uploadé est une image
	// 			$allowed_extensions = array('jpg', 'jpeg', 'png', 'gif');
	// 			$file_extension = pathinfo($photo_produit['name'], PATHINFO_EXTENSION);
	// 			if (in_array(strtolower($file_extension), $allowed_extensions)) {
	// 				// Enregistrement de l'image sur le serveur
	// 				$uploads_dir = 'img/';
	// 				$photo_produit_path = $uploads_dir . uniqid() . '.' . $file_extension;
	// 				move_uploaded_file($photo_produit['tmp_name'], $photo_produit_path);

	// 				// Ajout du produit à la base de données
	// 				try {
	// 					$stmt = $conn->prepare("INSERT INTO t_d_produit (Nom_Long, Nom_court
	// 					, Ref_fournisseur, Prix_Achat, Id_Fournisseur, Id_Categorie,Photo,TauxTVA)
	// 					 VALUES (:nomlon,:nomcourt :reference, :prix,:cat, :photo, 19.6)");
	// 					$stmt->bindValue(':nomlon', $noml_produit);
	// 					$stmt->bindValue(':nomcourt', $nomc_produit);
	// 					$stmt->bindValue(':reference', $reference_produit);
	// 					$stmt->bindValue(':prix', $prix_produit);
	// 					$stmt->bindValue(':cat', $categorie['Id_Categorie']);
	// 					$stmt->bindValue(':photo', $photo_produit_path);
	// 					$stmt->execute();


	// 					//ou
	// 					/*$produit=new Produit();
	// 				$produit -> insertProduit()
	// 				*/
	// 				} catch (PDOException $e) {
	// 					echo "Erreur: " . $e->getMessage();
	// 					exit();
	// 				}

	// 				// Redirection vers la page de catalogue avec un message de confirmation
	// 				header('Location: catalogue.php?message=Le produit a été ajouté avec succès');
	// 				exit();
	// 			} else {
	// 				echo "Le fichier uploadé n'est pas une image";
	// 			}
	// 		} else {


	// 			// Vérification si l'utilisateur est de type "gestion"
	// 			if ($_SESSION['type'] != 'gestion') {
	// 				header('Location: index.php');
	// 				exit();
	// 			}
	// 		}
	// 	}
	// } else {
	// 	//redirection vers index.php
	// 	header('Location: index.php'); // Redirection vers la page d'accueil
	// 	exit;
	// }



	// Récupération des informations de l'utilisateur connecté
	$host = "localhost"; // Nom d'hôte de la base de données
	$user = "root"; // Nom d'utilisateur de la base de données
	$password_db = ""; // Mot de passe de la base de données
	$dbname = "greengarden"; // Nom de la base de données

	try {
		$conn = new PDO("mysql:host=$host;dbname=$dbname", $user, $password_db);
		// configuration pour afficher les erreurs pdo
		$conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
	} catch (PDOException $e) {
		echo "Connection failed: " . $e->getMessage();
	}

	if ($_SERVER['REQUEST_METHOD'] === 'POST') {
		// Vérification si le formulaire a été soumis
		if (
			isset($_POST['nom_court']) && isset($_POST['nom_long']) && isset($_POST['reference'])
			&& isset($_POST['prix']) && isset($_POST['categorie'])
			&& isset($_POST['tva']) && isset($_FILES['photo'])
		) {
			$noml_produit = $_POST['nom_long'];
			$nomc_produit = $_POST['nom_court'];
			$reference_produit = $_POST['reference'];
			$prix_produit = $_POST['prix'];
			$tva = $_POST['tva'];
			$photo_produit = $_FILES['photo'];


			$stmt = $conn->prepare("SELECT * from t_d_categorie where Libelle=:lib");
			$stmt->bindValue(':lib', $_POST['categorie']);
			$stmt->execute();
			$categorie =  $stmt->fetch(PDO::FETCH_ASSOC);

			if (upload_file($photo_produit, "img/")) {
				// Ajout du produit à la base de données
				try {
					/*$stmt = $conn->prepare("INSERT INTO t_d_produit (Nom_Long, Nom_court
					, Ref_fournisseur, Prix_Achat,
					 Id_Fournisseur, Id_Categorie,
					 Photo,Taux_TVA)
					 VALUES (:nomlon,:nomcourt, :reference, :prix,1,:cat, :photo, :tva)");
				$stmt->bindValue(':nomlon', $noml_produit);
				$stmt->bindValue(':nomcourt', $nomc_produit);
				$stmt->bindValue(':reference', $reference_produit);
				$stmt->bindValue(':prix', $prix_produit);
				$stmt->bindValue(':tva', $tva);
				$stmt->bindValue(':cat', $categorie['Id_Categorie']);
				$stmt->bindValue(':photo', $photo_produit['name']);
				$stmt->execute();*/


					//ou
					$produit = new Produit();
					$produit->insertProduit(
						$tva,
						$noml_produit,
						$nomc_produit,
						$reference_produit,
						$photo_produit['name'],
						$prix_produit,
						1,
						$categorie['Id_Categorie']
					);
				} catch (PDOException $e) {
					echo "Erreur: " . $e->getMessage();
					exit();
				}

				// Redirection vers la page de catalogue avec un message de confirmation
				header('Location: catalogue.php?message=Le produit a été ajouté avec succès');
				exit();
			} else {
				echo "Le fichier uploadé n'est pas une image";
			}
		} else {
			header('Location: index.php');
			exit();
		}
	}
} else {
	//redirection vers index.php
	header('Location: index.php'); // Redirection vers la page d'accueil
	exit;
}

?>
<!DOCTYPE html>
<html>

<head>
	<meta charset="utf-8">
	<title>Ajout d'un produit</title>
</head>

<body>
	<?php
	// include 'header.php';
	if (isset($error)) : ?>
		<p style="color: red"><?= $error ?></p>
	<?php endif ?>

	<?php if (isset($success)) : ?>
		<p style="color: green"><?= $success ?></p>
	<?php endif ?>

	<h1>Ajout d'un produit</h1>

	<form method="post" enctype="multipart/form-data">
		<div>
			<label for="nomcourt">Nom :</label>
			<input type="text" id="nomc" name="nom_court" required>
		</div>
		<div>
			<label for="nomlong">Nom long (description):</label>
			<input type="text" id="noml" name="nom_long" required>
		</div>
		<div>
			<label for="reference">Référence Fournisseur:</label>
			<input type="text" id="reference" name="reference" required>
		</div>
		<div>
			<label for="prix">Prix HT Fournisseur:</label>
			<input type="number" id="prix" name="prix" min="0" step="0.01" required>
		</div>
		<div>
			<label for="tva">Taux TVA:</label>
			<input type="number" id="tva" name="tva" min="0" step="0.01" required>
		</div>
		<select name="categorie">
			<?php
			$stmt = $conn->query("SELECT * from t_d_categorie");

			if ($stmt->rowCount() > 0) {
				while ($row = $stmt->fetch()) {
					echo "<option>" . $row['Libelle'] . "</option>";
				}
			}
			?>

		</select>
		<div>
			<label for="photo">Photo :</label>
			<input type="file" id="photo" name="photo" required>
		</div>
		<button type="submit">Ajouter</button>
	</form>
	<footer>
		<p>Green Garden - Tous droits réservés</p>
		<div>Ce site a été réalisé par DELACROIX Guillaume</div>
	</footer>
</body>

</html>