<h1 class="m-3">Liste des Patients</h1>

<a class="btn btn-primary" href="/controllers/ajout-patient_ctrl.php" role="button" id="addButton">Ajouter un patient</a>
<label for="site-search">Search the site:</label>
<input type="search" id="site-search" name="q"
       aria-label="Search through site content">

<button>Search</button>
<?= $error ?>
<div class="container mt-3">
<table class="table ">
    <thead>
        
            <th scope="col">ID</th>
            <th scope="col">Nom</th>
            <th scope="col">Prénom</th>
            <th scope="col">Email</th>
            <th scope="col">téléphone</th>
            <th scope="col">Date de naissance</th>
            <th scope="col">Profils</th>
            <th scope="col">Supprimer</th>
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
                <td><a href="/controllers/delete-patient_ctrl.php?id=<?=$patient->id ?>"><img src="https://img.icons8.com/color/48/000000/delete-forever.png/"></a></td>
            </tr>
        <?php endforeach; ?>
    </tbody>
</table>
</div>
