<?php
session_start();
if (!isset($_SESSION['usuario'])){
    header('location: index.php');
}
require_once './templates/header.php';
?>

<nav class="navbar navbar-inverse navbar-fixed-top">
    <div class="container">
        <div class="navbar-header">
            <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
            <a class="navbar-brand" href="#">Hempel Tecnologia</a>
        </div>
    </div>
</nav>

<div class="jumbotron">
    <div class="container">
        <h3>Bem Vindo(a) <?= $_SESSION['usuario']; ?></h3>
        <p>Sistema Simples de Login e Registro com PHP,PDO e JQuery</p>
        <p><a href="logout.php"><button type="submit" class="btn btn-danger">LogOut</button></a></p>
    </div>
</div>


<?php require_once './templates/footer.php'; ?>


