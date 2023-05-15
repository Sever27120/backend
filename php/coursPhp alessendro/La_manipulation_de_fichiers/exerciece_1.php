<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link href="https://fonts.googleapis.com/css?family=Roboto" rel="stylesheet">
  <title>Les Indispansables</title>

  <style>
    body {
      background-color: #f5f5f5;
      font-family: 'Roboto', sans-serif;
    }

    a {
      text-decoration: none;
      color: #000;
      transition: color 0.3s ease;
    }

    a:hover {
      text-decoration: underline;
      color: #f00;
    }
  </style>
</head>

<body>

  <?php
  //Lire le fichier et stoker le contenue  dans un tableau
  $lien = file('lien.txt', FILE_IGNORE_NEW_LINES | FILE_SKIP_EMPTY_LINES);

  foreach ($lien as $key => $value) {
    echo "<a href='$value' target='_blank'>Lien $key</a><br>";
  }


  /**Dans cet exemple, nous utilisons les options FILE_IGNORE_NEW_LINES et FILE_SKIP_EMPTY_LINES avec la fonction file() pour ignorer les sauts de ligne et les lignes vides. Le code générera une page Web contenant les liens hypertextes vers les sites mentionnés dans le fichier liens.txt. */
  ?>
</body>

</html>