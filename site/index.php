<?php

require __DIR__ . "/pages/recent-versions.php";


if (isset($_GET['game'])) {
    $game = $_GET['game'];
} else {
    $game = 'null';
}




$download_api_links = file_get_contents(__DIR__ . "/pages/json/download_api_links.json");
$download_api_links = json_decode($download_api_links, true);

$latest_api_links = file_get_contents(__DIR__ . "/pages/json/latest_api_links.json");
$latest_api_links = json_decode($latest_api_links, true);

$recent_api_links = file_get_contents(__DIR__ . "/pages/json/recent_api_links.json");
$recent_api_links = json_decode($recent_api_links, true);


if ($game == 'null') {

    include __DIR__ . "/error_pages/missing_game_parameter.php";

# Minecraft Java

} else if ($game == 'java') {
    header('Content-Type: application/json; charset=utf-8');

    if (isset($_GET['software'])) {

        $software = $_GET['software'];

    } else {

        exit(json_encode(array('error' => 'Missing software parameter')));
        
    }
    
    if ($software == 'forge') {

        if(!isset($_GET["function"])) exit(json_encode(array('error' => 'Invalid software parameter')));
        if(!isset($_GET["version"])) {
            if ($_GET["function"] == "download") echo json_encode(array('link' => $download_api_links["forge"]));
        } else {
            echo json_encode(array('link' => $download_api_links["forge"] . "/" . $_GET["version"]));
        }
        if ($_GET["function"] == "latest") echo json_encode(array('link' => $latest_api_links["forge"]));
        if ($_GET["function"] == "recent") getRecentVersions("modded", "forge");

    } else if ($software == 'paper') {

        if(!isset($_GET["function"])) exit(json_encode(array('error' => 'Invalid software parameter')));
        if(!isset($_GET["version"])) {
            if ($_GET["function"] == "download") echo json_encode(array('link' => $download_api_links["paper"]));
        } else {
            echo json_encode(array('link' => $download_api_links["paper"] . "/" . $_GET["version"]));
        }
        if ($_GET["function"] == "latest") echo json_encode(array('link' => $latest_api_links["paper"]));
        if ($_GET["function"] == "recent") getRecentVersions("servers", "paper");

    } else if ($software == 'fabric') {

        if(!isset($_GET["function"])) exit(json_encode(array('error' => 'Invalid software parameter')));
        if(!isset($_GET["version"])) {
            if ($_GET["function"] == "download") echo json_encode(array('link' => $download_api_links["fabric"]));
        } else {
            echo json_encode(array('link' => $download_api_links["fabric"] . "/" . $_GET["version"]));
        }
        if ($_GET["function"] == "latest") echo json_encode(array('link' => $latest_api_links["fabric"]));
        if ($_GET["function"] == "recent") getRecentVersions("modded", "fabric");

    } else if ($software == 'vanilla') {

        if(!isset($_GET["function"])) exit(json_encode(array('error' => 'Invalid software parameter')));
        if(!isset($_GET["version"])) {
            if ($_GET["function"] == "download") echo json_encode(array('link' => $download_api_links["vanilla"]));
        } else {
            echo json_encode(array('link' => $download_api_links["vanilla"] . "/" . $_GET["version"]));
        }
        if ($_GET["function"] == "latest") echo json_encode(array('link' => $latest_api_links["vanilla"]));
        if ($_GET["function"] == "recent") getRecentVersions("vanilla", "vanilla");

    } else if ($software == 'spigot') {

        if(!isset($_GET["function"])) exit(json_encode(array('error' => 'Invalid software parameter')));
        if(!isset($_GET["version"])) {
            if ($_GET["function"] == "download") echo json_encode(array('link' => $download_api_links["spigot"]));
        } else {
            echo json_encode(array('link' => $download_api_links["spigot"] . "/" . $_GET["version"]));
        }
        if ($_GET["function"] == "latest") echo json_encode(array('link' => $latest_api_links["spigot"]));
        if ($_GET["function"] == "recent") getRecentVersions("servers", "spigot");

    } else if ($software == 'bukkit') {

        if(!isset($_GET["function"])) exit(json_encode(array('error' => 'Invalid software parameter')));
        if(!isset($_GET["version"])) {
            if ($_GET["function"] == "download") echo json_encode(array('link' => $download_api_links["bukkit"]));
        } else {
            echo json_encode(array('link' => $download_api_links["bukkit"] . "/" . $_GET["version"]));
        }
        if ($_GET["function"] == "latest") echo json_encode(array('link' => $latest_api_links["bukkit"]));
        if ($_GET["function"] == "recent") getRecentVersions("servers", "bukkit");

    } else {    
        echo json_encode(array('error' => 'Invalid software parameter'));
    }

# Minecraft Bedrock

} else if ($game == 'bedrock') {
    header('Content-Type: application/json; charset=utf-8');

    if (isset($_GET['software'])) {

        $software = $_GET['software'];

    } else {

        exit(json_encode(array('error' => 'Missing software parameter')));
        
    }

    if ($software == 'nukkitx') {

        if(!isset($_GET["function"])) exit(json_encode(array('error' => 'Invalid software parameter')));
        if(!isset($_GET["version"])) {
            if ($_GET["function"] == "download") echo json_encode(array('link' => $download_api_links["nukkitx"]));
        } else {
            echo json_encode(array('link' => $download_api_links["nukkitx"] . "/" . $_GET["version"]));
        }
        if ($_GET["function"] == "latest") echo json_encode(array('link' => $latest_api_links["nukkitx"]));
        if ($_GET["function"] == "recent") getRecentVersions("bedrock", "nukkitx");

    } else if ($software == 'pocketmine') {

        if(!isset($_GET["function"])) exit(json_encode(array('error' => 'Invalid software parameter')));
        if(!isset($_GET["version"])) {
            if ($_GET["function"] == "download") echo json_encode(array('link' => $download_api_links["pocketmine"]));
        } else {
            echo json_encode(array('link' => $download_api_links["pocketmine"] . "/" . $_GET["version"]));
        }
        if ($_GET["function"] == "latest") echo json_encode(array('link' => $latest_api_links["pocketmine"]));
        if ($_GET["function"] == "recent") getRecentVersions("bedrock", "pocketmine");

    } else if ($software == 'vanilla') {

        if(!isset($_GET["function"])) exit(json_encode(array('error' => 'Invalid software parameter')));
        if ($_GET["function"] == "download") echo json_encode(array('link' => $download_api_links["bedrock"]));
        if ($_GET["function"] == "latest") echo json_encode(array('link' => $latest_api_links["bedrock"]));
        if ($_GET["function"] == "recent") echo json_encode(array('link' => "Unavailable"));

    } else {    
        echo json_encode(array('error' => 'Invalid software parameter'));
    }

} else {
    header('Content-Type: application/json; charset=utf-8');
    echo json_encode(array('error' => 'Invalid game parameter'));

}