<?php

require "config/app.php";
require "config/database.php";

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>02-Register</title>
    <link rel="stylesheet" href="<?php echo URLCSS . "/master.css" ?>">
</head>
<body class="diferentbackground">
    <main>
        <header>
            <img src="/imagenes/Icon dark.png" alt="Logo">
        </header>
        <section class="create">
            <menu>
                <a href="index.php">Login</a>
                <a href="javascript:;">Register</a>
            </menu>
            <form action="" method="post" enctype="multipart/form-data">
                <img src="<?php echo URLIMGS . "/Icono persona.svg"?>" id="upload" width="240px" alt="upload" >
                <input type="file" name="photo" id="photo" accept="image/*" require>
                <input type="number" name="document" placeholder="Document" required>
                <input type="text" name="fullname" placeholder="Full Name" required>
                <input type="text" name="phone" placeholder="Phone Number" required>
                <input type="email" name="email" placeholder="Email" required>
                <input type="password" name="password" placeholder="Password" required>
                <button type="submit">Register</button>
            </form>

            <?php
            if ($_POST){

                $photo = time() . "." . pathinfo($_FILES['photo']
                ['name'], PATHINFO_EXTENSION);
                $password = password_hash($_POST['password'], PASSWORD_DEFAULT);

                $data = [
                    'document' =>     $_POST['document'],
                    'fullname' =>     $_POST['fullname'],
                    'photo' =>    $photo,
                    'phone' =>     $_POST['phone'],
                    'email' =>   $_POST['email'],
                    'password' =>      $password,
                    
                ];
                

                //echo var_dump($data);

                
                if(addPet($conx, $data)) {
                    move_uploaded_file($_FILES['photo']
                    ['tmp_name'], "../imagenes/" . $photo);
                    header('Location: index.php');
                } 
            }

            ?>

        </section>
    </main>

    <script src="/01-UI/js/sweetalert2.js"></script>
    <script src="/01-UI/js/jquery-3.7.1.min.js"></script>
    <script>
        $(document).ready(function () {
             $('#upload').click(function (e) { 
                e.preventDefault();
                $('#photo').click()
                
            });

            $('#photo').change(function (e) { 
                e.preventDefault();
                let reader = new FileReader()
                reader.onload = function(event) {
                    $('#upload').attr('src', event.target.result)
                }
                reader.readAsDataURL(this.files[0])
            });
        });
    </script>

</body>
</html>