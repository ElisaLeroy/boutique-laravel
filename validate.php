<?php
    include 'header.php';
    include_once 'data_base.php';
    include 'my-functions.php';

    ?>
 <div class="left-cart">
         <h2>Merci pour votre commande </h2>
         <img src="https://media.tenor.com/-bP3-bL0jhgAAAAi/thanking-appreciation.gif" alt="gif merci">
         
</div>

<?php
    var_dump($_SESSION);
    var_dump($productsWithName);
    

    // new_order($db); //on créé une ligne dans la table orders
    $orderID = new_order($db);


    foreach($_SESSION as $key => $value){
        if($value>1){
            new_order_product($db, $orderID, $productsWithName[$key]['id'], $value);
        }
    }

?>
