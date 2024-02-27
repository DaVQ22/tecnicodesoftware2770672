<?php

require "config/app.php";
require "config/database.php";



?>



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
            width: 100%;

            a:is(:link, :visited) {
                border: 1px solid #fff;
                border-radius: 50px;
                color: #fff;
                padding: 10px 20px;
                font-size: 2rem;
                text-decoration: none;
            }
        }
        div.menu.open {
            animation: openMenu 0.5s ease-in 1 forwards;
        }
        div.menu.close {
            animation: closeMenu 0.5s ease-in 1 forwards;
        }
        @keyframes openMenu {
            0% {
                top: -1000px;
                opacity: 0;
            }
            100% {
                top: 0;
                opacity: 1;
            }
        }
        @keyframes closeMenu {
            0% {
                top: 0;
                opacity: 1;
            }
            100% {
                top: -1000px;
                opacity: 0;
            }
        }
    </style>
</head>

<body>

<div class="menu">
        <a href="javascript:;" class="closem">X</a>
        <nav>
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
    </main>
    
    <script src="/01-UI/js/sweetalert2.js"></script>
    <script src="/01-UI/js/jquery-3.7.1.min.js"></script>
    <script>
        $(document).ready(function () {

            $('body').on('click', '.mburger', function () {
                $('.menu').addClass('open')
            })
            $('body').on('click', '.closem', function () {
                $('.menu').addClass('close')
                setTimeout(() => {
                    $('.menu').removeClass('open')
                    $('.menu').removeClass('close')
                }, 1000)
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

