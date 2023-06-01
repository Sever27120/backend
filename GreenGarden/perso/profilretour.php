<?php

// démarrage session loguage
if (session_status() == PHP_SESSION_NONE) {
   session_start();
}

// si utilisateur pas logué
if (!isset($_SESSION['logged_in']) || $_SESSION['logged_in'] !== true) {
   header('Location: login.php');
   exit;
}

// création variable Id utilisateur connecté
$user_id = $_SESSION['user_id'];

// création variables récupération des infos de l'utilisateur connecté
$host = "localhost"; // Nom d'hôte de la base de données
$user = "root"; // Nom d'utilisateur de la base de données
$password_db = ""; // Mot de passe de la base de données
$dbname = "greengarden"; // Nom de la base de données

try {
   // récupération des infos de l'utilisateur connecté
   $pdo = new PDO("mysql:host=$host;dbname=$dbname", $user, $password_db);
   $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
   // configuration pour afficher les erreurs pdo
   echo "Connection failed: " . $e->getMessage();
}

//on récup l'id du  client grâce à l'id user
$stmt = $pdo->prepare("SELECT * FROM t_d_client WHERE Id_User=:useid");
$stmt->bindValue(':useid', $user_id);
$stmt->execute();
$client = $stmt->fetch(PDO::FETCH_ASSOC);
?>

<!DOCTYPE html>
<html lang="fr">

<head>
   <meta charset="UTF-8">
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <title>Consultation des tickets des clients </title>

   <!-- Header -->
   <?php include 'header.php'; ?>

   <!-- Titre principal -->
   <h1> Consultation des commandes </h1>

   <?php if (isset($_SESSION['logged_in']) && $_SESSION['logged_in'] === true) : ?>
      <!-- Formulaire sélection bon commande-->
      <form method="post">

         <div>
            <label for="numcom">Numéro de commande: </label>
            <select name="numcom">
               <?php

               // requête de récupération dans base données
               $sql = "SELECT * FROM t_d_commande WHERE Id_Client=:useid";
               $stmt = $pdo->prepare($sql);
               $stmt->bindValue(':useid', $client['Id_Client']);
               $stmt->execute();

               // Affichage message du bon commande correspondant aux tickets
               while ($numCde = $stmt->fetch()) { ?>
                  <option value="<?= $numCde['Id_Commande'] ?>"><?= $numCde['Num_Commande'] ?></option>
               <?php } ?>
            </select>
         </div>

         <div>
            <input type="submit" value="Afficher">
         </div>

      </form>

      <?php
      // Si validation formulaire
      if ($_SERVER['REQUEST_METHOD'] === 'POST') {

         // affiche titre liste tickets
         echo '<h1>Liste des tickets retourS</h1>';

         // récupération des infos du formulaire
         $cde_id = $_POST['numcom'];

         // requête de récupération bases données
         $sql = "SELECT * FROM t_d_commande WHERE Id_Commande=:numCde";
         $stmt = $pdo->prepare($sql);
         $stmt->bindValue(':numCde', $cde_id);
         $stmt->execute();



         // Affichage message du bon commande correspondant aux tickets
         while ($numCde = $stmt->fetch()) {
            echo "<h2>Les tickets retour du bon de commande " . $numCde['Num_Commande'] . " sont :" . "</h2>";
         }
         $stmt->closeCursor(); //vide mémoire

         // requête de récupération bases données
         $sql = "SELECT * FROM t_d_ticket_retour WHERE Id_Commande=:idCde";
         $stmt = $pdo->prepare($sql);
         $stmt->bindValue(':idCde', $cde_id);
         $stmt->execute();

         // Affichage liste ticket correspondant au bon commande
         if ($stmt->rowCount() > 0) {
            while ($ticket = $stmt->fetch()) {
               echo "<div class='styleTextTicket'>";
               echo "<div class='card-body'><strong>Numéro du ticket : </strong>" . $ticket['Id_ticket'] . "</div>";
               echo "<div class='card-body'><strong>Date du ticket : </strong>" . $ticket['date_ticket'] . "</div>";
               echo "<div class='card-body'><strong>Statut du ticket : </strong>" . $ticket['id_statut'] . "</div>";
               echo "</div>";
            }
            $stmt->closeCursor(); //vide mémoire
         }
      }
      ?>
   <?php else : ?>
      <p>Veuillez vous connecter pour accéder à cette page.</p>
   <?php endif; ?>





   <?php include 'footer.php'; ?>