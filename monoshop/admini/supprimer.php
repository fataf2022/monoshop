
<?php
session_start();


if (!isset($_SESSION['SKDJNF?FFJIGNF?K']) || !empty($_SESSION['SKDJNF?FFJIGNF?K'])) {
    header("Location: ../login.php");
    exit();  // Assurez-vous de terminer l'exécution du script après la redirection
}

// Reste du code ici, exécuté si la session est présente et non vide


require("../config/command.php");
$mesProduit=afficher();
?>



<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <script src="/docs/5.3/assets/js/color-modes.js"></script>

<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta name="description" content="">
<meta name="author" content="Mark Otto, Jacob Thornton, and Bootstrap contributors">
<meta name="generator" content="Hugo 0.118.2">
<title>Album example · Bootstrap v5.3</title>

<link rel="canonical" href="https://getbootstrap.com/docs/5.3/examples/album/">

<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet"
    integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"
    integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL"
    crossorigin="anonymous"></script>

<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/@docsearch/css@3">

<link href="/docs/5.3/dist/css/bootstrap.min.css" rel="stylesheet"
    integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">

<!-- Favicons -->
<link rel="apple-touch-icon" href="/docs/5.3/assets/img/favicons/apple-touch-icon.png" sizes="180x180">
<link rel="icon" href="/docs/5.3/assets/img/favicons/favicon-32x32.png" sizes="32x32" type="image/png">
<link rel="icon" href="/docs/5.3/assets/img/favicons/favicon-16x16.png" sizes="16x16" type="image/png">
<link rel="manifest" href="/docs/5.3/assets/img/favicons/manifest.json">
<link rel="mask-icon" href="/docs/5.3/assets/img/favicons/safari-pinned-tab.svg" color="#712cf9">
<link rel="icon" href="/docs/5.3/assets/img/favicons/favicon.ico">
<meta name="theme-color" content="#712cf9">
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js"
    integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r"
    crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.min.js"
    integrity="sha384-BBtl+eGJRgqQAUMxJ7pMwbEyER4l1g+O15P+16Ep7Q9Q+zqX6gSbd85u4mG4QzX+"
    crossorigin="anonymous"></script>

  <title>Document</title>
</head>
<body>
  
</body>
</html>



<form method="post">
  <div class="mb-3">
    <label for="exampleInputEmail1" class="form-label">produit a supprimer </label>
    <input type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp"style="width: 200px; heigth=30px"; name="id_produit"require>
  </div>
  
    <button type="submit" name="valider" class="btn btn-primary">suprimer</button>

</form>
 <div class="row row-cols-1 row-cols-sm-2 row-cols-md-3 g-3">
                  <?php foreach ($mesProduit as $produits) : ?>
                    <div class="col">
                        <div class="card shadow-sm">
                            
                            <img src="<?= $produits->image ?>"style="width: 50px; heigth=10px"; >
                                  <h2><?= $produits->id ?></h2>
                          
                            </div>
                        
                    </div>
                    
                   <?php endforeach; ?>
   </div>




<?PHP 
if(isset($_POST['valider'])){
    if(isset($_POST['id_produit'])){         
      if(!empty($_POST['id_produit']) AND is_numeric($_POST['id_produit'])){

        $idproduit=htmlspecialchars(strip_tags($_POST['id_produit']));
        try{   
                 //idproduit est un mot cle  de php
            supprimer($idproduit);
            echo "le produit a ete bien suprimé";
        } catch( Exception $e){
            echo "NON suprimer " .$e->getMessage();
        }
        
      }
    }

}

?>