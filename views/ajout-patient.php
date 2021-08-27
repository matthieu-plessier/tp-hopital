
<h1>Ajouter un patient</h1>
<?php 
        if($code){
            echo '<div class="alert'.' '.$messageCode[$code]['type'].' ">'.$messageCode[$code]['msg'].'</div>';
        }
        ?>
<div class="container">
    <div class="row addUser">
        <div class="col-6 textAddUser"> Merci de renseigner tout les champs afin de valider votre saisie.</div>
        
        <div class="col-6 formAddUser">
            <form method="POST">
                <div class="mb-3">
                    <label for="inputSurname" class="form-label">Nom*</label>
                    <input type="text"
                            name="lastname"
                            id="lastname"
                            title="Veuillez entrer un nom sans chiffres"
                            placeholder="Entrez votre nom"
                            class="form-control <?=isset($error['lastname']) ? 'errorField' : ''?>" 
                            autocomplete="family-name"
                            value="<?=htmlentities($lastname ?? '') ?>"
                            minlength="2"
                            maxlength="70"
                            require
                            pattern="<?=REGEX_STR_NO_NUMBER?>"
                    >
                    <div class="error"><?=$error['lastname'] ?? ''?></div>

                </div>
                <div class="mb-3">
                    <label for="inputFirstname" class="form-label">Prénom*</label>
                    <input type="text" 
                            name="firstname"
                            id="firstname"
                            placeholder="Entrez votre prénom"
                            class="form-control  <?=isset($error['firstname']) ? 'errorField' : ''?>" 
                            value="<?=htmlentities($firstname ?? '') ?>"
                            autocomplete="given-name"
                            minlength="2"
                            maxlength="70"
                            pattern="<?=REGEX_STR_NO_NUMBER?>"
                    >

                    <div class="error"><?=$error['firstname'] ?? ''?></div>
                </div>

                <div class="mb-3">
                    <div class="mb-3">
                    <label for="exampleInputEmail1" class="form-label">Email</label>
                    <input type="email"
                            type="email" 
                            name="email"
                            value="<?=htmlentities($email ?? '') ?>"
                            class="form-control  <?=isset($error['email']) ? 'errorField' : ''?>" 
                            id="email" 
                            autocomplete="email"
                            pattern="<?=REGEX_EMAIL?>"
                            placeholder="name@example.com"
                    >
                    <div class="error"><?=$error['email'] ?? ''?></div>
                        
                        
                    </div>
                </div>
                <div class="mb-3">
                    <label for="phone" class="form-label">Téléphone</label>
                    <input type="tel"
                            name="phone"
                            value="<?=htmlentities($phone ?? '') ?>"
                            class="form-control  <?=isset($error['phone']) ? 'errorField' : ''?>" 
                            id="phone" 
                            autocomplete="tel"
                            pattern="<?=REGEX_PHONE_NUMBER?>"
                            placeholder="Votre numero de téléphone">
                    <div class="error"><?=$error['email'] ?? ''?></div>
                    
                </div>
                <div class="mb-3">
                    <label for="date" class="form-label">Date de naissance</label>
                    <input type="date" 
                            class="form-control" 
                            name="birthdate"
                            id="birthdate"
                            value="<?=htmlentities($birthdate ?? '') ?>"
                            title="La date de naissance n'est pas au bon format"
                            placeholder="Entrez votre date de naissance"
                            class="form-control <?=isset($error['birthdate']) ? 'errorField' : ''?>"
                            autocomplete="bday">
                    <div class="error"><?=$error['birthdate'] ?? ''?></div>
                            
                </div>

                <button type="submit" class="btn btn-primary">Valider</button>
            </form>
        </div>
    </div>
</div>

