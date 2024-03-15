@extends('layouts.app')
@section('title', 'Users Page -PetsApp')

@section('content')
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
                    <img src="<?php echo URLIMGS . "/" . $pet['photo'] ?>" alt="Pet"></td>
                <td>
                    <span><?php echo $pet['name'] ?></span>
                    <span><?php echo $pet['kind'] ?></span>
                </td>
                <td>
                    <a href="show.php?id=<?=$pet['id']?>" class="show">
                        <img src="<?php echo URLIMGS . "/Lupa.svg" ?>"alt="Show">
                    </a>
                    <a href="edit.php?id=<?=$pet['id']?>" class="edit">
                        <img src="<?php echo URLIMGS . "/Lapiz.svg" ?> "alt= "Edit">
                    </a>
                    <a href="javascript:;" class="delete" data-id="<?=$pet['id']?>">
                        <img src="<?php echo URLIMGS . "/Papelera.svg" ?>" alt="Delete">
                    </a>
                </td>
            </tr>
            <?php endforeach ?>
           
        </tbody>
    </table>
    
    </section>
</main>

@endsection