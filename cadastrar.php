<?php 
require_once './templates/header.php';
require_once 'conexao.php';

if (isset($_POST['btn-cadastrar'])) {
    $usuario = $_POST['nome'];
    $email = $_POST['email'];
    $senha = password_hash($_POST['senha'], PASSWORD_DEFAULT);
    $senha2 = $_POST['senha2'];

    try {
        $sql = "INSERT INTO usuarios(user,email,senha) values(:arg_nome,:arg_email,:arg_senha)";
        $resultado = $con->prepare($sql);
        $resultado->execute(array(
            ":arg_nome" => $usuario,
            ":arg_email" => $email,
            ":arg_senha" => $senha,));
        if ($resultado):
            $msg = "<div class='alert alert-success'>
                        <span class='glyphicon glyphicon-info-sign'></span> Registro Inserido com Sucesso!
                    </div>";
        else:
            $msg = "<div class='alert alert-danger'>
                        <span class='glyphicon glyphicon-info-sign'></span> Erro ao Registrar!
                    </div>";
        endif;
    } catch (PDOException $e) {
        echo $e->getMessage();
        echo $e->getLine();
    }
}
?>

<div class="container">

    <div class="signup-form-container">

        <form  id="form-login" autocomplete="off" action="<?= $_SERVER['PHP_SELF']; ?>" method="post" role="form">
        <?php if(isset($msg)){echo $msg;} ?>
            <div class="form-header">
                <h3 class="form-title"><i class="fa fa-user"></i> Cadastro de Usuario ou  <a href="index.php"> Voltar a Página de Login</button> </a></h3>
            </div>

            <div class="form-body">
                <div class="alert alert-info" id="message" style="display:none"></div>
                
                <div class="form-group">
                    <div class="input-group">
                        <div class="input-group-addon"><span class="glyphicon glyphicon-user"></span></div>
                        <input type="text" class="form-control" name="nome" placeholder="Usuario" autofocus>
                    </div>
                    <span class="msg-erro" id="error"></span>
                </div>

                <div class="form-group">
                    <div class="input-group">
                        <div class="input-group-addon"><span class="glyphicon glyphicon-envelope"></span></div>
                        <input type="email" class="form-control" name="email"  placeholder="Email">
                    </div> 
                    <span class="msg-erro" id="error"></span>                     
                </div>

                <div class="row">

                    <div class="form-group col-lg-6">
                        <div class="input-group">
                            <div class="input-group-addon"><span class="glyphicon glyphicon-lock"></span></div>
                            <input type="password" name="senha" id="senha" class="form-control"   placeholder="Senha">
                        </div>  
                        <span class="msg-erro" id="error"></span>                    
                    </div>

                    <div class="form-group col-lg-6">
                        <div class="input-group">
                            <div class="input-group-addon"><span class="glyphicon glyphicon-lock"></span></div>
                            <input type="password" name="senha2"  class="form-control" placeholder="Repita a Senha">
                        </div>  
                        <span class="msg-erro" id="error"></span>                    
                    </div>
                </div>
            </div>
            <div class="form-footer">
                <button type="submit" class="btn btn-success btn-block" name="btn-cadastrar">
                    <span class="glyphicon glyphicon-log-in"></span> Cadastrar Usuário
                </button>            
            </div>
        </form>
    </div>
</div>

<?php require_once './templates/footer.php';
