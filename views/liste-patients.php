<h1 class="m-3">Liste des Patients</h1>

<a class="btn btn-primary" href="/controllers/ajout-patient_ctrl.php" role="button" id="addButton">Ajouter un patient</a>


<div class="container mt-3">
        <form action="/controllers/search-patient_ctrl.php" method="GET" class="d-flex m-3 justify-content-center">
            <input class="form-control me-2 w-25" type="search" placeholder="Nom du patient" aria-label="Search" name="lastname">
            <button class="btn btn-outline-success" type="submit">Rechercher</button>
        </form>
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
        
            <?php 
            
            foreach($patients as $patient) : ?>
                <tr class="table-primary align-middle">
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
            
            <?=$messerror ? $messerror['msg'].' pour '.$lastname : null; ?>
    </div>
