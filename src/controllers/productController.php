<?php
/**
 * Created by PhpStorm.
 * Date: 08.12.2017
 * Time: 09:50
 */
include_once ROOT . '/models/category.php';
include_once ROOT . '/models/product.php';

class productController {
    public function actionView($productId)
    {

        $categories = array();
        $categories = category::getCategoriesList();

        $product = product::getProductById($productId);
        $product['categories'] = json_decode($product['categories'], true);
        //print_r($product);

        $pageTitle = "Описание товара ".$product['tittle'];
        $pageDescription = "Характеристики ".$product['tittle'];
        require_once(ROOT . '/views/product/view.php');

        return true;

    }
}