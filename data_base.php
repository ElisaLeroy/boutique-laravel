<?php
try {
    $db = new PDO(
        'mysql:host=localhost;dbname=e-shop;charset=utf8',
        'elisa',
        '1234'
    );
} catch (Exception $e) {
    die('Erreur : ' . $e->getMessage());
}

$categoryId = 2;

$sql_query_global = 'SELECT * FROM products WHERE category = :aliasCategory ';
$products_statement = $db -> prepare($sql_query_global);
$products_statement -> execute(
[
    ':aliasCategory'=> $categoryId
]
);
$products = $products_statement ->fetchAll(PDO::FETCH_ASSOC);

$productsWithName = [];
foreach ($products as $product) {
    $productsWithName[$product['name']] = $product;
}


$categoryClient = 1;

$sql_query= 'SELECT * FROM customers WHERE category = :aliasCategoryClient';
$customers_display = $db -> prepare($sql_query);
$customers_display -> execute(
    [
        ':aliasCategoryClient'=>$categoryClient
    ]
);
$customers = $customers_display ->fetchAll();


//ajouter une ligne dans order pour chaque commandes
function new_order($data_base){
$sql_query = 'INSERT INTO orders ( customer_id, Payment ) VALUES ( 2, "test")';
$insert_order = $data_base -> prepare ($sql_query);
$insert_order -> execute();
$id = $data_base -> lastInsertId();
$new_order = $insert_order ->fetchAll();
return $id;
}


//afficher la table order
$sql_query = 'SELECT * FROM orders';
$orders = $db -> prepare ($sql_query);
$orders -> execute();
$display_orders = $orders -> fetchAll();


function display_order($table){
    var_dump($table); }

//ajouter une ligne dans order_product pour chaque produit commande

function new_order_product($data_base, $orderId, $productId, $quantity){
$sql = 'INSERT INTO order_product (order_id, product_id, quantity) VALUES (:order_id, :product_id, :quantity)';
$insert_order_product = $data_base -> prepare($sql);
$insert_order_product -> execute([
    ':order_id' => $orderId,
    ':product_id' => $productId,
    ':quantity' => $quantity

]);
$new_order_product = $insert_order_product -> fetchAll();
}



?>