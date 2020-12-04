<?php

namespace Blackjack;

include_once("_cabecera.php");

/*
 * Clase VistaGanador
 */
class VistaGanador
{
    public static function render($ganador, $puntos_J, $puntos_C)
    {
?>
        <div class="contenedor1">
            <div class="row justify-content-center">
                <div class="mt-5 px-2 align-self-center border border-dark bg-white rounded text-center ">
                    <h1>Blackjack</h1>
                </div>
            </div>
            <div id="mensaje">
                <div class="row justify-content-center">
                    <h4>El ganador ha sido el <span><?php echo $ganador; ?></span>
                        <br>Puntos del jugador: <span><?php echo $puntos_J; ?> PUNTOS.</span>
                        <br>Puntos del crupier: <span><?php echo $puntos_C; ?> PUNTOS.</span>
                    </h4>
                </div>
            </div>
            <div class="row justify-content-center">
                <div class="new_partida">
                    <button id="nueva_partida" class="blackjack" action="nuevaPartida" name="nueva_partida">Nueva partida</button>
                </div>
            </div>
        </div>
<?php
    }
}

?>