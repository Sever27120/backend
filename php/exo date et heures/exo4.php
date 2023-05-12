<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>exo4</title>
</head>
<body>
    <?php
//---Montrez que la date du 32/17/2019 est erronée-----


$date_str = '2019-32-17';
$date = DateTime::createFromFormat('Y-m-d', $date_str);
if ($date && $date->format('Y-m-d') == $date_str) {
    echo "Valid date";
} else {
    echo "Invalid date";
}




?>
    
</body>
</html>