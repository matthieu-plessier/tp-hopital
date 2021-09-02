<h1 class="m-3">Liste des rendez-vous </h1>
<a class="btn btn-primary m-3" href="/controllers/ajout-rendezvous_ctrl.php" role="button" id="addButton">Ajouter un Rendez-vous</a>
<?= $error ?>
<?php 
    if($code){
        echo '<div class="alert'.' '.$messageCode[$code]['type'].' ">'.$messageCode[$code]['msg'].'</div>';
    }
?>
<div class="container ">
    <table class="table m-3">
        <thead>
            <th scope="col">ID</th>
            <th scope="col">Date & heure</th>
            <th scope="col">ID patients</th>
            <th scope="col">Nom</th>
            <th scope="col">Prénom</th>
            <th scope="col">téléphone</th>
            <th scope="col">Rendez-vous</th>
            <th scope="col">Supprimer</th>
            
        </thead>

        <tbody>
            
            <?php foreach($appointments as $rdv) : ?>
                <tr class="table-primary align-middle">
                    <td scope="row"><?=$rdv->id ?? '' ?></td>
                    <td><?=$rdv-> dateHour ?? '' ?></td>
                    <td><?=$rdv-> idPatients ?? '' ?></td>
                    <td><?=$rdv-> lastname ?? '' ?></td>
                    <td><?=$rdv-> firstname ?? '' ?></td>
                    <td><a href="tel:<?=$rdv->phone ?? '' ?>"><?=$rdv->phone ?? '' ?></a></td>
                    <td><a class="btn btn-primary" href="/controllers/rendezvous_ctrl.php?id=<?=$rdv->id ?>">Voir Rendez-vous</button></td>
                    <td><a href="/controllers/liste-rendezvous_ctrl.php?remove=<?=$rdv->id ?>"><img src="https://img.icons8.com/color/48/000000/delete-forever.png/"></a></td>
                </tr>

            <?php endforeach; ?>
            
        </tbody>
    </table>
</div>