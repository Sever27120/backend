
   <?php 

include 'header.php';
require 'functions.php';



if (session_status() == PHP_SESSION_NONE) {
   session_start();
}


if (!isset($_SESSION['logged_in']) || $_SESSION['logged_in'] !== true) {
   header('Location: login.php');
   exit;
}



$user_id = $_SESSION['user_id'];

// Récupération des informations de l'utilisateur connecté
$host = "localhost"; // Nom d'hôte de la base de données
$user = "root"; // Nom d'utilisateur de la base de données
$password_db = ""; // Mot de passe de la base de données
$dbname = "greengarden"; // Nom de la base de données



try {
   $pdo = new PDO("mysql:host=$host;dbname=$dbname", $user, $password_db);
   // configuration pour afficher les erreurs pdo
   $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
   echo "Connection failed: " . $e->getMessage();
}


 if ($_SERVER['REQUEST_METHOD'] === 'POST') {

$commande= $_POST['numcom'];
   $nouvelle_valeur = $_POST['statut'];
   
   $sql = "UPDATE t_d_ticket_retour SET Id_statut = '$nouvelle_valeur' Where Id_Commande ='$commande'";
   
   if ($conn->query($sql) === TRUE) {
       echo "Donnée mise à jour avec succès.";
   } else {
       echo "Erreur lors de la mise à jour de la donnée : ";
   }

      $order_id = $pdo->lastInsertId();


       // rediriger vers la page d'acceuil

header('Location: index.php');
exit;


 }

?>


<h1>Mis à jour du statut du retour d'une commande</h1>

<div class="formulaire">
   <form method="post" enctype="multipart/form-data">

      <br>

      <div>
         <label for="numcom">Numéro de commande: </label>
         <select name="numcom">
            <?php
              $stmt = $conn->query("SELECT * from t_d_commande");

              if ($stmt->rowCount() > 0) {
                 while ($row = $stmt->fetch()) {
                    echo "<option value='{$row['Id_Commande']}'>"  . $row['Num_Commande'] . "</option>";
                 }
              }
              ?>
         </select>
      </div>

      <br>
      <div>
         <label for="statut">Type statut </label>
         <select name="statut">
            <?php
              $stmt = $conn->query("SELECT * from t_d_type_statut");

              if ($stmt->rowCount() > 0) {
                 while ($row = $stmt->fetch()) {
                    echo "<option value ='{$row['Id_type_statut']}'>" . $row['Type_statut'] . "</option>";
                 }
              }
              ?>
         </select>
      </div>
      <br>


      <input id="button" type="submit" value="Modifier">



  <?php include 'footer.php'; ?>