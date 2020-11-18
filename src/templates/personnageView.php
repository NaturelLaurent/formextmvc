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
            <p> Mon prénom : <?=$user->getPrenom()?></p>
            <p>email : <?=$user->getEmail()?></p>
        
            <button>
                <a href="/personnage/edit">Modifier</a>
            </button>
        </article>
        
    </body>
</html>