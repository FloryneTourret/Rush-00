<?php

session_start();
if (isset($_SESSION['email']))
{
    header('Location: index.php');
}

include('configs/database.php');
include('models/register_model.php');

include('views/base/header_connexion.php');

include('views/register_view.php');

if(isset($_POST['firstname']) && isset($_POST['lastname']) && isset($_POST['email']) && isset($_POST['password']) && isset($_POST['password_repeat']))
{
    if($_POST['password'] != $_POST['password_repeat'])
    {
        echo '<div class="text-center"><p>Les mots de passe ne correspondent pas.</p></div>';
    }
    else
    {

    	
        // Ma clé privée
        $secret = "6LeUtpwUAAAAAFSgwDpQWdxHeZ-HgWnpBb0Gm78T";
        // Paramètre renvoyé par le recaptcha
        $response = $_POST['g-recaptcha-response'];
        // On récupère l'IP de l'utilisateur
        $remoteip = $_SERVER['REMOTE_ADDR'];

        $api_url = "https://www.google.com/recaptcha/api/siteverify?secret=" 
        . $secret
        . "&response=" . $response
        . "&remoteip=" . $remoteip ;

	    $decode = json_decode(file_get_contents($api_url), true);

        if ($decode['success'] == true) {
            $firstname = ucfirst(htmlspecialchars(addslashes($_POST['firstname'])));
            $lastname = strtoupper(htmlspecialchars(addslashes($_POST['lastname'])));
            $email = strtolower(htmlspecialchars(addslashes($_POST['email'])));
            $password_hash = password_hash(htmlspecialchars(addslashes($_POST['password'])), PASSWORD_DEFAULT);
            if (email_exist($mysqli, $email) == FALSE)
            {
                register_user($mysqli, $firstname, $lastname, $email, $password_hash);
                header('Location: login.php');
            }
            else
                echo '<div class="text-center"><p>Cet email est déjà utilisé.</p></div>';  
        }
        else {
            echo '<div class="text-center"><p>Captcha invalide</p></div>';  
        } 
    }
}

include('views/base/footer.php');
?>