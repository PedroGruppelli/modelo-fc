<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Fácil Consulta</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
</head>
<body>
    <?php
        include('cadastro.php');
    ?>

    <?php
    
    if(isset($_SESSION['message'])); ?>

    <div class="alert alert-<?=$_SESSION['msg_type']?>">

        <?php
            echo $_SESSION['message'];
            unse ($_SESSION['message']);
        ?>

    <div class="container">
       

        <div class="row justify-content-center">
            <table class="table">
                <thead>
                    <tr>
                        <th>Nome</th>
                        <th>Endereco</th>
                        <th colspan="2">Acao</th>
                    </tr>
                </thead> 
          
        <?php
            while($row = $resultado->fetch_assoc()): ?>
                <tr>
                        <td><?php echo $row['nome']; ?></td>
                        <td><?php echo $row['endereco']; ?></td>
                        <td>
                            <a href="index.php?editar=<?php echo $row ['id']; ?>"
                            class="btn btn-info">Editar</a>
                            <a href="config-banco-dados.php?deletar=<?php echo $row['id']; ?>"
                            class="btn btn-danger" >Deletar</a>
                        </td>
                    </tr> 
            <?php endwhile; ?>
            </table>
        </div> 
            <?php
                function pre_r( $array ){
                    echo '<pre>';
                    print_r($array);
                    echo '</pre>';
                }
            ?>

    </div>                            
</body>
</html>