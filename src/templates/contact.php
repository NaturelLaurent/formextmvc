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
            <form method="post" action="/contact">
                email :<input type="email" name="email" value="">
                sujet :<input type="text" name="sujet" value="">
                message :<textarea rows="5" name="content" value=""></textarea>
                <input type="submit">
            </form>
        </article>
    </body>
</html>