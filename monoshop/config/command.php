<?PHP



function modify($nom, $image, $desri,$id) {
    require("connexion.php");

    try {
        $req = $conn->prepare("UPDATE  commande  SET nom=?, image=? ,description=? WHERE id=?");
        $req->execute(array($nom, $image, $desri,$id));
        $req->closeCursor();
        echo "modifer avec succes.";
    } catch(PDOException $e) {
        echo "Erreur SQL : " . $e->getMessage();
    }
}

function Getproduit($id){
    if (require("connexion.php")){
       // $req=$conn->prepare("SELECT* FROM produit ORDER BY id DESC ");
       $req = $conn->prepare("SELECT * FROM commande WHERE id=?");

        $req->execute(array($id));
        if($req->rowCount()==1) {
            $data=$req->fetchAll(PDO :: FETCH_OBJ);
         return$data;
        } 
    else{
        $req->closeCursor();
            return false;
            
         }
       

        
       
     }
 }



//function ajouter($nom, $image,$desri){
    // SI LA CONNEXION A ETE EFFECTUER
    //if (require("connexion.php")){
       // $req=$conn->prepare("INSERT INTO commande (nom, image,description) VALUES ('$nom', '$image','$desri')");
       // $req->execute(array($nom, $image,$desri));
       // $req->closeCursor();
       
   //// }
//}
 function getadmin($email,$motdepasse){
    require("connexion.php");
 
     $req=$conn->prepare("SELECT * FROM admin WHERE email=? && motdepasse=?");
     $req->execute(array($email,$motdepasse));
     if($req ->rowCount()==1){
        // AFFICHER TOUTS LES INFORMATIONS
        $data=$req->fetch();
       return $data;
     }
     $req->closeCursor();
  
 }

function ajouter($nom, $image, $desri) {
    require("connexion.php");

    try {
        $req = $conn->prepare("INSERT INTO commande (nom, image, description) VALUES (?, ?, ?)");
        $req->execute(array($nom, $image, $desri));
        $req->closeCursor();
        echo "Produit ajouté avec succès.";
    } catch(PDOException $e) {
        echo "Erreur SQL : " . $e->getMessage();
    }
}

function afficher(){
    if (require("connexion.php")){
       // $req=$conn->prepare("SELECT* FROM produit ORDER BY id DESC ");
       $req = $conn->prepare("SELECT * FROM commande ORDER BY id DESC");

        $req->execute();  
        $data=$req->fetchALL(PDO :: FETCH_OBJ);
       
        $req->closeCursor();

        return $data;
       
     }
 }
function supprimer($id){
    if (require("connexion.php")){
        $red=$conn->prepare("DELETE FROM commande WHERE id=?");
        $red->execute(array($id));
    }   
}


?>