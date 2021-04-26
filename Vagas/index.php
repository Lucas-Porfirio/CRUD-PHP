<?php
require ('./vendor/autoload.php');
use \App\Entity\Vaga;
$vagas = Vaga:: getVagas();

include ('./Includes/Header.php');
include ('./Includes/Listagem.php');
include ('./Includes/footer.php');