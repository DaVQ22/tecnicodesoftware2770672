<?php
    try{
        $conx = new PDO("mysql:host=".HOST.";dbname=".DBNAME."", USER, PASS);
    } catch (PDOException $e) {
        echo "Error: " . $e->getMessage();
    }

    function loginUser($conx, $email, $pass) {
        try {
            $sql = "SELECT * FROM users
                    WHERE email = :email
                    LIMIT 1";
            $stm = $conx->prepare($sql);
            $stm->execute(['email' => $email]);

            if ($stm->rowCount() > 0){
                $user = $stm->fetch();
                if (password_verify($pass, $user['password'])){
                    echo "Usted si esta registrado" ;
                    $_SESSION['uid'] = $user['id'];
                    return true;
                } else {
                    $_SESSION['error'] = "Email or Password incorrect please try again";
                    return false;
                }
            } else {
                $_SESSION['error'] = "Email or Incorrect Please try again";
                return false;
            }
            
        } catch (PDOException $e) {
            echo "Error: " . $e->getMessage();
        }
    }

    function getPet($conx, $id) {
        try {
            $sql = "SELECT * FROM pets WHERE id = :id";
            $smt = $conx -> prepare($sql);
            $smt->execute(['id' => $id]);
            return $smt->fetch();
        } catch (PDOException $e) {
            echo "Error: " . $e->getMessage();
        }
    }


    function deletePet($conx, $id) {
        try {
            $sql = "DELETE FROM pets WHERE id = :id";
            $smt = $conx -> prepare($sql);
            if($smt->execute(['id' => $id])) {
                $_SESSION['msg'] = 'The pet was deleted successfully.' ;
                return true;
            }
            
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


    function updatePet($conx, $data) {
        try {
            if(count($data) == 7) {
            $sql = "UPDATE pets SET name=:name,  kind=:kind, 
                weight=:weight, age=:age, breed=:breed,
                 location=:location WHERE id = :id";
            } else {
                $sql = "UPDATE pets SET name=:name, photo=:photo, kind=:kind, 
                weight=:weight, age=:age, breed=:breed,
                 location=:location WHERE id = :id";
            }
            $smt = $conx->prepare($sql);

            if ($smt->execute($data)) {
                $_SESSION['msj'] = 'The ' . $data['name'] . ' pet was update successfully.' ; 
                return true;
            } else {
                return false;
            }

        } catch (PDOException $e) {
            echo "Error: " . $e->getMessage();
        }
    }

    ?>



    

    

