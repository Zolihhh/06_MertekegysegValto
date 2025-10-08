<?php

$mappa = "/projektek/06_MertekegysegValto";
//Útvonal (route) választó (router)

$parsed = parse_url($_SERVER['REQUEST_URI']);
//var_dump($parsed);
$path = $parsed['path'];

//útvonal választó
switch ($path) {
    // Valutaváltó
    case $mappa . "/":

        require('./view/home.php');
        break;
    case $mappa . "/valutavalto":
        $mennyit = (int) ($_GET['mennyit'] ?? 1);
        $mirol = $_GET['mirol'] ?? "USD";
        $mire = $_GET['mire'] ?? 'HUF';

        $url = "http://localhost:3000/currencies/$mirol";
        $atvaltoTablazat = json_decode(file_get_contents($url), true);
        $url = "http://localhost:3000/currencies";
        $valutak = json_decode(file_get_contents($url), true);
        $vegeredmeny = $mennyit * $atvaltoTablazat['rates'][$mire];

        require('./view/valutatvalto.php');
        break;

    // Hosszváltó
    case $mappa . "/hosszvalto":
        $mennyit = (int) ($_GET['mennyit'] ?? 1);
        $mirol = $_GET['mirol'] ?? "m";
        $mire = $_GET['mire'] ?? 'cm';

        $url = "http://localhost:3000/hosszusag/$mirol";
        $hosszAtvaltoTablazat = json_decode(file_get_contents($url), true);

        $url = "http://localhost:3000/hosszusag";
        $mertekegysegek = json_decode(file_get_contents($url), true);

        $vegeredmeny = $mennyit * $hosszAtvaltoTablazat['rates'][$mire];

        require('./view/hosszvalto.php');
        break;
    default:
        # code...
        require('./view/404.php');
        break;

    // Mértékegységváltó
    case $mappa . "/mertekegysegvalto":
        $mertekegyseg = $_GET['mertekegyseg'] ?? 'hosszusag';

        $url = "http://localhost:3000/alapmertekegysegek";
        $alapmertekegysegek = json_decode(file_get_contents($url), true);
        
        $mennyit = (int) ($_GET['mennyit'] ?? 1);
        $mirol = $_GET['mirol'] ?? $alapmertekegysegek[$mertekegyseg]['mirol'];
        $mire = $_GET['mire'] ?? $alapmertekegysegek[$mertekegyseg]['mire'];
        var_dump($alapmertekegysegek[$mire]);

        $url = "http://localhost:3000/hosszusag/$mirol";
        $hosszAtvaltoTablazat = json_decode(file_get_contents($url), true);

        $url = "http://localhost:3000/hosszusag";
        $mertekegysegek = json_decode(file_get_contents($url), true);

        $vegeredmeny = $mennyit * $hosszAtvaltoTablazat['rates'][$mire];

        require('./view/mertekegysegvalto.php');
        break;

    
}
?>