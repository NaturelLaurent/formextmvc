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
          

              
                    echo ' <h3> Contact : </h3><br>';
                    echo $user->getLogin();
                  


            ?>
        </div>
    </div><br>






</body>



</html>