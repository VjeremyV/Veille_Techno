<?php
var_dump($params);

?>

<form action="" method="post">
    <div>
        <label for="pseudo">Pseudo</label>
        <input type="text" name="pseudo" id="pseudo">
    </div>

    <div>
        <label for="nom">Nom</label>
        <input type="text" name="nom" id="nom">
    </div>

    <div>
        <label for="prenom">Prenom</label>
        <input type="text" name="prenom" id="prenom">
    </div>

    <div>
        <label for="mail">Mail</label>
        <input type="email" name="mail" id="mail">
    </div>

    <div>
        <label for="pwd">Mot de passe</label>
        <input type="password" name="pwd" id="pwd">
    </div>

    <div>
        <label for="pwdConfirm">Confirmer le mot de passe</label>
        <input type="password" name="pwdConfirm" id="pwdConfirm">
    </div>

    <div>
        <input type="submit" value="Soumettre">
    </div>
</form>