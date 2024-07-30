 <?php
    include 'header.php';
    include_once 'data_base.php';
    include 'my-functions.php';
    include 'cartClass.php';
    ?>
 <?php
    echo "VarDump de session";
    

    echo "<br>VarDump de post";
    var_dump($_POST);
    ?>

 <div class="panier">
     <!-- PANIER GAUCHE -->
     <div class="left-cart">
         <h2>Votre panier</h2>
         <div class="article-cart">

             <form action="" method="POST" class="form_panier">
                 <table>
                     <thead class="line">
                         <tr class="line">
                             <th class="title_case">Produit</th>
                             <th class="title_case">Prix unitaire TTC</th>
                             <th class="title_case">Quantité</th>
                             <th class="title_case">Poids</th>
                             <th class="title_case">Prix TTC</th>
                         </tr>
                     </thead>

                     <?php
                        $objet = new Cart($_SESSION);
                        //ici, on attribut le contenu de $_POST à $_SESSION
                        if ($_POST != empty($_POST)) {
                            foreach ($_POST as $key => $value) {
                                $objet->add($key, $value);
                            }
                        };

                        var_dump($_SESSION);
                        var_dump($objet->getProductQuantity());



                        $total_price_TTC = 0;   //on initialise une variable qui prendra pour valeur le prix total de la commande



                        foreach ($objet->getProductQuantity() as $key => $value) {     
                            foreach ($products as $row) {           //on boucle aussi dans la table "products" de la bdd
                                if ($key == $row['id']) {   //on séléctionne seulement les produits qui ont une quantité >0  
                                    //&& on fait correspondre le produits séléctionné par l'user avec la bonne ligne de la table "products" dans la bdd
                                    $priceTTC = $row['price'] * $value ?>
                                 <tr class="line">
                                     <td class="case"><span class="bold"><?php echo $row['name'] ?></td>
                                     <td class="case"><?php echo number_format(formatPrice($row['price']), 2)  ?> €</td>
                                     <td class="case"><?php echo $objet->update($key) ?></td>
                                     <td class="case"><?php echo ($row['weight'] / 1000) ?> kg</td>
                                     <td class="case"><?php echo number_format(formatPrice($priceTTC), 2)  ?> €</td>
                                 </tr>
                     <?php
                                    $total_price_TTC += $priceTTC;  //on incrémente la variable avec le prix de chaque (article * quantité)

                                    //on ajoute chaque article à la commande order_products (dans la bdd)


                                }
                            }
                        } ?>
                 </table>
             </form>
         </div>
     </div>
     <!-- FIN PANIER GAUCHE -->


     <!-- PANIER DROIT -->

     <!-- <div class="right-cart">
         <table class="total">
             <tr>
                 <td class="case"><span class="bold">Prix total TTC : <?php echo number_format(formatPrice($total_price_TTC), 2) ?> €</span></td>
             </tr>
             <tr>
                 <td><form action="validate.php" method="POST">
                        <input type="submit" value="Valider la commande">
                 </form></td>
             </tr>
         </table>

     </div> -->
     <!-- FIN PANIER DROIT -->

 </div>
 <?php
    include 'footer.php';
    ?>