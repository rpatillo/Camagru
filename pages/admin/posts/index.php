<?PHP

if ($_SESSION['auth']) {
    echo $_SESSION['auth'] . " est log.";
} else {
    echo "Pas de session ...";
}