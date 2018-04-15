<?php
/**
 * Created by IntelliJ IDEA.
 * User: raahil
 * Date: 4/13/2018
 * Time: 3:11 PM
 */

require_once("Handler.php");

$choice = $_GET["choice"];
switch($choice){
    case "encrypt":
        $handler = new Handler();
        $handler -> encrypt($_GET["wd"]);
        break;

    case "decrypt":
        $handler = new Handler();
        $handler -> decrypt($_GET["wd"]);
        break;

    case "":
        //404 - not found
        break;
}