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

//on récup l'id du commercial SAV grâce à l'id user
$stmt = $pdo->prepare("SELECT * FROM t_d_commercial WHERE Id_User=:useid");
$stmt->bindValue(':useid', $user_id);
$stmt->execute();
$commercial = $stmt->fetch(PDO::FETCH_ASSOC);


// requête de récupération bases données
$bons_cde = $pdo->query("SELECT * FROM t_d_commande")->fetchAll(PDO::FETCH_ASSOC);
$tickets = $pdo->query("SELECT * FROM t_d_ticket_retour")->fetchAll(PDO::FETCH_ASSOC);
?>

<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Consultation des retours</title>

    <!-- Header -->
    <?php include 'header.php'; ?>

    <!-- Titre principal -->
    <h1> Consultation des tickets retour par commande </h1>

    <!-- Formulaire sélection bon commande-->
    <form  method="post">

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
       
       <div >
                <input  type="submit" value="Afficher">
            </div>


    </form>

    <?php
    // Si validation formulaire
    if ($_SERVER['REQUEST_METHOD'] === 'POST') {

        // affiche titre liste tickets
        echo '<h1>Liste des tickets retour</h1>';

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
                echo "<div class='card-body'><strong>Numéro du ticket : </strong>" . $ticket['Id_ticket']  . "</div>";
                echo "<div class='card-body'><strong>Date du ticket : </strong>" . $ticket['date_ticket'] . "</div>";
                echo "<div class='card-body'><strong>Statut du ticket : </strong>" . $ticket['id_statut'] . "</div>";
               
                echo "</div>";
            }
        
              
            $stmt->closeCursor(); //vide mémoire
        }
    }

    ?>

    <!-- Footer -->
    <?php include 'footer.php'; ?>