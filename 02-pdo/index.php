<?php

require "config/app.php";
require "config/database.php";

$pets = getALLpets($conx);

?>



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
        <header class="nav level-0">
            <a href="">
                <img src="<?php echo URLIMGS . "/back.svg" ?>" alt="Back">
            </a>
                <img src="<?php echo  URLIMGS . "/Icon light.svg" ?>" alt="Logo">
            <a href="" class="mburger">
                <img src= "<?php echo URLIMGS . "/mburger.svg" ?>" alt="">
            </a>
        </header>
        <section class="module">
        <h1>Module Pets</h1>
        <a class="add" href="add.php">
            <img src="/imagenes/ico-add (1).svg" width="30px" alt="add">
            Add Pet
        </a>
        <table>
            <tbody>
                <?php foreach($pets as $pet): ?>
                <tr>
                    <td>
                        <img src="<?php echo URLIMGS . "/" . $pet['photo'] ?>" alt="User"></td>
                    <td>
                        <span><?php echo $pet['name'] ?></span>
                        <span><?php echo $pet['kind'] ?></span>
                    </td>
                    <td>
                        <a href="show.html" class="show">
                            <img src="<?php echo URLIMGS . "/Lupa.svg" ?>"alt="Show">
                        </a>
                        <a href="edit.html" class="edit">
                            <img src="<?php echo URLIMGS . "/Lapiz.svg" ?> "alt= "Edit">
                        </a>
                        <a href="javascript:;" class="delete">
                            <img src="<?php echo URLIMGS . "/Papelera.svg" ?>" alt="Delete">
                        </a>
                    </td>
                </tr>
                <?php endforeach ?>
               
            </tbody>
        </table>
        
        </section>
    </main>

    <script src="/01-UI/js/sweetalert2.js"></script>
    <script src="/01-UI/js/jquery-3.7.1.min.js"></script>
    <script>
        $(document).ready(function () {

            <?php if(isset($_SESSION['msj'])): ?>

                Swal.fire({
                    title: "Taz!",
                    text: "<?php echo $_SESSION['msj'] ?>",
                    confirmButtonColor: "#2ec4b6",
                    icon: "success"
                })

            <?php unset($_SESSION['msj']) ?>
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

