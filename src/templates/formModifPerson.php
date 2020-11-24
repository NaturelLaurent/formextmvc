<!DOCTYPE html>
<html>


<head>
    <meta charset="utf-8">
    <!-- CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">

    <!-- jQuery and JS bundle w/ Popper.js -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ho+j7jyWK8fNQe+A12Hb8AhRq26LrZ/JpcUGGOn+Y7RsweNrtN/tE3MoK7ZeZDyx" crossorigin="anonymous"></script>
</head>

<body>

    <?php require "accueilView.php"; ?>

 
<div class="col-md-8">
    
    <?php

    echo ' <h3>Formulaire de creation personne</h3><br>';
    echo '<form action="/userModif?id='.$userCourant->id.'" method="post">
    <div class="form-row">
      <div class="col-md-4 mb-3">
        <label for="validationDefault01">Nom</label>
        <input type="text" class="form-control"name ="nom" id="validationDefault01" placeholder="Nom"  required value = '.$userCourant->nom .'>
      </div>
      <div class="col-md-4 mb-3">
        <label for="validationDefault02">Prenom</label>
        <input type="text" class="form-control" name ="prenom" id="validationDefault02" placeholder="Prenom"  required value = '.$userCourant->prenom .'>
      </div>
      <div class="col-md-4 mb-3">
        <label for="validationDefaultUsername">Email</label>
        <div class="input-group">
          <div class="input-group-prepend">
            <span class="input-group-text" id="inputGroupPrepend2">@</span>
          </div>
          <input type="text" class="form-control" name ="email" id="validationDefaultUsername" placeholder="Email" aria-describedby="inputGroupPrepend2" required value = '.$userCourant->email .'>
        </div>
      </div>
    </div>  
    
    <button class="btn btn-primary" type="submit">Modifier utilisateur</button>
  </form> ';
  
    ?>
</div>
</div>

   
</body>

</html>