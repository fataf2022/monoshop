<?php


















try {
    $conn = new PDO("mysql:host=localhost;dbname=monoshop;charset=utf8", "root", "");
    // Définir le mode d'erreur PDO comme l'exception
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    echo "Connected successfully";
} catch(PDOException $e) {
    echo "Connection failed: " . $e->getMessage();
}

?>
