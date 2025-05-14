<?php
session_start();
header("Content-Type: application/json");

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $nume = $_POST["nume"] ?? '';
    $parola = $_POST["parola"] ?? '';

    $fisier = "users.json";

    if (!file_exists($fisier)) {
        echo json_encode(["success" => false, "message" => "Nu există utilizatori înregistrați."]);
        exit;
    }

    $continut = file_get_contents($fisier);
    $utilizatori = json_decode($continut, true);

    foreach ($utilizatori as $u) {
        if ($u["nume"] === $nume && password_verify($parola, $u["parola"])) {
            $_SESSION["user"] = $u["nume"];
            echo json_encode(["success" => true]);
            exit;
        }
    }

    echo json_encode(["success" => false, "message" => "Nume sau parolă incorectă."]);
    exit;
}
?>
