 <?php
    try {
    $pdo = new PDO("mysql:host=localhost;dbname=phppdo", "root", "");
    echo "Connection successful!";

    } catch (PDOException $e) {
        echo "Connection failed: " . $e->getMessage();
        die();
    }
    ?>