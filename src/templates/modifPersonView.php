<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">

</head>

<body>
    <div class="container">
        <ul>

            <li>
                <a href="/" class="btn btn-primary ">Accueil</a>
            </li>
            <li>

                <a href="/personnage" class="btn btn-primary ">Personnage</a>
            </li>
            <li>

                <a href="/modifierPersonnage" class="btn btn-primary ">Modifier personnage</a>
            </li>
            <li>

                <a href="/contact" class="btn btn-primary ">Contact</a>
            </li>
        </ul>
        <div class="container">

            <?php
           
           
                echo ' <h3>Modifier Personnage</h3><br>';
                echo '<form action="/modifierPersonnage" method="post">
                    <p>Votre nom : <input type="text" name="nom" /></p>
                    <p>Votre email : <input type="text" name="email" /></p>
                    <p><input type="submit" value="Modifier"></p>
                   </form> ';

                if (!empty($_POST["nom"])) {                   
                    echo '<h3>Personnage Modifier</h3><br>';
                    echo '<p>Prénom : ' . $_POST['nom'] . '</p>';
                    echo ' <p>Email  :' . $_POST['email'] . '</p>';
                }       
               

            ?>
        </div>
    </div><br>






</body>



</html>