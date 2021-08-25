<h1>Ajout de rendez-vous patient</h1>

<div class="container">
    <div class="row">
        <div class="col">
            <select class="form-select w-25" aria-label="Default select example">
                <option selected>choisir le patient</option>
                <?php foreach ($patient as $user) {?>
                <option value="<?= $user->id ?>"><?= $user->id.' '.$user->firstname.' '.$user->lastname ?></option>
                <?php }?>
            </select>
        </div>
    </div>
    <div class="row">
        <div class="col">
            <label for="date">Date</label>
            <input type="date" class="from-control" name="date" value="" aria-label="date">
            <label for="time">Date</label>
            <input type="time" class="from-control" name="time" value="" aria-label="date">
        </div>
    </div>
    <div class="row">
        <div class="col">
            <button class="btn btn-primary" type="submit">Ajouter le rendez-vous</button>
        </div>
    </div>
</div>