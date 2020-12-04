<?php

namespace Blackjack;

include_once("_cabecera.php");

/*
 * Clase VistaIndex
 * @author Bilal Bejja
 */
class VistaIndex
{
    public static function render($partida)
    {
?>
        <div class="contenedor2">
            <div class="row justify-content-center">
                <div class="mt-5 px-2 align-self-center border border-dark bg-white rounded text-center ">
                    <h1>Blackjack</h1>
                </div>
            </div>
            <div class="row justify-content-center">

                <!--Parte del JUGADOR-->

                <aside id="izquierda">
                    <div class="row justify-content-center izq">
                        <!--Mostrar cartas-->
                        <?php
                        foreach ($partida->getJugador()->getMano() as $carta) {
                            echo "<img src='img/" . $carta . ".jpg' alt='" . $carta . "'>";
                        }
                        ?>
                    </div>
                    <!--Los puntos del jugador-->
                    <div class="puntos">
                        <h4>Puntos del jugador:
                            <?php
                            echo $partida->getJugador()->calcCards();
                            ?>
                        </h4>
                    </div>
                </aside>

                <!--Parte del CRUPIER-->

                <aside id="derecha">
                    <div class="row justify-content-center der">
                        <!--Mostrar cartas-->
                        <?php
                        foreach ($partida->getCrupier()->getMano() as $carta) {
                            echo "<img src='img/" . $carta . ".jpg' alt='" . $carta . "'>";
                        }
                        ?>
                    </div>
                    <!--Los puntos del crupier-->
                    <div class="puntos">
                        <h4>Puntos del crupier:
                            <?php
                            echo $partida->getCrupier()->calcCards();
                            ?>
                        </h4>
                    </div>
                </aside>
            </div>
            <div class="row justify-content-center">
                <div class="jugar">
                    <button id="pedir_carta" class="blackjack" action="pedirCarta" name="pedir_carta">Pedir carta</button>
                    <button id="plantarse" class="blackjack" action="plantarse" name="plantarse">Plantarme</button>
                </div>
                <div class="new_partida">
                    <button id="nueva_partida" class="blackjack" action="nuevaPartida" name="nueva_partida">Nueva partida</button>
                </div>
            </div>
        </div>
<?php
    }
}
?>
