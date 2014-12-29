<?php
require_once('../../../../wp-blog-header.php');

$email = '';
$contact = 'contact@batir-cote-sud.fr';
if (!empty($_POST['email'])) {
    $email = $_POST['email'];
    if (filter_var($email, FILTER_VALIDATE_EMAIL)) {
        if (wp_mail($contact, 'Une personne souhaite prendre contact avec vous.', 'Mail de la personne : ' . $email)) {
            echo 'Votre adresse email '.$email.' nous a bien été transmise, nous vous recontacterons dès que possible.';
        } else {
            echo 'Une erreur s\'est produite lors de l\'envoi de votre mail. Veuillez réessayer plus tard ou nous contacter par téléphone au 04.66.23.12.92 ou au 07.81.91.78.87.';
        }
    } else {
        echo 'Votre adresse email n\'est pas correcte : '.$email;
    }
}