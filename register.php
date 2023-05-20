<?php

    require_once('functions.php');

    if (isset($_POST["send"])) {
        $bdd = connect();

        $sql = "INSERT INTO users (`email`, `password`) VALUES (:email, :password);";
        $sth = $bdd->prepare($sql);
        $sth->execute([
            'email'     => $_POST['email'],
            'password'  => password_hash($_POST['password'], PASSWORD_DEFAULT)
        ]);

        header('Location: login.php');
    }
?>
<?php require_once('_header.php'); ?>

    <form class="register-form" action="" method="post" >
        <div class="register-form-element1">
            <h1>Création de votre compte</h1>   
        </div>
        
        <div class="register-form-element2">
            <label for="email">Email :</label>

            <input 
                type="email" 
                placeholder="Entrez votre email" 
                name="email" 
                id="email" 
            />
        </div>

        <div class="register-form-element3">
            <label for="password">Mot de passe :</label>

            <input 
                type="password" 
                placeholder="Entrez votre mot de passe" 
                name="password" 
                id="password" 
            />
        </div>
        <div class="register-form-element4">
            <input type="submit" name="send" value="Créer" />
        </div>
    </form>
</body>
</html>

