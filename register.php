<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $nume = $_POST["nume"];
    $parola = password_hash($_POST["parola"], PASSWORD_DEFAULT);

    $user = [
        "nume" => $nume,
        "parola" => $parola
    ];

    $fisier = "users.json";

    if (!file_exists($fisier)) {
        file_put_contents($fisier, json_encode([])); // fișier gol JSON valid
    }

    $continut = file_get_contents($fisier);
    $utilizatori = json_decode($continut, true);

    // Verificare dacă utilizatorul există deja
    foreach ($utilizatori as $u) {
        if ($u["nume"] === $nume) {
            echo "Utilizator deja existent.";
            exit;
        }
    }

    $utilizatori[] = $user;
    file_put_contents($fisier, json_encode($utilizatori, JSON_PRETTY_PRINT));

    header("Location: index.php");
    exit;
}
?>
<link rel="stylesheet" href="css/auth.css">
<div class="form-container">
    <form method="POST" action="register.php">
        <h2>Înregistrare</h2>
        <input type="text" name="nume" placeholder="Nume utilizator" required>
        <input type="password" name="parola" placeholder="Parolă" required>
        <input type="submit" value="Înregistrează-te">
    </form>
</div>
