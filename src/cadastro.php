<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Facil Consulta</title>
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <?php
        include('header.php');
    ?>
    </head>
    <body>
        <?php require_once 'model/config-banco-dados.php'; ?>

        <?php   
                //faz a conexão com o bando de dados
                $mysqli = new mysqli(DB_SERVER , DB_USER, DB_PASSWORD, DB_DATABASE) or die (mysqli_error($mysqli));
                $resultado = $mysqli->query("SELECT * FROM facilconsulta");
        ?>

        <div class="row justify-content-center">
            <form action="config-banco-dados.php" method="POST">
                <input type="hidden" name="id" value="<?php echo $id; ?>">
                <div class="form-group">
                <label>Email</label>
                <input type="email" class="form-control" name="email"
                 value="<?php echo $email; ?>" placeholder="Digite o seu email..">  
                </div>
                <div class="form-group">
                <label>Nome</label>
                <input type="text" class="form-control" name="nome" 
                value="<?php echo $nome; ?>" placeholder="Digite o seu nome.." >
                </div>
                <div class="form-group">
                <label>Endereço</label>
                <input type="text" class="form-control" name="endereco" 
                value="<?php echo $endereco; ?>" placeholder="Digite o seu endereço..">
                </div>
                <div class="form-group">
                <label>Senha</label>
                <input type="password" class="form-control" name="senha" 
                value="<?php echo $senha; ?>" id="pass" placeholder="Digite a sua senha...">
                </div>
                <div class="form-group">
                <?php
                    if($update == true):
                ?>
                    <button type="submit" class="btn btn-info" name="update">Update </button>
                <?php else: ?>
                    <button type="submit" class="btn btn-primary" name="salvar">Cadastrar </button>
                <?php endif; ?>   

                </div>
        </form>
        </div>
    </body>
</html>