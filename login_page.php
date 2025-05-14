<!DOCTYPE html>
<html lang="ro">
<head>
    <meta charset="UTF-8">
    <title>Autentificare</title>
    <link rel="stylesheet" href="css/auth.css">
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="Scripts/login.js" defer></script>
</head>
<body>
    <div class="form-container">
        <form id="login-form">
            <h2>Autentificare</h2>
            <input type="text" name="nume" placeholder="Nume utilizator" required>
            <input type="password" name="parola" placeholder="Parolă" required>
            <input type="submit" value="Loghează-te">
            <div id="mesaj-eroare" style="color:red; margin-top:10px;"></div>
        </form>
    </div>
</body>
</html>
