<?php
include_once "../../../config.php";
require '../../../controller/productsC.php';
if (isset($_GET['id'])) {
    $productsC = new ProductsC();
    $productsC->deleteProduct($_GET['id']);
    header('Location:Products.php');
}
else {
    echo 'oooooooooooooooooo';
}


?>