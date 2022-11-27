<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="<?= $desc ?>">
    <?php
      if(count($css) > 0){
        foreach($css as $link){
            ?>
    <link rel="stylesheet" href="./../../assets/css/<?=$link?>">
            <?php
        }
    }
    ?>
    <title><?= $title ?></title>
</head>

<body>