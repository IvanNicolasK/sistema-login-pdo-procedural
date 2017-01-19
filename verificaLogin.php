<?php

require_once 'conexao.php';

if (isset($_POST['btn-login'])) {
    $usuario = $_POST['nome'];
    $senha   = $_POST['senha'];
   
    try {
        $sql = "SELECT * FROM usuarios WHERE user =:arg_nome";
        $resultado = $con->prepare($sql);
        $resultado->execute(array(":arg_nome" => $usuario));
        $fila = $resultado->fetch(PDO::FETCH_ASSOC);
        
        if (password_verify($senha, $fila['senha'])) {
            session_start();
            $_SESSION['usuario'] = $fila['user'];
            header('location:home.php');
            exit();
        } else {
            echo 'Não existe esse usuario em nossa base de dados';
        }
    } catch (PDOException $e) {
        echo $e->getMessage();
        echo $e->getLine();
    }
}

