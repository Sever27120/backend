 <?php 
if (session_status() == PHP_SESSION_NONE) {
   session_start();
}


if (!isset($_SESSION['logged_in']) || $_SESSION['logged_in'] !== true) {
   header('Location: login.php');
   exit;
}
 include 'header.php';
   require 'functions.php'; 

$user_id = $_SESSION['user_id'];
   // Récupération des informations de l'utilisateur connecté
   $host = "localhost"; // Nom d'hôte de la base de données
   $user = "root"; // Nom d'utilisateur de la base de données
   $password_db = ""; // Mot de passe de la base de données
   $dbname = "greengarden"; // Nom de la base de données

   //connection de l'utilisateur avec le type d'utilisateur
   try {
      $pdo = new PDO("mysql:host=$host;dbname=$dbname", $user, $password_db);
      // configuration pour afficher les erreurs pdo
      $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
   } catch (PDOException $e) {
      echo "Connection failed: " . $e->getMessage();

      
//on récup l'id du client grâce à l'id user
$stmt = $pdo->prepare("SELECT * FROM t_d_technicieb_sav WHERE Id_User=:userid");
$stmt->bindValue(':userid', $user_id);
$stmt->execute();
$utilisateur = $stmt->fetch(PDO::FETCH_ASSOC);

   }
   if ($_SERVER['REQUEST_METHOD'] === 'POST') {
      // récupérer les informations du formulaire
      $dateticket = $_POST['date_ticket'];
      $nomcli = $_POST['nomsocli'];
      $numcom = $_POST['numcom'];
      $motif = $_POST['motif_retour'];
   
  
  // insérer le ticket retour dans la base de données
  $stmt = $pdo->prepare("INSERT INTO t_d_ticket_retour(date_ticket,
  id_statut, Id_Commande,Id_retour_Id_tech_SAV) 	
   VALUES (:datetck,:tech)");
 $stmt->bindValue(':datetck', $dateticket);

 $stmt->bindValue(':tech', $utilsateur['Id_tech_SAV']);
 $stmt->execute();
   

     // rediriger vers la page d'acceuil
    header('Location: index.php');
    exit;
   }
?>

 <h1>Création de ticket de retour</h1>

 <div class="formulaire">
    <form method="post" enctype="multipart/form-data">



       <br>
       <div>
          <label for="datet">Date ticket:</label>
          <input type="text" id="datet" name="date_ticket" required>
       </div>

       
       <div>
<br>
        <label for="nomcli">Nom société ou client:</label>
    
        <select name="nomsocli">
            <?php
            $stmt = $conn->query("SELECT * from t_d_client");

            if ($stmt->rowCount() > 0) {
                while ($row = $stmt->fetch()) {
                    echo  "<option>" . $row['Nom_Societe_Client'] . $row['Nom_Client'] ." ". $row['Prenom_Client'] ."</option>";
                }
            }
            ?>

        </select>
         </div>
<br>
      

       <div>
          <label for="numcom">Numéro de commande: </label>
          <select name="numcom">
             <?php
               $stmt = $conn->query("SELECT * from t_d_commande");
            
               if ($stmt->rowCount() > 0) {
                  while ($row = $stmt->fetch()) {
                     echo "<option>"  . $row['Num_Commande'] . "</option>";
                  }
               }
               ?>
          </select>
       </div>

       <br>
       <div>
          <label for="motif_retour">Motif du retour: </label>
          <select name="motif_retour">
             <?php
               $stmt = $conn->query("SELECT * from t_d_retour");
             
               if ($stmt->rowCount() > 0) {
                  while ($row = $stmt->fetch()) {
                     echo "<option>". $row['type_retour'] . "</option>";
                  }
               }
               ?>
          </select>
       </div>
       <br>

       <button id="button" type="submit">Ajouter</button>




       <footer>
          <p>Green Garden - Tous droits réservés</p>
          <div>Ce site a été réalisé par PHILIPPE Séverine</div>
       </footer>
       </body>

       <?php include 'footer.php'; ?>