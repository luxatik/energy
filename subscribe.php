<?php
// Vérifier si le formulaire a été soumis
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Récupérer l'adresse e-mail depuis le formulaire
    $email = $_POST["email"];

    // Vérifier si l'adresse e-mail est valide (vous pouvez ajouter plus de validations si nécessaire)
    if (filter_var($email, FILTER_VALIDATE_EMAIL)) {
        // Enregistrer l'adresse e-mail dans un fichier texte ou dans une base de données
        $file = 'subscribers.txt';
        // Ajouter l'adresse e-mail à la fin du fichier
        file_put_contents($file, $email . PHP_EOL, FILE_APPEND | LOCK_EX);

        // Envoyer l'adresse e-mail par e-mail
        $to = "votre@adressemail.com"; // Remplacez par votre adresse e-mail
        $subject = "Nouvel abonnement à la newsletter";
        $message = "Une nouvelle adresse e-mail a été ajoutée à la newsletter : " . $email;
        $headers = "From: webmaster@example.com"; // Remplacez par votre adresse e-mail
        
        // Envoyer l'e-mail
        mail($to, $subject, $message, $headers);

        // Afficher un message de confirmation
        echo "Merci pour votre abonnement à notre newsletter ! Un e-mail de confirmation vous a été envoyé.";
    } else {
        // Afficher un message d'erreur si l'adresse e-mail est invalide
        echo "L'adresse e-mail que vous avez saisie est invalide.";
    }
}
?>
