<?php
if(isset($_POST['delete']))  {
    require_once 'Connextion.php';  
    $id = $_POST['id'];
    echo "<p class='text-success'>$id</p>";
    $sqlState = $pdo->prepare('DELETE FROM stagiaires WHERE id = :id');
    $sqlState->bindParam(':id', $id);
    var_dump($id);
    $sqlState->execute();
    header('Location: index.php');
    exit();
}