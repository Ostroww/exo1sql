<?php

$id = $_GET['id'] ?? null;
$db = new PDO('mysql:host=localhost;port=3306;dbname=exercice-sql-1;charset=utf8', 'root', '');
$db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

$query = $db->prepare('SELECT * FROM products WHERE id = :id');
$query->execute([':id' => $id]);
$product = $query->fetch();

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php echo $product['name']; ?></title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
</head>
<body>
    <div class="container">
        <div class="row row-cols-2">
            <h1><?php echo $product['name']; ?></h1>
            <img src="img/<?php echo $product['photo'];?>" width="150">
        </div>
    </div>
    <a href="index.php" class="btn btn-primary">Retour a la liste</a>
</body>
</html>