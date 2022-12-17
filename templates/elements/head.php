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
    <link rel="stylesheet" href="<?= substr($link, 0, 4) != 'http' ? './../../assets/css/'.$link : $link ?>">
            <?php
        }
    }
    ?>
    <title><?= $title ?></title>

    <?php
      if(count($js) > 0){
        foreach($js as $ressource => $position){
            if($position === 'head'){
            ?>
            <script src="<?= substr($ressource, 0, 4) != 'http' ? './../../assets/js/'.$ressource : $ressource ?>"></script>
            <?php
            }
        }
    }
    ?>
</head>

<body>