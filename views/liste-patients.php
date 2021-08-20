<h1>Liste des Patients</h1>
<a class="btn btn-primary" href="/controllers/ajout-patient_ctrl.php" role="button" id="addButton">Ajouter un patient</a>
<?= $error ?>
<table class="table ">
    <thead>
        
            <th scope="col">ID</th>
            <th scope="col">Nom</th>
            <th scope="col">Prénom</th>
            <th scope="col">Email</th>
            <th scope="col">téléphone</th>
            <th scope="col">Date de naissance</th>
        
    </thead>
    <tbody>
        
        <?php foreach($patients as $i) : ?>

            <tr class="table-primary">
                <td scope="row"><?=$i["id"] ?? '' ?></td>
                <td><?=$i["lastname"] ?? '' ?></td>
                <td><?=$i["firstname"]?? '' ?></td>
                <td><?=$i["mail"]?? '' ?></td>
                <td><?=$i["phone"]?? '' ?></td>
                <td><?=$i["birthdate"]?? '' ?></td>
            </tr>

        <?php endforeach; ?>

    </tbody>
</table>

    