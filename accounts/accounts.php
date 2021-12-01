<?php
require_once '../functions/admin_funs.php';
require_once '../model/connect.php';
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=ư, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="./accounts.css">
    <base href="http://localhost/shop_quan_ao/">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
</head>

<body>
    <div id="accounts_container">
        <?php
        session_start();
        if (isset($_SESSION['username'])) {
            require_once './logged.php';
        } else {
            require_once './notLogged.php';
        }
        ?>
    </div>
</body>

</html>