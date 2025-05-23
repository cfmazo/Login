<?php
session_start();

if (!isset($_SESSION['score'])) {
    $_SESSION['score'] = 0;
}

$num1 = rand(1, 10);
$num2 = rand(1, 10);
$correctAnswer = $num1 + $num2;

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $userAnswer = intval($_POST["answer"]);
    if ($userAnswer == $_SESSION['correct']) {
        $_SESSION['score']++;
        $message = "¡Correcto! Tu puntaje: " . $_SESSION['score'];
    } else {
        $message = "Incorrecto. La respuesta correcta era " . $_SESSION['correct'] . ". Tu puntaje: " . $_SESSION['score'];
    }
}

$_SESSION['correct'] = $correctAnswer;
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Juego de Sumas en PHP</title>
</head>
<body>
    <h1>Juego de Sumas</h1>
    <p>¿Cuánto es <?= $num1 ?> + <?= $num2 ?>?</p>
    
    <form method="post">
        <input type="number" name="answer" required>
        <button type="submit">Enviar</button>
    </form>

    <?php if (isset($message)) echo "<p>$message</p>"; ?>
</body>
</html>
