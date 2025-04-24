<!DOCTYPE html>
<html lang="nl">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Contactgegevens Toevoegen</title>
    <style>
        body {
            background-color: lightblue;
        }
        input(submit) {
            background-color: #007BFF;
            color: white;
            padding: 12px 24px;
            border: none;
            border-radius: 8px;
            cursor: pointer;
            font-size: 16px;
        }
    </style>
</head>
<body>
    <h1>Contactgegevens Toevoegen</h1>
    <form action="CreateContactModel.php" method="post">
        <label for="voornaam">Voornaam:</label>
        <input type="text" id="voornaam" name="voornaam" required><br><br>

        <label for="achternaam">Achternaam:</label>
        <input type="text" id="achternaam" name="achternaam" required><br><br>

        <label for="email">E-mail:</label>
        <input type="email" id="email" name="email" required><br><br>

        <label for="telefoon">Telefoon:</label>
        <input type="tel" id="telefoon" name="telefoon"><br><br>

        <input type="submit" value="Opslaan">
    </form>
</body>
</html>