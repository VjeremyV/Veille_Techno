<?php
// var_dump($params);

?>

<form action="" method="post">
    <div>
        <label for="pseudo">Pseudo</label>
        <input type="text" name="pseudo" id="pseudo">
        <?php if (isset($params['pseudo error'])) : ?>
            <div>
                <?= $params['pseudo error'] ?>
            </div>
        <?php endif ?>
    </div>

    <div>
        <label for="nom">Nom</label>
        <input type="text" name="nom" id="nom">
        <?php if (isset($params['nom error'])) : ?>
            <div>
                <?= $params['nom error'] ?>
            </div>
        <?php endif ?>
    </div>

    <div>
        <label for="prenom">Prenom</label>
        <input type="text" name="prenom" id="prenom">
        <?php if (isset($params['prenom error'])) : ?>
            <div>
                <?= $params['prenom error'] ?>
            </div>
        <?php endif ?>
    </div>

    <div>
        <label for="mail">Mail</label>
        <input type="email" name="mail" id="mail">
        <?php if (isset($params['mail error'])) : ?>
            <div>
                <?= $params['mail error'] ?>
            </div>
        <?php endif ?>
    </div>

    <div>
        <label for="pwd">Mot de passe</label>
        <input type="password" name="pwd" id="pwd">
        <?php if (isset($params['pwd error'])) : ?>
            <div>
                <?= $params['pwd error'] ?>
            </div>
        <?php endif ?>
    </div>

    <div>
        <label for="pwdConfirm">Confirmer le mot de passe</label>
        <input type="password" name="pwdConfirm" id="pwdConfirm">
        <?php if (isset($params['pwd error'])) : ?>
            <div>
                <?= $params['pwd error'] ?>
            </div>
        <?php endif ?>

    </div>

    <div>
        <input type="submit" value="Soumettre">
    </div>
</form>

<div>
    <?php if (isset($params['inscription']) && $params['inscription'] === 'ok') : ?>
        Vous êtes désormais inscrit !
    <?php elseif (isset($params['inscription']) && $params['inscription'] === 'pb bdd') : ?>
        Une erreur est survenue sur nos serveur, veuillez réessayer ultérieurement.
    <?php endif ?>
</div>

<form action="" method="post">

<div>
    <label for="pseudo_connection">Pseudo</label>
    <input type="text" name="pseudo_connection" id="pseudo_connection">
    <?php if (isset($params['pseudo_connection error'])) : ?>
            <div>
                <?= $params['pseudo_connection error'] ?>
            </div>
        <?php endif ?>
</div>
<div>
    <label for="pwd_connection">Mot de passe</label>
    <input type="password" name="pwd_connection" id="pwd_connection">
    <?php if (isset($params['pwd_connection error'])) : ?>
            <div>
                <?= $params['pwd_connection error'] ?>
            </div>
        <?php endif ?>
</div>
    <div>
        <input type="submit" value="Se connecter">
    </div>
</form>

<div>
    <?php if (isset($params['connexion']) && $params['connexion'] === 'fail_pseudo') : ?>
        Le pseudo n'existe pas
    <?php elseif (isset($params['connexion']) && $params['connexion'] === 'fail_mdp') :?>   
        Le mot de passe est erroné 
    <?php endif ?>
</div>