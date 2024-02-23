
<?php

require "config/app.php";
require "config/database.php";


?>



<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="/css/master.css">
    <title>Add User</title>
</head>

<body>
    <main>
        <header class="nav level-1">
            <a href="index.php">
                <img src="/imagenes/back.svg" alt="Back">
            </a>
                <img src="/imagenes/Icon light.svg" alt="Logo">
            <a href="" class="mburger">
                <img src="/imagenes/mburger.svg" alt="Menu Burger">
            </a>
        </header>
        <section class="create">
        <h1>Add Pet</h1>
        <form action=""  method="post" enctype="multipart/form-data">
            <img src="<?php echo URLIMGS . "/Icono update petedit.svg"?>" id="upload" width="240px" alt="upload" >
            <input type="file" name="photo" id="photo" accept="image/*" required>
            <input type="text" name="name" placeholder="Full Name" required>
            <input type="text" name="kind" placeholder="Kind" required>
            <input type="number" name="weight" placeholder="Weight" required>
            <input type="number" name="age" placeholder="Age" required>
            <input type="text" name="breed" placeholder="Breed" required>
            <input type="text" name="location" placeholder="Location" required>
            <button type="submit" class="regreg">Add</button>
        </form>
        <?php
            if ($_POST){

                $photo = time() . "." . pathinfo($_FILES['photo']
                ['name'], PATHINFO_EXTENSION);

                $data = [
                    'name' =>     $_POST['name'],
                    'photo' =>    $photo,
                    'kind' =>     $_POST['kind'],
                    'weight' =>   $_POST['weight'],
                    'age' =>      $_POST['age'],
                    'breed' =>    $_POST['breed'],
                    'location' => $_POST['location']
                ];
                

                //echo var_dump($data);

                
                if(addPet($conx, $data)) {
                    move_uploaded_file($_FILES['photo']
                    ['tmp_name'], "../imagenes/" . $photo);
                    header('Location: index.php');
                } else {

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