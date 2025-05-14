<?php
header("Content-Type: application/json");

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $nume = $_POST["nume"] ?? '';
    $parola = $_POST["parola"] ?? '';

    if (!$nume || !$parola) {
        echo json_encode(["success" => false, "message" => "Completează toate câmpurile."]);
        exit;
    }

    $parola_hash = password_hash($parola, PASSWORD_DEFAULT);

    $user = [
        "nume" => $nume,
        "parola" => $parola_hash
    ];

    $fisier = "users.json";

    if (!file_exists($fisier)) {
        file_put_contents($fisier, json_encode([])); // Inițializează fișierul cu listă goală
    }

    $continut = file_get_contents($fisier);
    $utilizatori = json_decode($continut, true);

    // Verificare dacă utilizatorul există deja
    foreach ($utilizatori as $u) {
        if ($u["nume"] === $nume) {
            echo json_encode(["success" => false, "message" => "Utilizator deja existent."]);
            exit;
        }
    }

    $utilizatori[] = $user;
    file_put_contents($fisier, json_encode($utilizatori, JSON_PRETTY_PRINT));

    echo json_encode(["success" => true]);
    exit;
}
?>
