<?php
require ('./vendor/autoload.php');

use \App\Entity\Vaga;

//validação do post
if(isset($_POST['titulo'],$_POST['descricao'],$_POST['ativo'])){
    $obVaga= new Vaga;
    $obVaga->titulo=$_POST['titulo'];
    $obVaga->descricao=$_POST['descricao'];
    $obVaga->ativo= $_POST['ativo'];
    $obVaga->cadastrar();

    header('location: index.php?status=success');
    exit;
}

include ('./Includes/Header.php');
include ('./Includes/Formulario.php');
include ('./Includes/footer.php');