<?php
    try{
        $conx = new PDO("mysql:host=".HOST.";dbname=".DBNAME."", USER, PASS);
    } catch (PDOException $e) {
        echo "Error: " . $e->getMessage();
    }

    function getALLPets($conx) {
        try {
            $sql = "SELECT * FROM pets";
            $stm = $conx->prepare($sql);
            $stm->execute();
            return $stm->fetchALL();
        } catch (PDOException $e) {
            echo "Error: " . $e->getMessage();
        }
    }

    ?>

