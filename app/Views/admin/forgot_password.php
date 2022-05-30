<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="Public/admin/css/style.css">
    <title>Mot de passe oublié</title>
</head>

<body>
    <main id="password-forgot">
        
        <form action="indexAdmin.php?action=emailPost" method="POST">
        <h1>Mot de passe oublié ?</h1>
        <div class="container">
            <label for="email"><b>Email</b></label>
            <input type="email" placeholder="Entrez votre Email" name="email" required>
            <button class="btnChangePsw" type="submit">Envoi nouveau mot de passe</button>
        </div>
    </form>
    </main>
</body>

</html>