<?php

function openBd()
{
    $servername = "localhost";
    $username = "root";
    $password = "mysql";


    $conexion = new PDO("mysql:host=$servername;dbname=organizen", $username, $password);
    // set the PDO error mode to exception
    $conexion->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    $conexion->exec("set names utf8");

    return $conexion;

}

function closeBd()
{
    return null;
}


function select()
{
    $conexion = openBd();

    $sentenciaText = "select * from estado";

    $sentencia = $conexion->prepare($sentenciaText);
    $sentencia->execute();

    $resultado = $sentencia->fetchAll();


    $conexion = closeBd();

    return $resultado;
}

function insertUser($nom_user, $email_user, $pass_user)
{
    $conexion = openBd();

    $encriptado = hash('sha256', $pass_user);

    $sentenciaText = "insert into usuario (nom_user, email_user, pass_user) values (:nom_user, :email_user, :pass_user)";
    $sentencia = $conexion->prepare($sentenciaText);
    $sentencia->bindParam(':nom_user', $nom_user);
    $sentencia->bindParam(':email_user', $email_user);
    $sentencia->bindParam(':pass_user', $encriptado);

    $sentencia->execute();

    $conexion = closeBd();
}

function login($nom_user)
{

    $conexion = openBd();

    $sentenciaText = "select * from usuario WHERE nom_user = :nom_user";
    $sentencia = $conexion->prepare($sentenciaText);
    $sentencia->bindParam(':nom_user', $nom_user, PDO::PARAM_STR);
    $sentencia->execute();
    $user = $sentencia->fetch(PDO::FETCH_ASSOC);

    $conexion = closeBd();

    return $user;
}


function insertProyecto($nom_proyecto, $id_user)
{
    try {
        $conexion = openBd();
        $conexion->beginTransaction();

        $sentenciaText = "insert into proyecto (nom_proyecto) values (:nom_proyecto)";
        $sentencia = $conexion->prepare($sentenciaText);
        $sentencia->bindParam(':nom_proyecto', $nom_proyecto);

        $sentencia->execute();

        // select del ultimo id

        $last_id = $conexion->lastInsertId();

        //insert tener

        $sentenciaText = "insert into tener values (:id_user, :id_proyecto, 1)";
        $sentencia = $conexion->prepare($sentenciaText);
        $sentencia->bindParam(':id_user', $id_user);
        $sentencia->bindParam(':id_proyecto', $last_id);

        $sentencia->execute();
        // commit the transaction
        $conexion->commit();
        echo "New records created successfully";

    } catch (PDOException $e) {
        // roll back the transaction if something failed
        $conexion->rollback();
        echo "Error: " . $e->getMessage();
    }

    $conexion = closeBd();
}


function obtenerProyectos($id_user)
{

    $conexion = openBd();

    $sentenciaText = "SELECT 
            p.id_proyecto, 
            p.nom_proyecto
        FROM 
            tener t
        JOIN 
            proyecto p ON t.id_proyecto = p.id_proyecto
        WHERE 
            t.id_user = :id_user";
    $sentencia = $conexion->prepare($sentenciaText);
    $sentencia->bindParam(':id_user', $id_user);
    $sentencia->execute();
    $resultado = $sentencia->fetchAll(PDO::FETCH_ASSOC);

    $conexion = closeBd();

    return $resultado;

}

function deleteProyecto($id_proyecto)
{
    try {
        $conexion = openBd();

        $conexion->beginTransaction();
        //delete de la tabla tener

        $sentenciaTener = "delete from tener where id_proyecto = :id_proyecto";
        $sentencia = $conexion->prepare($sentenciaTener);
        $sentencia->bindParam(':id_proyecto', $id_proyecto);
        $sentencia->execute();

        //delete de la tabla proyecto
        $sentenciaProyecto = "delete from proyecto where id_proyecto = :id_proyecto";
        $sentencia = $conexion->prepare($sentenciaProyecto);
        $sentencia->bindParam(':id_proyecto', $id_proyecto);
        $sentencia->execute();

        // commit the transaction
        $conexion->commit();
        echo "New records created successfully";

    } catch (PDOException $e) {
        // roll back the transaction if something failed
        $conexion->rollback();
        echo "Error: " . $e->getMessage();
    }

    $conexion = closeBd();
}

?>