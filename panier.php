<?php require 'header.php' ?>
<?php


if (isset($_GET['del'])) {
    $panier->del($_GET['del']);
}

?>

        <header> <h1>Mon Panier</h1> </header>
    <div class="container">
        <div class="bodyy"> 
        <table>
            <thead>
                <tr>
                    <th>Produit</th>
                    <th>Prix</th>
                    <th>Quantité</th>
                    <th>Total</th>
                    <th></th>
                </tr>
</thead>

<?php 
// echo '<pre>';
// print_r($_SESSION);
// echo '</pre>';

$ids = array_keys($_SESSION['panier']);
$products = [];
if (!empty($ids)) {
    
    $products = $DB->query('SELECT * FROM products WHERE id IN('.implode(',', $ids).')');
}
foreach ($products as $product):
?>


    <div>
           
       <td>  <a href=""> <img src="./img/<?php  echo $product->id; ?>.jpg" alt=""></a> </td>
        <td> <?php  echo $product->name?> </td>
            <td> <?php echo $_SESSION['panier'][$product->id]; ?></td>
            <td> <?php  echo number_format($product->prix,2,',')?> € </td>
            <td>
                <a class="btn-remove" href="panier.php?del=<? echo $product->id; ?>">Supprimer</a>
            </td>
            <br>
        </tr>
    </div>
    <?php endforeach; ?>
    
    <td> <?php  echo number_format($panier->total(), 2 ,',',' ')?></td>


    <div class="checkout">
        <button class="btn-checkout">Passer à la caisse</button>
    </div>
    </div>
    </div>


