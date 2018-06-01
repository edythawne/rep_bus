<?php
/**
 * Created by PhpStorm.
 * User: edythawne
 * Date: 28/05/18
 * Time: 02:41 PM
 */

// Importación de archivos php
require_once "ClassBus.php";

// Creacion de objetos
$bus = new ClassBus();
$array = $bus->getSeats();

$num_lugar = 0;
$html = '';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // The request is using the POST method
    $html .= "<table class='centered'> <thead></thead> <thbody> <tr> <td class='black'><img src='components/assets/asiento_ocupado.png'></td>  <td colspan='4'></td>  </tr>";

    for ($i = 0; $i < 10; $i++) {
        $html .= '<tr>';

        for ($j = 0; $j < 4; $j++) {
            $num_lugar = $num_lugar + 1;

            if ($array[$num_lugar] != '') {
                $object = json_decode($array[$num_lugar]);
                if ($object -> numero == $num_lugar) {
                    $html .= "<td class='black white-text'>
                                <a class='modal-trigger' href='#_info' onclick='getSeat($num_lugar)'>$num_lugar</a><br>
                                <img src='components/assets/asiento_ocupado.png'>
                                </td>";
                }
            } else {
                $html .= "<td class='teal green darken-4 white-text'>$num_lugar<br>
                            <img src='components/assets/asiento_vacio.png'>
                        </td>";;
            }

            if ($j == 1) {
                $html .= "<td> </td>";
            }
        }

        $html .= "</tr>";
    }


    $html .= "</thbody></table>";

    echo $html;

    exit();
}

?>