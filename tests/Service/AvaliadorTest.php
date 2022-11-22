<?php

namespace Alura\Leilao\Tests\Service;

use Alura\Leilao\Model\Lance;
use Alura\Leilao\Model\Leilao;
use Alura\Leilao\Model\Usuario;
use Alura\Leilao\Service\Avaliador;
use PHPUnit\Framework\TestCase;

class AvaliadorTest extends TestCase
{
    public function testAvaliadorDeveEncontrarOMaiorValorDeLancesEmOrdemCrescente()
    {
        $leilao = new Leilao('Fiat 147 0KM');

        $user_maria = new Usuario('Maria');
        $user_joao = new Usuario('João');

        $leilao->recebeLance(new Lance($user_maria, 2000));
        $leilao->recebeLance(new Lance($user_joao, 2500));


        $leiloeiro = new Avaliador();
        $leiloeiro->avalia($leilao);

        $maiorValor = $leiloeiro->getMaiorValor();

        $this->assertEquals(2500, $maiorValor);

    }

    public function testAvaliadorDeveEncontrarOMaiorValorDeLancesEmOrdemDrescente()
    {
        $leilao = new Leilao('Fiat 147 0KM');

        $user_maria = new Usuario('Maria');
        $user_joao = new Usuario('João');

        $leilao->recebeLance(new Lance($user_joao, 2500));
        $leilao->recebeLance(new Lance($user_maria, 2000));


        $leiloeiro = new Avaliador();
        $leiloeiro->avalia($leilao);

        $maiorValor = $leiloeiro->getMaiorValor();

        $this->assertEquals(2500, $maiorValor);

    }
}