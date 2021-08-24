<h1>Profil du patient</h1>

<p>Pour modifier les informations du patient, veuillez remplacer les champs suivants puis valider.</p>
<?php
    if ($resultCheckPatient != NULL) { ?>
        <p><strong>ID:</strong><?= $resultCheckPatient->id?>  <strong> Nom:</strong><?= $resultCheckPatient->lastname?>  <strong> Prénom:</strong><?= $resultCheckPatient->firstname ?></p>
    <?php } ?>

<?php if (!$code) {

?>


<div class="container">
    <form action="<?= htmlspecialchars($_SERVER['PHP_SELF']).'?id='.$id;?>" method="post">
        <div class="row">
            <div class="col">
                <label for="firstname">Prénom</label>
                <input type="text" class="form-control" name="firstname" value="<?= $resultCheckPatient->firstname?>" aria-label="firstname">
            </div>
            <div class="col">
                <label for="lastname">Nom</label>
                <input type="text" class="form-control" name="lastname" value="<?= $resultCheckPatient->lastname ?>" aria-label="lastname">
            </div>
        </div><br>
        <div class="row">
            <div class="col">
                <label for="mail">Mail</label>
                <input type="mail" class="form-control" name="mail" value="<?= $resultCheckPatient->mail ?>" aria-label="mail">
            </div>
            <div class="col">
                <label for="phone">Téléphone</label>
                <input type="phone" class="form-control" name="phone" value="<?= $resultCheckPatient->phone ?>" aria-label="phone">
            </div>
        </div><br>
        <div class="row">
            <div class="col">
                <label for="date">Date de naissance</label>
                <input type="date" class="from-control" name="birthdate" value="<?= $resultCheckPatient->birthdate?>" aria-label="birthdate">
            </div>
            <div class="col">
                <button class="btn btn-primary" type="submit">Valider les modifications</button>
            </div>
        </div>
    </form>
</div>
<?php } else
        echo '<div class="alert'.' '.$messageCode[$code]['type'].' ">'.$messageCode[$code]['msg'].'</div>';
?>