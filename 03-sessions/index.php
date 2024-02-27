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
        position: "top-end",
        title: "Ops!",
        text: "<?php echo $_SESSION['error'] ?>",
        icon: "error",
        showConfirmButton: false,
        timer: 5000
    })
    <?php unset($_SESSION['error']) ?>
<?php endif ?>
})
    </script>

</body>

</html>

