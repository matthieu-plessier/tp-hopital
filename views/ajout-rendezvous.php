<h1>Ajout de rendez-vous patient</h1>
<?php
    if (!empty($codeArray)) {
        foreach ($codeArray as $code) {
            echo '<div class="alert'.' '.$messageCode[$code]['type'].' ">'.$messageCode[$code]['msg'].'</div>';
        }
    }
?>
<div class="container">
    <form action="<?=htmlspecialchars($_SERVER['PHP_SELF'])?>" method="POST">
    <div class="row">
        <div class="col d-flex justify-content-center mb-3">
            <select class="form-select w-25 " name= "idPatients" aria-label="Default select example">
                <option selected>choisir le patient</option>
                <?php foreach ($patient as $user) {?>
                <option value="<?= $user->id ?>"><?= $user->id.' '.$user->firstname.' '.$user->lastname ?></option>
                <?php }?>
            </select>
        </div>
    </div>
    
    <div class="row">
        <div class="col mb-3">
            <label for="date">Date</label>
            <input type="date"
                min="<?=date('Y-m-d')?>" 
                class="from-control" name="date" 
                value="<?=htmlentities($date ?? '') ?>" 
                aria-label="date">

            <label for="time">Heure</label>
            <input type="time" 
                min="08:00" 
                max="18:00" 
                step="300" 
                class="from-control" 
                name="hour" 
                value="<?=htmlentities($hour ?? '') ?>" 
                aria-label="hour">
        </div>
    </div>
    
    <div class="row">
        <div class="col mb-3">
            <button class="btn btn-primary" type="submit">Ajouter le rendez-vous</button>
        </div>
    </div>
    </form>
</div>