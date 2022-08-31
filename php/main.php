<?php

session_start();
if (!isset($_SESSION["attempts"])) {
    $_SESSION["attempts"] = [];
}


function checkHitCircle($x, $y, $r): bool
{
    return $x >= 0 && $y >= 0 && $x ** 2 + $y ** 2 <= ($r / 2) ** 2;
}


function checkHitSquare($x, $y, $r): bool
{
    return $x <= 0 && $y >= 0 && $x >= -$r && $y <= $r;
}


function checkHitTriangle($x, $y, $r): bool
{
    return $x <= 0 && $y <= 0 && $x ** 2 + $y ** 2 <= $r ** 2;
}


function main(): void
{
    if (!(isset($_POST["x"]) && isset($_POST["y"]) && isset($_POST["r"]))) {
        echo "Не указаны необходимые параметры x, y, R!";
        http_response_code(400);
        return;
    }

    $x = floatval($_POST["x"]);
    $y = floatval($_POST["y"]);
    $r = floatval($_POST["r"]);

    $wasHit = checkHitCircle($x, $y, $r) || checkHitSquare($x, $y, $r) || checkHitTriangle($x, $y, $r);

    date_default_timezone_set('Europe/Moscow');
    $currentTime = date('H:i:s', time());

    $processingTime = round(microtime(true) - $_SERVER['REQUEST_TIME_FLOAT'], 5);


    $attempt = [
        "x" => $x,
        "y" => $y,
        "R" => $r,
        "hit" => $wasHit,
        "attemptFrom" => $currentTime,
        "processingTime" => $processingTime
    ];

    $_SESSION["attempts"][] = $attempt;
    header('Location: ../index.php');
}

main();