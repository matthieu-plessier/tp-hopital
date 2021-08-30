<h1>Liste des Patients</h1>

<a class="btn btn-primary" href="/controllers/ajout-patient_ctrl.php" role="button" id="addButton">Ajouter un patient</a>
<?= $error ?>
<div class="container">
<table class="table ">
    <thead>
        
            <th scope="col">ID</th>
            <th scope="col">Nom</th>
            <th scope="col">Prénom</th>
            <th scope="col">Email</th>
            <th scope="col">téléphone</th>
            <th scope="col">Date de naissance</th>
            <th scope="col">Profils</th>
            
        
    </thead>
    <tbody>
        
        <?php foreach($patients as $patient) : ?>

            <tr class="table-primary">
                <td scope="row"><?=$patient->id ?? '' ?></td>
                <td><?=$patient->lastname ?? '' ?></td>
                <td><?=$patient->firstname ?? '' ?></td>
                <td><a href="mailto:<?=$patient->mail ?? '' ?>"><?=$patient->mail ?? '' ?></a></td>
                <td><a href="tel:<?=$patient->phone ?? '' ?>"><?=$patient->phone ?? '' ?></a></td>
                <td><?=$patient->birthdate ?? '' ?></td>
                <td><a class="btn btn-primary" href="/controllers/profil-patient_ctrl.php?id=<?=$patient->id ?>">Voir Profil</button></td>
                <td></td>
            </tr>

        <?php endforeach; ?>

    </tbody>
</table>
</div>
