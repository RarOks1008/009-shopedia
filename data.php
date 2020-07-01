<?php
    require_once "app/Config/autoload.php";
    require "app/Config/config.php";
    use App\Controllers\ShopController;
    use App\Controllers\RoleController;
    use App\Controllers\UserController;
    use App\Controllers\MeasureController;
    use App\Controllers\ItemController;
    $shopcont = new ShopController();
    $rolecont = new RoleController();
    $usercont = new UserController();
    $measurecont = new MeasureController();
    $itemcont = new ItemController();

    $item_data = $itemcont->getItems($_SESSION['user']->ID);
    $measure_data = $measurecont->getMeasures();
    $shop_data = $shopcont->getShops($_SESSION['user']->ID);
    $user_data = $usercont->getUsers($_SESSION['user']->ID);
    $role_data = $rolecont->getRoles();
?>
