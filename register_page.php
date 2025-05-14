<!DOCTYPE html>
<html lang="ro">
<head>
    <meta charset="UTF-8">
    <title>Înregistrare</title>
    <link rel="stylesheet" href="css/auth.css">
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="Scripts/register.js" defer></script>
</head>
<body>
    <div class="form-container">
        <form id="register-form">
            <h2>Înregistrare</h2>
            <input type="text" name="nume" placeholder="Nume utilizator" required>
            <input type="password" name="parola" placeholder="Parolă" required>
            <input type="submit" value="Înregistrează-te">
            <div id="mesaj-eroare" style="color:red; margin-top:10px;"></div>
        </form>
    </div>
</body>
</html>
