<?php include 'header.php'; ?>

<h1>Catalogue</h1>

<body>
    <form method="post" action="">
        <label for="search_term">Rechercher un produit:</label>
        <input type="text" name="search_term" id="search_term">
        <input type="submit" name="search" value="Rechercher">
    </form>



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
    if (isset($_POST['search'])) {
        $search_term = $_POST['search_term'];
        $sql = "select * from t_d_produit WHERE nom_court like :search 
    or nom_Long like :search";

        $stmt = $conn->prepare($sql);
        $stmt->bindValue(':search', '%' . $search_term . '%');
        $stmt->execute();
        if ($stmt->rowCount() > 0) {
            echo "<p>Résultats de recherche pour : " . $search_term . "</p>";

            while ($row = $stmt->fetch()) {
                echo "<div class='card'>";
                echo "<a href='consult_produit.php?id={$row['Id_Produit']}'>";

                echo "<img class='card-photo'src='img/{$row['Photo']}'>";

                echo "<div class='card-title'>{$row['Nom_court']}</div>";
                echo "<div class='card-text'>{$row['Prix_Achat']} €</div>";

                echo "<input class='ajouter' type='submit' value='Ajouter'>";

                echo "</div>";

                echo "</a>";
            }
        }
    } else {
        $sql = "select * from t_d_produit";
        $stmt = $conn->query($sql);

        if ($stmt->rowCount() > 0) {
            echo "<ul>";
            while ($row = $stmt->fetch()) {


                echo "<div class='card'>";
                echo "<a href='consult_produit.php?id={$row['Id_Produit']}'>";

                echo "<img class='card-photo' src='img/{$row['Photo']}'>";

                echo "<div class='card-title'>" . $row['Nom_court'] . "</div>";
                echo "<div class='card-text'>{$row['Prix_Achat']} €</div>";

                echo "<input class='ajouter' type='submit' value='Ajouter'>";

                echo "</div>";

                echo "</a>";
            }
        }
    }

    ?>

    <?php include 'footer.php'; ?>