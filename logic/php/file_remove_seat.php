<?php
/**
 * Created by PhpStorm.
 * User: edythawne
 * Date: 31/05/18
 * Time: 02:32 PM
 */

require_once "ClassBus.php";

$bus = new ClassBus();

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $seat = $_POST["seat"];
    $bus -> removeSeat($seat);
    echo "ok";
}

?>