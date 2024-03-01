<?php

require "config/app.php";
require "config/database.php";

$user = getUser($conx, $_SESSION['uid']);

if(!isset($_SESSION['uid'])) {
    $_SESSION['error'] = "Please login first to access dashboard.";
    header("location: index.php");
}
?>
sdsa


    <!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="<?php echo URLCSS . "/master.css" ?>">
    <title>Module Users</title>
    <style>
        div.menu{
            background-color: var(--color3);
            display: flex;
            flex-direction: column;
            align-items: center;
            gap: 2rem;
            position: absolute;
            top: -1000px;
            opacity: 0;
            left: 0;
            z-index: 999;
            justify-content: center;
            min-height: 100vh;
            transition: all 0.5s ease-in;
            width: 100%;

            a:is(:link, :visited) {
                border: 1px solid #fff;
                border-radius: 50px;
                color: #fff;
                padding: 10px 20px;
                font-size: 2rem;
                text-decoration: none;
            }

            nav {
                color: #fff9;
                display: flex;
                flex-direction: column;
                align-items: center;
                gap: 1rem;

                img {
                    border: 2px solid #fff;
                    border-radius: 60%;
                    object-fit: cover;
                    width: 200px;
                }


                h4, h5 {
                    margin: 0;
                }
            }
        }
        div.menu.open {
            top: 0;
            opacity: 1;
        }
        
    </style>
</head>

<body>

<div class="menu">
        <a href="javascript:;" class="closem">X</a>
        <nav>
            <img src="<?=URLIMGS."/".$USER['photo']?>" alt="">
            <h4><?=$user['fullname']?></h4>
            <h5><?=$user['role']?></h5>
            <a href="close.php">Close session</a>
        </nav>
    </div>

<main>
        <header class="nav level-0">
            <a href="">
                <img src="<?php echo URLIMGS . "/back.svg" ?>" alt="Back">
            </a>
                <img src="<?php echo URLIMGS . "/Icon light.png" ?>" alt="Logo">
            <a href="" class="mburger">
                <img src="<?php echo URLIMGS . "/mburger.svg" ?>" alt="">
            </a>
        </header>

        <?php if ($_SESSION['urole'] = 'Admin'):?>

        <section class="dashboard">
            <h1>Dashboard</h1>
            <menu>
                <ul>
                    <li>
                        <a href="#">
                            <img src="<?php echo URLIMGS . "/Icono persona.svg" ?>" alt="Users">
                           <span>Module User</span> 
                        </a>
                    </li>
                    <li>
                        <a href="#">
                            <img src="<?php echo URLIMGS . "/Icono mascotas.svg" ?> " alt="Pets">
                            <span>Module Pets</span>
                        </a>
                    </li>
                    <li>
                        <a href="#">
                            <img src="<?php echo URLIMGS . "/Icono Adopciones.svg" ?> "alt="Adoptions">
                            <span>Module Adoptions</span>
                        </a>
                    </li>
                </ul>
            </menu>
        </section>
        <?php elseif ($_SESSION['urole'] = 'Customer'): ?>
            <section class="dashboard">
            <h1>Dashboard</h1>
            <menu>
                <ul>
                    <li>
                        <a href="#">
                            <img src="<?php echo URLIMGS . "/Icono Adopciones.svg" ?> " alt="">
                            <span>Modulo Adoptions</span>
                        </a>
                    </li>
                </ul>
            </menu>
            </section>>
        <?php endif ?>
    </main>
    
    <script src="/01-UI/js/sweetalert2.js"></script>
    <script src="/01-UI/js/jquery-3.7.1.min.js"></script>
    <script>
        $(document).ready(function () {

            $('body').on('click', '.mburger', function () {
                $('.menu').addClass('open')
            })
            $('body').on('click', '.closem', function () {
                $('.menu').removeClass('close')
            })

            <?php if(isset($_SESSION['msj'])): ?>

                Swal.fire({
                    title: "Taz!",
                    text: "<?php echo $_SESSION['msj'] ?>",
                    confirmButtonColor: "#2ec4b6",
                    icon: "success"
                })

            <?php unset($_SESSION['msg']) ?>
            <?php endif ?>



    $('body').on('click', '.delete', function () {

                Swal.fire({
  title: "Are you sure?",
  text: "You won't be able to revert this!",
  icon: "question",
  showCancelButton: true,
  confirmButtonColor: "#2ec4b6",
  cancelButtonColor: "#011627",
  confirmButtonText: "Yes, delete it!"
}).then((result) => {
  if (result.isConfirmed) {
    window.location.replace('delete.php?id=' + $id)
  }
});
                
            });
        });
    </script>

</body>

</html>

