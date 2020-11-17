<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <link rel="stylesheet" href='main.css'>
    </head>

    <body>
        <header>
            <h1 id="title">PHP_Vanilla_MVC</h1>
        </header>
        <h2>Formulaire d'edition </h2>
        <form action="<?=htmlspecialchars($_SERVER["PHP_SELF"]);?>">
        Prenom :<input type="text" name="prenom" value="<?=$user->getPrenom()?>">
        email :<input type="text" name="email" value="<?=$user->getEmail()?>">
        <button type="submit" name="submit" value="Submit">Valider</button>
        </form>

        
    </body>
</html>