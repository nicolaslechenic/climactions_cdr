<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Connexion</title>
</head>
<body>
   <form id="form_admin" action="indexAdmin.php?action=connexion" method="post">

        <div>
            <label for="email"> email:</label>
            <input type="text" name="email" id="email" placeholder="Votre email" require>
        </div>

        <div>
            <label for="password"> Mot de Passe:</label>
            <input type="password" name="password" id="password" placeholder="Votre mot de passe" require>
        </div>
        <button type="submit">Connexion</button>
    </form>
</body>
</html>

