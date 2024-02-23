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

    function addPet($conx, $data) {
        try {
            $sql = "INSERT INTO pets (name, photo, kind, weight, age, breed, location)
                    
                    VALUES (:name, :photo, :kind, :weight, :age, :breed, :location)";
            
            $smt = $conx->prepare($sql);

            

            if ($smt->execute($data)) {
                $_SESSION['msj'] = 'The ' . $data['name'] . ' pet was added successfully.' ; 
                return true;
            } else {
                return false;
            }

        } catch (PDOException $e) {
            echo "Error: " . $e->getMessage();
        }
    }

    ?>

