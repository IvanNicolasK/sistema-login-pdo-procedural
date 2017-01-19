<?php 
session_start();
if (isset($_SESSION['usuario'])){
    header('location: home.php');
}
require_once './templates/header.php';
?>

<div class="container">

    <div class="signup-form-container">

        <form  id="form-login" autocomplete="off" action="verificaLogin.php" method="post" role="form">

            <div class="form-header">
                <h3 class="form-title text-center"><i class="fa fa-user"></i> Faça seu Login ou <a href="cadastrar.php">Cadastre-se</a></h3>
            </div>

            <div class="form-body">
                <div class="alert alert-info" id="message" style="display:none;"></div>

                <div class="form-group">
                    <div class="input-group">
                        <div class="input-group-addon"><span class="glyphicon glyphicon-user"></span></div>
                        <input type="text" class="form-control" name="nome" placeholder="Usuario" autofocus>
                    </div>
                    <span class="msg-erro" id="error"></span>
                </div>

                    <div class="form-group">
                        <div class="input-group">
                            <div class="input-group-addon"><span class="glyphicon glyphicon-lock"></span></div>
                            <input type="password" class="form-control" name="senha" id="password"  placeholder="Senha">
                        </div>  
                        <span class="msg-erro" id="error"></span>                    
                    </div>
                </div>
          
            <div class="form-footer">
                <button type="submit" class="btn btn-success btn-block" name="btn-login">
                    <span class="glyphicon glyphicon-log-in"></span> Login
                </button>
            </div>
        </form>
    </div>
</div>




<?php require_once './templates/footer.php'; ?>


