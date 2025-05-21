<?php
// Activar a mostra de erros en desenvolvemento
ini_set('display_errors', 1);
error_reporting(E_ALL);

// Comprobamos se se enviou o formulario por POST
if ($_SERVER["REQUEST_METHOD"] === "POST") {
    // Recollida e sanitización dos datos
    $nome = filter_input(INPUT_POST, 'nome', FILTER_SANITIZE_SPECIAL_CHARS);
    $email = filter_input(INPUT_POST, 'email', FILTER_SANITIZE_EMAIL);
    $mensaxe = filter_input(INPUT_POST, 'mensaxe', FILTER_SANITIZE_SPECIAL_CHARS);

    // Validación no servidor
    $erros = [];

    if (empty($nome) || strlen($nome) < 2) {
        $erros[] = "O nome é obrigatorio e debe ter como mínimo 2 caracteres.";
    }

    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $erros[] = "O correo electrónico non é válido.";
    }

    if (empty($mensaxe) || strlen($mensaxe) < 10) {
        $erros[] = "A mensaxe é obrigatoria e debe ter polo menos 10 caracteres.";
    }

    // Se hai erros, amosámolos
    if (!empty($erros)) {
        echo "<div class='erro'>";
        echo "<h2>⚠️ Erros detectados:</h2><ul>";
        foreach ($erros as $erro) {
            echo "<li>" . htmlspecialchars($erro) . "</li>";
        }
        echo "</ul>";
        echo "<a href='index.php'>← Volver ao formulario</a>";
        echo "</div>";
        exit;
    }

    // Se todo está correcto, gardar ou enviar (exemplo: gardar nun ficheiro)
    $data = date("Y-m-d H:i:s");
    $liña = "$data | Nome: $nome | Email: $email | Mensaxe: $mensaxe" . PHP_EOL;
    file_put_contents("mensaxes.txt", $liña, FILE_APPEND);

    // Mensaxe de confirmación con ID para Playwright
    echo "<div id='confirmacion'>";
    echo "<h2>✅ Mensaxe enviada correctamente!</h2>";
    echo "<p>Grazas, <strong>" . htmlspecialchars($nome) . "</strong>. Contactaremos contigo ao correo <strong>" . htmlspecialchars($email) . "</strong>.</p>";
    echo "<a href='index.php'>← Enviar outra mensaxe</a>";
    echo "</div>";
} else {
    // Acceso incorrecto
    header("Location: index.php");
    exit;
}
