<?php

// Définition du fichier où enregistrer le statut
$statusFile = 'status.txt';

// Sauvegarde du statut sélectionné si le formulaire est soumis
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['status'])) {
    file_put_contents($statusFile, $_POST['status']);
}

// Lecture du statut actuel
$currentStatus = file_exists($statusFile) ? file_get_contents($statusFile) : '';

?>
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin - Changer le statut</title>
    <style>
        body { font-family: Arial, sans-serif; margin: 50px; }
        form { max-width: 300px; padding: 20px; border: 1px solid #ddd; border-radius: 5px; }
        select, button { width: 100%; padding: 10px; margin-top: 10px; }
    </style>
    <link rel="stylesheet" href="status.css">
</head>
<body>
<h2>Changer le statut</h2>
<form method="POST">
    <label for="status">Statut :</label>
    <select name="status" id="status">
        <option value="disponible" <?php echo $currentStatus === 'en ligne' ? 'selected' : ''; ?>>Disponible</option>
        <option value="en consultation" <?php echo $currentStatus === 'en consultation' ? 'selected' : ''; ?>>En consultation</option>
        <option value="indisponible" <?php echo $currentStatus === 'hors ligne' ? 'selected' : ''; ?>>Indisponible</option>
    </select>
    <button type="submit">Enregistrer</button>
</form>
<p>Statut actuel : <strong><?php echo htmlspecialchars($currentStatus); ?></strong></p>

<div>###status-displayer###</div>
<script src="status.js"></script>
</body>
</html>
