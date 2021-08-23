<h1>Profil du patient</h1>

<p>Pour modifier les informations du patient, veuillez remplacer les champs suivants puis valider.</p>
<?php
    if ($resultCheckPatient != NULL) { ?>
        <p><strong>ID:</strong><?= $resultCheckPatient->id?>  <strong> Nom:</strong><?= $resultCheckPatient->lastname?>  <strong> Prénom:</strong><?= $resultCheckPatient->firstname ?></p>
    <?php } ?>

<?php if (!$code) {

?>


<div class="container">
    <div class="row">
        <div class="col">
            <input type="text" class="form-control" value="<?= $resultCheckPatient->firstname?>" aria-label="firstname">
        </div>
        <div class="col">
            <input type="text" class="form-control" value="<?= $resultCheckPatient->lastname ?>" aria-label="lastname">
        </div>
    </div><br>
    <div class="row">
        <div class="col">
            <input type="mail" class="form-control" value="<?= $resultCheckPatient->mail ?>" aria-label="mail">
        </div>
        <div class="col">
            <input type="number" class="form-control" value="<?= $resultCheckPatient->phone ?>" aria-label="phone">
        </div>
    </div><br>
    <div class="row">
        <div class="col">
            <input type="date" class="from-control" value="<?= $resultCheckPatient->birthdate?>" aria-label="birthdate">
        </div>
        <div class="col">
            <button type="button" class="btn btn-outline-success">Valider les modifications</button>
        </div>
        <div class="col">
        <button type="button" class="btn btn-outline-danger">Annuler</button>
        </div>
    </div>
</div>
<?php } else
        echo '<div class="alert'.' '.$messageCode[$code]['type'].' ">'.$messageCode[$code]['msg'].'</div>';
?>