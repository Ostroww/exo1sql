<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Liste Produits</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
</head>
<body>

<?php
    $db = new PDO('mysql:host=localhost;port=3306;dbname=exercice-sql-1;charset=utf8', 'root', '');
    $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    $products = $db->query('SELECT * FROM products')->fetchAll();

    $ttc = $_GET['conv'] ?? null;
?>
    <h1>Liste des produits</h1>
    <div class="container">
        <form method="get">
            <select name="conv">
                <option value="false"> Prix HT</option>
                <option value="true">Prix TTC</option>
            </select>
            <button class="btn btn-primary">Afficher</button>
        </form>
        <div class="row row-cols-3">
            <?php foreach ($products as $product) { ?>
                <div class="col">
                    <h3><?php echo $product['name']; ?></h3>
                    <img src="img/<?php echo $product['photo'];?>" width="150">
                    

                    <?php if ($ttc == 'false' || $ttc == null) { ?>
                        <p><?php echo $product['price'].' € HT'; ?></p>
                    <?php } else { ?>
                        <p><?php echo ($product['price']+($product['price']*20/100)).' € TTC'; ?></p>
                    <?php } ?>
                    <p><?php echo $product['description']; ?></p>
                    <?php if ($product['etat'] == 1) { ?>
                        <p class="alert alert-success">En stock</p>
                    <?php } else { ?>
                        <p class="alert alert-danger">Hors stock</p>
                    <?php } ?>
                    <a href="produit.php?id=<?php echo $product['id']; ?>" class="btn btn-primary">Details</a>
                </div>
                <?php } ?>
            </div>
        </div>
</body>
</html>
