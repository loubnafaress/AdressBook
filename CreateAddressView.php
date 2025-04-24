<!DOCTYPE html>
<html lang="nl">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Adressgegevens Toevoegen</title>
    <style>
        body{
            background-color: lightblue;
        }
    </style>
</head>
<body>
    <h1>Adressgegevens Toevoegen</h1>
    <form action="CreateAddressModel.php" method="post">
        <label for="straat">Straat:</label>
        <input type="text" id="straat" name="straat" required><br><br>

        <label for="stad">Stad:</label>
        <input type="text" id="stad" name="stad" required><br><br>

        <label for="postcode">Postcode:</label>
        <input type="postcode" id="postcode" name="postcode" required><br><br>

        <label for="land">Land:</label>
        <input type="land" id="land" name="land"><br><br>

        <input type="submit" value="Opslaan">
    </form>
</body>
</html>