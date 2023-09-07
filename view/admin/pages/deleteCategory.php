<?php
include_once "../../../config.php";
require '../../../controller/categoriesC.php';
if (isset($_GET['id'])) {
    $categorieC = new CategoriesC();
    $categorieC->deleteCategory($_GET['id']);
    header('Location:Categories.php');
}
else {
    echo 'oooooooooooooooooo';
}


?>