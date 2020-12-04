<?php

namespace Blackjack; 

/*
 * Clase Jugador
 * @author Bilal Bejja
 */

class Jugador
{
    //las cartas que haya ido robando
    private $mano;

    public function __construct($mano = array())
    {
        $this->mano = $mano;
    }

    public function nuevaCarta($Carta)
    {
        $this->mano[] = $Carta;
        //O con push
    }

    public function __toString()
    {
        $result = "";
        foreach ($this->mano as $carta) {
            $result .= $carta->getPalo() . "-" . $carta->getFigura() . "<br>";
        }
        return $result;
    }

    public function valorMano()
    {
        //sumar el valor de las cartas 
        $suma = 0;
        foreach ($this->mano as $carta) {
            //Ir sumando el valor de las cartas 
            $suma += $carta->getValor();
        }
        return $suma;
    }

    public function totalCartas()
    {
        return count($this->mano);
    }

    //Calcula el valor de las cartas teniendo en cuanta los as (1 o 11)
    function calcCards()
    {
        $cards = array('A' => 1, '2' => 2, '3' => 3, '4' => 4, '5' => 5, '6' => 6, '7' => 7, '8' => 8, '9' => 9, '10' => 10, 'J' => 10, 'Q' => 10, 'K' => 10);
        $count = 0;
        $aces = 0;

        foreach ($this->mano as $carta) {
            if ($carta->getFigura() != "A") {
                $count += $cards[$carta->getFigura()];
            } else {
                $aces++;
            }
        }
        for ($x = 0; $x < $aces; $x++) {
            if ($count + 11 > 21) {
                $count += 1;
            } else {
                $count += 11;
            }
        }
        return $count;
    }

    public function getMano()
    {
        return $this->mano;
    }
}
