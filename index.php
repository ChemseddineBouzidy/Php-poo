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
    <?php
    require_once 'Connextion.php';
    $sqlState = $pdo->query('SELECT * FROM stagiaires');

    // $stagiaires = $sqlState->fetchAll();  
    // $stagiaires = $sqlState->fetchAll(PDO::FETCH_ASSOC); echo $stagiaire['nom'];
    $stagiaires = $sqlState->fetchAll(PDO::FETCH_OBJ); //$stagiaire->id;
    

    echo "<pre>";
    print_r($stagiaires);
    echo "</pre>";


    ?>
    <div class="container">
        <h1 class="text-center">Liste des stagiaires</h1>
        <a href="ajouter.php" class="btn btn-primary mb-3 float-end">Ajouter un stagiaire</a>
    </div>
    <table class="table">
        <thead>
            <tr>
                <th scope="col">#</th>
                <th scope="col">Nom</th>
                <th scope="col">Prenom</th>
                <th scope="col">Age</th>
                <th scope="col">Action</th>

            </tr>
        </thead>
        <tbody>
            <tr>

                <?php
                foreach ($stagiaires as $stagiaire) {

                    ?>
                    <th scope="row"><?php echo $stagiaire->id; ?></th>
                    <td><?php echo $stagiaire->nom; ?></td>
                    <td><?php echo $stagiaire->prenom; ?></td>
                    <?php
                    // Determine the color based on age
                    if ($stagiaire->age <= 18) {
                        $color = 'success';
                    } else if ($stagiaire->age <= 25) {
                        $color = 'warning';
                    } else {
                        $color = 'danger';
                    }
                    ?>
                    <!-- #region <td class="text-center bg-<?php //$color = ($stagiaire->age <= 18) ? 'success' : 'warning'; echo $color; ?>"><?php echo $stagiaire->age; ?> ans</td> # -->
                    <td class="text-center bg-<?php echo $color; ?>"><?php echo $stagiaire->age; ?> ans</td>

                    <td>
                            <form action="delete.php" method="POST">
                                <input type="hidden" name="id" value="<?php echo $stagiaire->id; ?>">
                                <button type="submit" class="btn btn-danger btn-sm" name="delete">Delete</button>
                            </form>
                    </td>
                </tr>
            <?php } ?>
        </tbody>
    </table>
</body>

</html>
                    

