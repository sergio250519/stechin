<?php
$nom = $_POST['Nom complet'];
$email = $_POST['Email'];
$téléphone = $_POST['Téléphone'];
$servicedemandé = $_POST[ 'Service demandé' ];
$message = $_POST['message'];
// Protection contre les injections
$nom = htmlspecialchars($nom);
$email = htmlspecialchars($email);
$téléphone = htmlspecialchars($téléphone);
$servicedemandé = htmlspecialchars($servicedemandé);
$message = htmlspecialchars($message);
// Votre adresse email (À CHANGER)
$votre_email = "stechinfo25@gmail.com"; // <-- METTEZ VOTRE EMAIL ICI
// Construction de l'email
$to = $votre_email;
$subject = "Nouveau message: " . $servicedemandé;
$body = "Vous avez reçu un nouveau message depuis votre site web:\n\n";
$body .= "Nom complet: " . $nom . "\n";
$body .= "Email: " . $email . "\n";
$body .= "Téléphone: " . $téléphone . "\n";
$body .= "Service demandé: " . $servicedemandé . "\n\n";
$body .= "Message:\n" . $message . "\n";
$body .= "\n---\nCet email a été envoyé depuis votre formulaire de contact.";

$headers = "From: " . $nom . " <" . $email . ">\r\n";
$headers .= "Reply-To: " . $email . "\r\n";

// Envoi de l'email
if(mail($to, $subject, $body, $headers)) {
    // Redirection vers la page de remerciement
    header('Location: merci.html');
} else {
    echo "Erreur lors de l'envoi du message. Veuillez réessayer.";
}
?>