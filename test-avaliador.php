<?php

use Alura\Leilao\Model\Lance;
use Alura\Leilao\Model\Leilao;
use Alura\Leilao\Model\Usuario;
use Alura\Leilao\Service\Avaliador;

require 'vendor/autoload.php';

$leilao = new Leilao('Fiat 147 0KM');

$user_maria = new Usuario('Maria');
$user_joao = new Usuario('João');

$leilao->recebeLance(new Lance($user_maria, 2000));
$leilao->recebeLance(new Lance($user_joao, 2500));


$leiloeiro = new Avaliador();
$leiloeiro->avalia($leilao);

$maiorValor = $leiloeiro->getMaiorValor();

// Verificamos se a saída é a esperada 
$valorEsperado = 2500;

if ($maiorValor == $valorEsperado) {
    echo "TESTE OK";
} else {
    echo "TESTE FALHOU";
}