<?php
session_start();

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $nume = $_POST["nume"];
    $parola = $_POST["parola"];

    $fisier = "users.json";

    if (!file_exists($fisier)) {
        die("Nu există utilizatori înregistrați.");
    }

    $continut = file_get_contents($fisier);
    $utilizatori = json_decode($continut, true);

    foreach ($utilizatori as $u) {
        if ($u["nume"] === $nume && password_verify($parola, $u["parola"])) {
            // Autentificare reușită
            $_SESSION["user"] = $u["nume"];
            header("Location: index.php"); // Trimite către pagina principală
            exit;
        }
    }

    // Dacă nu s-a găsit utilizatorul sau parola e greșită
    echo "Nume sau parolă incorectă.";
}
?>

<link rel="stylesheet" href="css/auth.css">
<div class="form-container">
    <form method="POST" action="login.php">
        <h2>Autentificare</h2>
        <input type="text" name="nume" placeholder="Nume utilizator" required>
        <input type="password" name="parola" placeholder="Parolă" required>
        <input type="submit" value="Loghează-te">
    </form>
</div>
