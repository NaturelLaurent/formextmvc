<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <link rel="stylesheet" href='main.css'>
    </head>

    <body>
        <header>
            <h1 id="title">PHP_Vanilla_MVC</h1>
            <menu>
                <ul>
                    <li><a href="/">Accueil</a></li>
                    <li><a href="/personnage">Personnage</a></li>
                    <li><a href="/contact">Contact</a></li>
                </ul>
            </menu>
        </header>
        <article>
            <h2>Formulaire d'edition </h2>
            <form method="post" action="/personnage/edit">
                Prenom :<input type="text" name="prenom" value="<?=$user->getPrenom()?>">
                email :<input type="text" name="email" value="<?=$user->getEmail()?>">
                <input type="submit">
            </form>

            <?php if($_SERVER["REQUEST_METHOD"] == "POST"){
                echo "votre prenom : ".$prenom."<br>"."Votre email : ".$email;
            } ?>
        </article>
    </body>
</html>