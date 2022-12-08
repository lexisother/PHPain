<?php

ini_set("display_errors", 1);

function debug($val)
{
    echo "<pre>";
    print_r($val);
    echo "</pre>";
}

function console($input, $line = "unknown")
{
    $file = __DIR__ . '/log.js';
    $logs = file_get_contents($file);
    $logs .= "console.log('L{$line}: {$input}');\n";
    file_put_contents(__DIR__ . '/log.js', $logs);
}

include_once "controller.php";

session_start();

if (isset($_SESSION['controller'])) {
    $controller = $_SESSION['controller'];
} else {
    file_put_contents(__DIR__ . '/log.js', "console.log('L0: Game initialized!');\n");
    $controller = new Controller(['Alyxia', 'Niele', 'Tinna', 'Flamex']);
}

if (isset($_GET['reset'])) {
    session_destroy();
    header("location:index.php");
}

if (isset($_GET['road']) || isset($_GET['village']) || isset($_GET['city'])) {
    $controller->placeBuilding();
}
if (isset($_GET['turn'])) {
    $controller->endTurn();
}

?>

    <html>
    <head>
        <title>Catan</title>
        <meta charset="UTF-8">
        <link rel="stylesheet" href="catan.css">
        <meta name="author" content="Alyxia Sother">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <script src="log.js"></script>
    </head>
    <body>
    <?= $controller ?>
    <a href="?reset">fuck off</a>
    <br/>
    <a href="?turn">end it</a>
    </body>
    </html>
<?php $_SESSION['controller'] = $controller ?>