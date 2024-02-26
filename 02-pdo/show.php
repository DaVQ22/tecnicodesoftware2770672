<?php

require "config/app.php";
require "config/database.php";

$pet = getPet($conx, $_GET['id']);

?>



<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="<?php echo URLCSS . "/master.css" ?>">
    <title>Show Pet</title>
</head>

<body>
    <main>
        <header class="nav level-1">
            <a href="index.php">
                <img src="<?php echo URLIMGS . "/back.svg" ?>"alt="Back">
            </a>
                <img src="<?php echo URLIMGS . "/Icon light.svg" ?>" alt="Logo">
            <a href="" class="mburger">
                <img src="<?php echo URLIMGS . "/mburger.svg" ?>" alt="Menu Burger">
            </a>
        </header>
        <section class="show">
        <h1>Show Pet</h1>
        <img src="<?php echo URLIMGS . "/" . $pet['photo'] ?>" class="photo" alt="Photo">
        <div class="info">
            <p><?=$pet['name']?></p>
            <p><?=$pet['kind']?></p>
            <p><?=$pet['age']?> Years old</p>
            <p><?=$pet['weight']?> Lbs</p>
            <p><?=$pet['breed']?></p>
            <p><?=$pet['location']?></p>
        </div>
        
        </section>
    </main>

    <script src="/01-UI/js/sweetalert2.js"></script>
    <script src="/01-UI/js/jquery-3.7.1.min.js"></script>

</body>

</html>