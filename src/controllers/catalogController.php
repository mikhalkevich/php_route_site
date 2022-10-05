<?php
/**
 * Created by PhpStorm.
 * Date: 08.12.2017
 * Time: 14:10
 */
//require_once(ROOT.'/function/Autoload.php');

class catalogController {
    public function actionIndex()
    {
        $categories = array();
        $categories = category::getCategoriesList();

        $latestProducts = array();
        $latestProducts = product::getLatestProducts(12);

        $pageTitle = "Каталог";
        $pageDescription = "Каталог категорий";

        require_once(ROOT . '/views/catalog/index.php');

        return true;
    }

    public function actionCategory($categoryId, $page = 1)
    {
        //echo 'categoryId'.$categoryId;
        //echo 'page'.$page;
        $categories = array();
        $categories = category::getCategoriesList();

        $categoryProducts = array();
        $categoryProducts = product::getProductsListByCategory($categoryId, $page);

        $total = product::getTotalProductsInCategory($categoryId);

        // Создаем объект Pagination - постраничная навигация
        $pagination = new pagination($total, $page, product::SHOW_BY_DEFAULT, 'page-');

        $pageTitle = "Каталог по категориям";
        $pageDescription = category::getCategoryText($categoryId);
        require_once(ROOT . '/views/catalog/category.php');

        return true;
    }

}