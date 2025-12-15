<?php

// send-mail.php

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require __DIR__ . '/../../vendor/autoload.php';

$dotenv = Dotenv\Dotenv::createImmutable(__DIR__ . '/../../');
$dotenv->load();

header('Content-Type: application/json');

try {
    $mail = new PHPMailer(true);

    // SMTP Mailjet
    $mail->isSMTP();
    $mail->Host       = $_ENV['MAILJET_SMTP_HOST'];
    $mail->SMTPAuth   = true;
    $mail->Username   = $_ENV['MAILJET_SMTP_USER'];
    $mail->Password   = $_ENV['MAILJET_SMTP_PASS'];
    $mail->Port       = $_ENV['MAILJET_SMTP_PORT'];
    $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;
    $mail->CharSet    = 'UTF-8';

    // Expéditeur / Destinataire
    $mail->setFrom($_ENV['MAILJET_FROM_EMAIL'], 'Formulaire Devis');
    $mail->addAddress($_ENV['MAILJET_FROM_EMAIL']);

    // Données du formulaire (à adapter si tu ajoutes les name="")
    $prenom  = $_POST['prenom']  ?? '';
    $nom     = $_POST['nom']     ?? '';
    $email   = $_POST['email']   ?? '';
    $tel     = $_POST['tel']     ?? '';
    $message = $_POST['message'] ?? '';

    // Sujet & contenu
    $mail->Subject = 'Nouvelle demande de devis';

    $mail->isHTML(true);
    $mail->Body = "
        <h2>Nouvelle demande de devis</h2>
        <p><strong>Nom :</strong> {$prenom} {$nom}</p>
        <p><strong>Email :</strong> {$email}</p>
        <p><strong>Téléphone :</strong> {$tel}</p>
        <p><strong>Message :</strong><br>{$message}</p>
    ";

    // 📎 Pièces jointes
    if (!empty($_FILES['files']['name'][0])) {

        $allowedExtensions = ['jpg', 'jpeg', 'png', 'pdf', 'doc', 'docx'];
        $maxFileSize = 5 * 1024 * 1024; // 5 Mo

        foreach ($_FILES['files']['tmp_name'] as $key => $tmpName) {

            $fileName = $_FILES['files']['name'][$key];
            $fileSize = $_FILES['files']['size'][$key];
            $extension = strtolower(pathinfo($fileName, PATHINFO_EXTENSION));

            if (!in_array($extension, $allowedExtensions)) {
                throw new Exception('Format de fichier non autorisé');
            }

            if ($fileSize > $maxFileSize) {
                throw new Exception('Fichier trop volumineux (5 Mo max)');
            }

            $mail->addAttachment($tmpName, $fileName);
        }
    }

    $mail->send();

    echo json_encode([
        'success' => true
    ]);

} catch (Exception $e) {
    echo json_encode([
        'success' => false,
        'message' => $e->getMessage()
    ]);
}
