<?php 

include_once 'header.php';
include_once 'data_base.php';
include_once 'my-functions.php';
include_once 'Catalogueclasse.php';
include_once 'ItemClasse.php';

?>


<section class="boutique">
<div class="div_articles">
    <h1>Boutique</h1>
</div>
<form action="cart.php" method="POST" class="form_panier" target="_blank">
<div class="div_articles">
    

        <?php 
        $category = new Catalogue($products);
        //session_destroy();
        
        foreach ($category->getItems() as $value) { 
            ?>
            
            <div class="item">
                <h2><?php echo $value->getName(); ?></h2>
                <img src="<?php echo $value->getImageUrl(); ?>" alt=" " class="img_item">
                <h3 class="price">Prix TTC: <?php echo formatPrice($value->getPrice()); ?> € </h3>
                <p class="price">Origine: <?php echo $value->getOrigine(); ?> </p>
                <p>Lorem ipsum dolor sit amet consectetur, adipisicing elit.</p>
                <div class="item_form">
                    <!-- <input type="number" name="<?php //echo $value->getProductId()?>" class="input_number" value="0"> -->
                    <input type="checkbox" name="<?php echo $value->getProductId()?>">
                </div>
            </div>
        <?php }
           ?>
        <input  type="submit" value="Ajouter">
    </form>
</div>

</section>


</main>











































<?php include_once 'footer.php' ?>
