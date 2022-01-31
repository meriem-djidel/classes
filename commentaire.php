<?php
session_start();
include('connect.php');
include('header.php');
?>
<?php

    if (isset($_SESSION['login']) == TRUE) { 

       echo ' <header>
        <label><button><a href="index.php">Accueil</a></button></label>
        <label><button><a href="profil.php">Ton profil</a></button></label>
        <label><button><a href="livre-or.php">l\'ivre d\'or</a></button></label>
        <label><button><a href="deconnexion.php">Déconnexion</a></button></label></header>';
         } else {
      echo '  <header>
      <label><button><a href="index.php">Accueil</a></button></label>
        <label><button><a href="inscription.php">Inscrit-toi</a></button></label>
        <label><button><a href="connexion.php">Connecte-toi</a></button></label></header>';
  }
    

    // on verifie si les champs sont  remplie et s'il existe
if (isset($_POST['submit'])) {
    //VARIABLES 
    $commentaire = $_POST['commentaire'];
    $id_utilisateur = $_SESSION['id']; 
    $date =date("Y-m-d H:i:s");
    //TEST si password = paswword comfirm
        $requete = $pdo->prepare("INSERT INTO commentaires (commentaire, id_utilisateur, date) VALUES (?,?,?)");
        $requete->execute(array($commentaire,$id_utilisateur,$date));

        }
       

    ?>

     
  
    <h1>Envoyer un commentaire</h1>

    <div class="formu">
    <form method="post">
        <table>
            <tr>
                <td> <textarea name="commentaire"cols="45" rows="5" placeholder=" Entrer votre commentaire"></textarea></td>
            </tr>
        </table>
        <button name="submit">Envoyer</button>
    </form>
</div>       
    <footer>
        <h1>Footer</h1>
    </footer>
</body>

</html>