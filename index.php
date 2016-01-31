<?php
require_once("classes/indexClasses.php");
if(isset($_POST['choice']))
{
    new GameState();
    header("Location:/");
    exit;
}

if(isset($_POST['reset'])){
    session_start();
    session_destroy();
    header("Location:/");
    exit;
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Title</title>
</head>
<body>
<form method="post">
    <h3>Est-ce que tu veux jouer?</h3>
    <input type="radio" name="choice" value="non" checked>Non<br>
    <input type="radio" name="choice" value="yes" checked>Oui<br>
    <input type="submit" value="OK"><br><br>

    <input type="submit" name="reset" value="Reset">
</form>
</body>
</html>
