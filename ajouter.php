<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.7/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-LN+7fdVzj6u52u30Kp6M/trliBMCMKTyK833zpbD+pXdCLuTusPj697FH4R/5mcr" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.7/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-ndDqU0Gzau9qJ1lfW4pNLlhNTkCfHzAVBReH9diLvGRem5+R9g2FzA8ZGN954O5Q"
        crossorigin="anonymous"></script>
    <title>Document</title>
</head>

<body>
    <div class="container">

        <h1 class="text-center">Ajouter un stagiaire</h1>
        <form method="POST">
            <div class="mb-3">
                <label for="exampleInputEmail1" class="form-label">Nom</label>
                <input type="text" class="form-control" id="nom" name="nom">
            </div>
            <div class="mb-3">
                <label for="prenom" class="form-label">Prénom</label>
                <input type="text" class="form-control" id="prenom" name="prenom">
            </div>
            <div class="mb-3">
                <label for="age" class="form-label">Âge</label>
                <input type="number" class="form-control" id="age" name="age">
            </div>

            <button type="submit" class="btn btn-primary" name="ajouter">Submit</button>
        </form>
        <?php
        if (isset($_POST['ajouter'])) {
            require_once 'Connextion.php';
            echo "<p class='text-success'>Form submitted successfully!</p>";
            $nom = htmlspecialchars($_POST['nom']);
            $prenom = htmlspecialchars($_POST['prenom']);
            $age = htmlspecialchars($_POST['age']);
            if (empty($nom) || empty($prenom) || empty($age)) {
                echo "<p class='text-danger'>All fields are required!</p>";
                exit;
            } else {
                //More secure
                $stmt = $pdo->prepare("INSERT INTO stagiaires (nom, prenom, age) VALUES (:nom, :prenom, :age)");
                $stmt->bindParam(':nom', $nom);
                $stmt->bindParam(':prenom', $prenom);
                $stmt->bindParam(':age', $age);
                $stmt->execute();
                if ($stmt->rowCount() > 0) {
                    echo "<p class='text-success'>Stagiaire ajouté avec succès!</p>";
                } else {
                    echo "<p class='text-danger'>Erreur lors de l'ajout du stagiaire.</p>";
                }
                    

                //Unsafe (not secure):
                
                // $stmt = $pdo->prepare("INSERT INTO stagiaires VALUES (null, ?, ?, ?)");
                // $stmt->execute([$nom, $prenom, $age]);
                // if ($stmt->rowCount() > 0) {
                //     echo "<p class='text-success'>Stagiaire ajouté avec succès!</p>";
                // } else {
                //     echo "<p class='text-danger'>Erreur lors de l'ajout du stagiaire.</p>";
                // }
            }
        }


       
        ?>
    </div>
</body>

</html>