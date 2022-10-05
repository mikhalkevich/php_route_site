<?php
/**
 * Created by PhpStorm.
 * User: Жорик
 * Date: 09.12.2017
 * Time: 22:49
 */

class cart
{

    /**
     * Добавление товара в корзину (сессию)
     * @param int $id
     */
    public static function addProduct($id)
    {
        $id = intval($id);

        // Пустой массив для товаров в корзине
        $productsInCart = array();

        // Если в корзине уже есть товары (они хранятся в сессии)
        if (isset($_SESSION['products'])) {
            // То заполним наш массив товарами
            $productsInCart = $_SESSION['products'];
        }

        // Если товар есть в корзине, но был добавлен еще раз, увеличим количество
        if (array_key_exists($id, $productsInCart)) {
            $productsInCart[$id] ++;
        } else {
            // Добавляем нового товара в корзину
            $productsInCart[$id] = 1;
        }

        $_SESSION['products'] = $productsInCart;

        return self::countItems();
    }

    /**
     * Подсчет количество товаров в корзине (в сессии)
     * @return int
     */
    public static function countItems()
    {
        if (isset($_SESSION['products'])) {
            $count = 0;
            foreach ($_SESSION['products'] as $id => $quantity) {
                $count = $count + $quantity;
            }
            return $count;
        } else {
            return 0;
        }
    }

    public static function getProducts()
    {
        if (isset($_SESSION['products'])) {
            return $_SESSION['products'];
        }
        return false;
    }

    public static function getTotalPrice($products)
    {
        $productsInCart = self::getProducts();

        $total = 0;

        if ($productsInCart) {
            foreach ($products as $item) {
                $total += $item['price'] * $productsInCart[$item['id']];
            }
        }

        return $total;
    }

    public static function clear()
    {
        if (isset($_SESSION['products'])) {
            unset($_SESSION['products']);
        }
    }

    public static function deleteItem($id)
    {
        //intval — Возвращает целое значение переменной
        $id = intval($id);
        // Если вызвали функцию удаления то товары уже есть в корзине иначе вызов этой функции возможен только вручную
        // и он закрешит сайт поэтому делаем проверку
        if (isset($_SESSION['products'])) {
            $productsInCart = $_SESSION['products'];
        }
        else
        {
            return false;
        }
        // Проверяем есть ил удаляемый элемент в корзине и его количество
        // если больше 1 то просто уменьшаем количество на еденицу
        if (array_key_exists($id, $productsInCart) && $productsInCart[$id] > 1) {
            $productsInCart[$id] --;
        } else {
            // В другом случае просто обнуляем количество товара
            //$productsInCart[$id] = 0;
            unset($productsInCart[$id]);
        }
//обновляем глобальную переменную
        $_SESSION['products'] = $productsInCart;
        return self::countItems();
    }


}
