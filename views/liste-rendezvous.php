<h1>Liste des rendez-vous </h1>
<a class="btn btn-primary" href="/controllers/ajout-rendezvous_ctrl.php" role="button" id="addButton">Ajouter un patient</a>
<?= $error ?>
<div class="container ">
    <table class="table">
        <thead>
            <th scope="col">ID</th>
            <th scope="col">Date & Heure</th>
            <th scope="col">ID patients</th>
            <th scope="col">Nom</th>
            <th scope="col">Prénom</th>
            <th scope="col">téléphone</th>
        </thead>

        <tbody>
            <?php foreach($appointments as $rdv) : ?>
                <tr class="table-primary">
                    <td scope="row"><?=$appointments->id ?? '' ?></td>
                    <td><?=$appointments->id ?? '' ?></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                                    
                </tr>
            <?php endforeach; ?>

        </tbody>
    </table>
</div>