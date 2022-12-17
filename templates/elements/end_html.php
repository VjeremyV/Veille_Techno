 <?php
    if (count($js) > 0) {
        foreach ($js as $ressource => $position) { 
            if($position ==='footer'){?>
        <script src=
        <?= substr($ressource, 0, 4) != 'http' ? './../../assets/js/'.$ressource : $ressource ?>></script>
        <?php
        }
    }
    }
    ?>
 </body>

 </html>