<?php

// connexion DB en local
try{
  $bdd = new PDO('mysql:host=localhost;dbname=esi-crouwatie1','root','');
$bdd->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
//

$nom=$_POST['nom'];
$email=$_POST['email'];
$sujet=$_POST['sujet'];
$com=$_POST['com'];

if ((isset($nom) AND isset($email) AND isset($sujet) AND isset ($com)) AND (!empty($nom) AND !empty($email) AND !empty($sujet) AND !empty($com) )){


  $sql='INSERT INTO `contact` (`id_contact`, `nom_conact`, `email_contact`, `sujet_contact`, `message_contact`, `date`) VALUES(Null,:nom, :email, :sujet, :com,Now())';
  $req = $bdd->prepare($sql);
  
  $req->execute(array(
    ':nom' => $nom,
    ':email' => $email,
    ':sujet' => $sujet,
    ':com' => $com
    ));

echo'Votre message a été envoyé,Je vous remercie!';
}else{
  echo 'Assurez Vous de bien remplir les champs ,Je vous remercie';

}

}catch(PDOException $e){
  die('Erreur : '.$e->getMessage());
}
?>
