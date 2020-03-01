<?php
session_start();

define("DB_SERVER", "localhost");
define("DB_USER", "root");
define("DB_PASSWORD", "");
define("DB_DATABASE", "facilconsulta");

$mysqli = new mysqli(DB_SERVER , DB_USER, DB_PASSWORD, DB_DATABASE) or die (mysqli_error($mysqli));

$id = 0;
$update =false;
$nome = '';
$email = '';
$endereco = '';
$senha = '';
// $datacridasdsaacao = '';

if (isset($_POST['salvar'])){
    $nome = $_POST['nome'];
    $email = $_POST['email'];
    $endereco = $_POST['endereco'];
    $senha = $_POST['senha'];
   // $datacriacao =  date('Y-d-m H:i:s');
   //  $datacriacao = $_POST['datacriacao'];

    $mysqli->query("INSERT INTO medico (nome, email, endereco, senha) VALUES ('$nome', '$email', '$endereco')") or 
            die($mysqli->error);
    
            //cria a data de criação da consulta
   // echo "Data da criação da consulta: " . $datacriacao . "<br>";

    $_SESSION ['message'] = "Foi salvo.";
    $_SESSION ['msg_type'] = "succes";

        //retorna pro index após salvar
    header("location: index.php");
}

if (isset($_GET['deletar'])){
    $id = $_GET['deletar'];
    $mysqli->query("DELETE FROM facilconsulta WHERE id=id");

    $_SESSION ['message'] = "Foi deletado.";
    $_SESSION ['msg_type'] = "warning";
    //retorna pro index após excluir
    header("location: index.php");
}

if(isset($_GET['editar'])){
    $id = $_GET['editar'];
    $update =true;
    $resultado = $mysqli->query("SELECT * FROM facilconsulta WHERE id=id") or die($mysqli->error());
    if (count($resultado)==1){
        $row = $resultado->fetch_array();
        $nome = $row['nome'];
        $endereco = $row['endereco'];
        $email = $row['email'];
        $senha = $row['senha'];
    }
}

if(isset($_POST['update'])){
    $id = $_POST['id'];
    $nome = $_POST['nome'];
    $email = $_POST['email'];
    $endereco = $_POST['endereco'];
    $senha = $_POST['senha'];

    $mysqli->query("UPDATE facilconsulta SET nome='$nome', email='$email', endereco='$endereco', senha='$senha' WHERE id=$id") 
        or die($mysqli->error());
    $_SESSION['message'] = "Infos foram atualizadas!";
    $_SESSION['msg_type'] = "warning";

    header('location: index.php');
}
?>