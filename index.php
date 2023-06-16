
<?php require 'header.php'; ?>

<?php 



?>
  <main>
    <section class="featured-products">
      <h2>Produits en vedette</h2>
      <?php $products = $DB->query('SELECT * FROM products'); ?>
      <?php foreach ($products as $product): ?>
      
        <div class="product-card">
        <img src="img/<?php echo $product->id; ?>.jpg" width="100px">

       <?php echo $product->name;?>
       <?php echo number_format($product->prix,2,',') ?>
       
        <a class="add"href="addpanier.php?id=<?= $product->id; ?>">
         Ajouter au panier
        </a>
        </div>
      
        <?php endforeach; ?>
      
    </section>

    <section class="categories">
      <h2>Catégories de produits</h2>
      <ul>
        <li><a href="#">Catégorie 1</a></li>
        <li><a href="#">Catégorie 2</a></li>
        <li><a href="#">Catégorie 3</a></li>
      </ul>
    </section>
  </main>

<?php 

require 'footer.php';

?>
</body>
</html>
