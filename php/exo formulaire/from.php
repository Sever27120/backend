<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>formulaire</title>
</head>
<body>
    <!----mettre l'imputation pour que l'utilisateur inscrit ces renseignements et les garder en mémoire-->
    <h1>Contactez-nous</h1>
    <form action="monscript.php" method="post"><!--renvoyer dan sune autre page d'un script php pourindiquer valeur-->
  <label for="nom">Nom :</label>
  <input type="text" id="nom" name="nom"><br>

  <label for="email">E-mail :</label>
  <input type="email" id="email" name="email"><br>

  <label for="message">Message :</label>
  <textarea id="message" name="message"></textarea><br>

  <input type="submit" value="Envoyer">
   
    </form>

 

<script src="../js/form.js"></script>
</body>
</html>