<!DOCTYPE html>
<html lang="nl">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Contact Bijwerken</title>
    <style>
    body {
        background-color: lightblue;
    }
    </style>
</head>
<body>
    <h1>Contact Bijwerken</h1>
    <form action="UpdateContactController.php" method="post">
        <label for="contact_id">Contact ID:</label>
        <input type="text" id="contact_id" name="contact_id" required><br><br>
        <input type="submit" value="Bijwerken">
    </form>
</body>
</html>