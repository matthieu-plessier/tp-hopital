<h1>Liste & modification de rendez-vous</h1>

<?php
    if ($result != NULL) { ?>
        <p><strong>ID: </strong><?= $result->idPatients?><br>  
        <strong> Nom:</strong> <?= $result->lastname?><br>
        <strong> Prénom: </strong><?= $result->firstname ?><br>
        <strong> Tel: </strong><a href="tel:<?=$result->phone ?? '' ?>"><?=$result->phone ?? '' ?></a></p>
    <?php } ?>

<?php if (!$code) {

?>

<div class="container">
    <form action="<?= htmlspecialchars($_SERVER['PHP_SELF']).'?id='.$id;?>" method="post">
        <div class="row">
            <div class="col mb-3">
                <label for="date">Date</label>
                <input type="date"
                    min="<?=date('Y-m-d')?>" 
                    class="from-control" name="date" 
                    value="<?=htmlentities($arrayDateHour[0] ?? '') ?>" 
                    aria-label="date">
            </div>
            <div class="col">
                <label for="time">Heure</label>
                <?= ShowTimeSelect($timeArray) ?>
            </div>
        </div>
            <div class="col m-3">
                <button class="btn btn-primary" type="submit">Valider les modifications</button>
            </div>
        </div>
        
    </form>
</div>
<?php } else
        echo '<div class="alert'.' '.$messageCode[$code]['type'].' ">'.$messageCode[$code]['msg'].'</div>';
?>