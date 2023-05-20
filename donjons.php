<?php

    require_once('functions.php');

    if (!isset($_SESSION['user'])) {
        header('Location: login.php');
    }

    if (!isset($_SESSION['perso'])) {
        header('Location: persos.php');
    }

    $bdd = connect();

    $sql = "SELECT * FROM donjons";

    $sth = $bdd->prepare($sql);
        
    $sth->execute();

    $donjons = $sth->fetchAll();
?>

<?php require_once('_header.php'); ?>
    <!--<div class="container">
        <//?php echo $_SESSION['perso']['name']; ?> (<a href="persos.php">Changer</a>)
        <ul>
            <//?php foreach($donjons as $donjon) { ?>
                <li>
                    <a href="donjon_play.php?id=<//?php echo $donjon['id']; ?>">
                    <//?php echo $donjon['name']; ?>
                    </a>
                </li>
            <//?php } ?>
        </ul> 
    </div>-->


      
    <div class="donjon-choice-element1">
        <?php echo $_SESSION['perso']['name']; ?>    
        <a class="btn btn-grey" href="persos.php">Changer</a>
    </div>    

    <div class="donjon-choice-title">
        <h1>Choisissez un donjon !</h1>
    </div>

    <div class="donjon-choice-element2">
        <?php foreach($donjons as $donjon){ ?>
            <a href="donjon_play.php?id=<//?php echo $donjon['id']; ?>">
            <?php echo $donjon['name']; ?>
            <img src="" alt="">
            </a>
        <?php } ?>
    </div>


        



    
</body>
</html>