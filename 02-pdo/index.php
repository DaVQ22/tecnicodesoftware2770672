<?php

require "config/app.php";
require "config/database.php";

$pets = getALLpets($conx);

?>

<?php foreach($pets as $pet): ?>
    <div> <?php echo $pet['name'] ?> </div>
    <div> <?php echo $pet['breed'] ?> </div>
    <div> <?php echo $pet['location'] ?> </div>
    <?php endforeach ?>

    <!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
<link rel="stylesheet" href="<?php echo URLCSS . "/master.css" ?>">
    <title>Module Users</title>
</head>

<body>
    <main>
        <header class="nav level-1">
            <a href="/html/dashboard.html">
                <img src="/imagenes/back.svg" alt="Back">
            </a>
                <img src="/imagenes/Icon light.svg" alt="Logo">
            <a href="" class="mburger">
                <img src="/imagenes/mburger.svg" alt="">
            </a>
        </header>
        <section class="module">
        <h1>Module Pets</h1>
        <a class="add" href="add.html">
            <img src="/imagenes/ico-add (1).svg" width="30px" alt="add">
            Add Pet
        </a>
        <table>
            <tbody>
                <tr>
                    <td><img src="/imagenes/Icono petreal.svg" alt="User"></td>
                    <td><span>Pet 01</span><br>
                        <span>Dog</span></td>
                    <td>
                        <a href="show.html" class="show">
                            <img src="/imagenes/Lupa.svg" alt="Show">
                        </a>
                        <a href="edit.html" class="edit">
                            <img src="/imagenes/Lapiz.svg" alt="Edit">
                        </a>
                        <a href="javascript:;" class="delete">
                            <img src="/imagenes/Papelera.svg" alt="Delete">
                        </a>
                    </td>
                </tr>
                <tr>
                    <td><img src="/imagenes/Icono petreal.svg" alt="User"></td>
                    <td><span>Pet 02</span><br>
                        <span>Cat</span></td>
                    <td>
                        <a href="show.html" class="show">
                            <img src="/imagenes/Lupa.svg" alt="Show">
                        </a>
                        <a href="edit.html" class="edit">
                            <img src="/imagenes/Lapiz.svg" alt="Edit">
                        </a>
                        <a href="javascript:;" class="delete">
                            <img src="/imagenes/Papelera.svg" alt="Delete">
                        </a>
                    </td>
                </tr>
                <tr>
                    <td><img src="/imagenes/Icono petreal.svg" alt="User"></td>
                    <td><span>Pet 03</span><br>
                        <span>Dog</span></td>
                    <td>
                        <a href="show.html" class="show">
                            <img src="/imagenes/Lupa.svg" alt="Show">
                        </a>
                        <a href="edit.html" class="edit">
                            <img src="/imagenes/Lapiz.svg" alt="Edit">
                        </a>
                        <a href="javascript:;" class="delete">
                            <img src="/imagenes/Papelera.svg" alt="Delete">
                        </a>
                    </td>
                </tr>
                <tr>
                    <td><img src="/imagenes/Icono petreal.svg" alt="User"></td>
                    <td>
                        <span>Pet 04</span><br>
                        <span>Cat</span>
                    </td>
                    <td>
                        <a href="show.html" class="show">
                            <img src="/imagenes/Lupa.svg" alt="Show">
                        </a>
                        <a href="edit.html" class="edit">
                            <img src="/imagenes/Lapiz.svg" alt="Edit">
                        </a>
                        <a href="javascript:;" class="delete">
                            <img src="/imagenes/Papelera.svg" alt="Delete">
                        </a>
                    </td>
                </tr>
                <tr>
                    <td><img src="/imagenes/Icono petreal.svg" alt="User"></td>
                    <td><span>Pet 05</span><br>
                        <span>Dog</span></td>
                    <td>
                        <a href="show.html" class="show">
                            <img src="/imagenes/Lupa.svg" alt="Show">
                        </a>
                        <a href="edit.html" class="edit">
                            <img src="/imagenes/Lapiz.svg" alt="Edit">
                        </a>
                        <a href="javascript:;" class="delete">
                            <img src="/imagenes/Papelera.svg" alt="Delete">
                        </a>
                    </td>
                </tr>
            </tbody>
        </table>
        
        </section>
    </main>

    <script src="/01-UI/js/sweetalert2.js"></script>
    <script src="/01-UI/js/jquery-3.7.1.min.js"></script>
    <script>
        $(document).ready(function () {
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
    Swal.fire({
      title: "Taz!",
      text: "Papiado",
      confirmButtonColor: "#2ec4b6",
      icon: "success"
    });
  }
});
                
            });
        });
    </script>

</body>

</html>