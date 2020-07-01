<?php
    require_once "app/Config/autoload.php";
    require "app/Config/config.php";
    use App\Controllers\LoginController;
    use App\Controllers\RegisterController;
    use App\Controllers\ShopController;
    use App\Controllers\UserController;
    use App\Controllers\MeasureController;
    use App\Controllers\ItemController;
    $login = new LoginController();
    $register = new RegisterController();
    $shopcont = new ShopController();
    $usercont = new UserController();
    $measurecont = new MeasureController();
    $itemcont = new ItemController();
    session_start();

    function logFunction ($content) {
        $log_path = $_SERVER["DOCUMENT_ROOT"] . "/data/log.txt";
        $open = fopen($log_path, "a");
        if ($open && isset($_SESSION["user"])) {
            $date = date('d-m-Y H:i:s');
            fwrite($open, "{$content}\t{$date}\t{$_SESSION['user']->username}\t\n");
            fclose($open);
        }
    }

    logFunction($_GET['page']);

    switch ($_GET['page']) {
        case 'login':
            $login->login($_POST);
            break;
        case 'logout':
            if(isset($_SESSION['user'])) {
                unset($_SESSION['user']);
                session_destroy();
            }
            header("Location: index.php?page=login");
            die();
            break;
        case 'register':
            $register->register($_POST);
            break;
        case 'shop_edit':
            if ($_POST["shop_add_edit_id"] != "") {
                $shopcont->updateShop($_POST);
            } else {
                $shopcont->addShop($_POST, $_SESSION['user']->ID);
            }
            break;
        case 'shop_delete':
            $shopcont->deleteShop($_GET['id']);
            break;
        case 'item_edit':
            if ($_POST["item_add_edit_id"] != "") {
                $itemcont->updateItem($_POST, $_SESSION['user']->ID);
            } else {
                $itemcont->addItem($_POST, $_SESSION['user']->ID);
            }
            break;
        case 'item_delete':
            $itemcont->deleteItem($_GET['id']);
            break;
        case 'add_measure':
            $measurecont->addMeasure($_POST);
            break;
        case 'edit_measure':
            $measurecont->updateMeasure($_POST);
            break;
        case 'delete_measure':
            $measurecont->deleteMeasure($_POST);
            break;
        case 'edit_user':
            $usercont->editUserRight($_POST);
            break;
        case 'delete_user':
            $usercont->deleteUser($_POST);
            break;
        default:
            header("Location: index.php?page=main");
            die();
            break;
    }
?>
