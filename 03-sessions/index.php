<?php

require "config/app.php";
require "config/database.php";

if (isset($_SESSION['udi'])) {
    header("location: dashboard.php");
} 

?>



    <!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="<?php echo URLCSS . "/master.css" ?>">
    <title>Login Users</title>
    
</head>

<body>

   

<main>
        <header>
            <img src="<?php echo URLIMGS . "/Icon light.png" ?>" alt="Logo">
        </header>
        <section class="login">
            <menu>
                <a href="javascript:;">Login</a>
                <a href="register.php">Register</a>
            </menu>
            <form action="login.php" method="post">
                
                <input type="email" name="email" placeholder="Email" required>
                <input type="password" name="password" placeholder="Password" required>
                <button type="submit">Login</button>
            </form>
        </section>
    </main>

   

    <script src="/01-UI/js/sweetalert2.js"></script>
    <script src="/01-UI/js/jquery-3.7.1.min.js"></script>
    <script>
        $(document).ready(function () {

            <?php if(isset($_SESSION['error'])): ?>

                Swal.fire({
                    title: "Taz!",
                    text: "<?php echo $_SESSION['error'] ?>",
                    confirmButtonColor: "#2ec4b6",
                    icon: "error"
                })

            <?php unset($_SESSION['error']) ?>
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

