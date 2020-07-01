<?php
    session_start();

    include("app/Views/fixed/header.php");
    if (isset($_GET["page"])) {
        switch($_GET["page"]) {
            case "login":
			case "main":
                if(isset($_SESSION['user'])) {
                    include "app/Views/pages/main.php";
                } else {
                    include "app/Views/pages/login.php";
                }
                break;
            case "register":
                if(isset($_SESSION['user'])) {
                    include "app/Views/pages/main.php";
                } else {
                    include "app/Views/pages/register.php";
                }
                break;
            case "admin":
                if(isset($_SESSION['user'])) {
                    if (($_SESSION['user']->role_id != 1) && ($_SESSION['user']->role_id != 3)) {
                        include "app/Views/pages/main.php";
                    } else {
                        include "app/Views/pages/admin.php";
                    }
                } else {
                    include "app/Views/pages/login.php";
                }
                break;
            case "teacher":
                if(isset($_SESSION['user'])) {
                    if ($_SESSION['user']->role_id != 3) {
                        include "app/Views/pages/main.php";
                    } else {
                        include "app/Views/pages/teacher.php";
                    }
                } else {
                    include "app/Views/pages/login.php";
                }
                break;
            default:
                include "app/Views/pages/404.php";
                break;
        }
    } else {
        if(!isset($_SESSION['user'])) {
            include "app/Views/pages/login.php";
        } else {
            include "app/Views/pages/main.php";
        }
    }
    include("app/Views/fixed/footer.php");
?>
