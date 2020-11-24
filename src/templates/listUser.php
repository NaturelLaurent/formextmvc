<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">

</head>

<body>


    <?php require "accueilView.php"; ?>

  
<div class="col-md-8">
<table class="table table-hover table-dark">
  <thead>
    <tr>
      
      <th scope="col">Nom</th>
      <th scope="col">Prenom</th>
      <th scope="col">Email</th>
      <th scope="col">Lien de suppression</th>
      <th scope="col">Lien de modification</th>
    </tr>
  </thead>
  <tbody>
    <?php

      foreach ( $listUser as $user) {
       echo 
       '<tr>   
          <td>'.$user->nom.'</td>
          <td>'.$user->prenom.'</td>
          <td>'.$user->email.'</td>
          <td><a href="/userSup?id='.$user->id.'" class="list-group-item list-group-item-action list-group-item-primary">Supprimer</a></td>
          <td><a href="/userModif?id='.$user->id.'" class="list-group-item list-group-item-action list-group-item-primary">Modifier</a></td>
       </tr>';
  
      }

    ?>
    
  
    
  </tbody>
</table>
</body>



</html>