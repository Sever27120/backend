<?php
$host = "localhost";
$user = "root";
$pwd = "";
$dbname = "greengarden";

try {
    $conn = new PDO("mysql:host=$host;dbname=$dbname", $user, $pwd);
} catch (PDOException $e) {
    echo "Connection failed " . $e->getMessage();
}

if (isset($_GET['id'])) {

    $id_produit = $_GET['id'];

    try {
        $stmt = $conn->prepare("SELECT * FROM t_d_produit where Id_produit=:id");
        $stmt->bindValue(':id', $id_produit);
        $stmt->execute();
        $produit = $stmt->fetch(PDO::FETCH_ASSOC);


        $stmt = $conn->prepare("SELECT * FROM t_d_categorie where Id_Categorie=:idcat");
        $stmt->bindValue(':idcat', $produit['Id_Categorie']);
        $stmt->execute();
        $categorie = $stmt->fetch(PDO::FETCH_ASSOC);

        $stmt = $conn->prepare("SELECT * FROM t_d_fournisseur where Id_Fournisseur=:idfour");
        $stmt->bindValue(':idfour', $produit['Id_Fournisseur']);
        $stmt->execute();
        $fournisseur = $stmt->fetch(PDO::FETCH_ASSOC);
    } catch (PDOException $e) {
        echo
        "Erreur: " . $e->getMessage();
        exit();
    }
} else {
    echo "Produit non spécifié";
    exit;
}
?>


<?php include 'header.php'; ?>

<h1><?php echo $produit['Ref_fournisseur'] . " - " . $produit['Nom_court']; ?></h1>
<p>Nom fournisseur: <?php echo $fournisseur['Nom_Fournisseur']; ?></p>
<p>Catégorie: <?php echo $categorie['Libelle']; ?></p>
<p>Description: <?php echo $produit['Nom_Long']; ?></p>
<p>Prix HT: <?php echo $produit['Prix_Achat']; ?></p>


<?php
$calculTVA = $produit['Prix_Achat'] * $produit['Taux_TVA'] / 100;
$prixTTC = $produit['Prix_Achat'] + $calculTVA;
?>

<p>Prix TTC: <?php echo round($prixTTC, 2); ?></p>

<form method="POST" action="ajout_panier.php">
    <input type="hidden" name="id" value="<?php echo $id_produit ?>">
    <input type="submit" value="Ajouter au panier">
</form>
</body>

<?php include 'footer.php'; ?>