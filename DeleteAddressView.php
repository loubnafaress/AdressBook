<!DOCTYPE html>
<html lang="nl">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Adress Verwijderen</title>
    <style>
        body {
            background-color: lightblue;
        }
    </style>
</head>
<body>
    <h1>Adress Verwijderen</h1>
    <form action="DeleteAddressController.php" method="post">
        <label for="address_id">Adress:</label>
        <input type="text" id="address_id" name="address_id" required><br><br>
        <input type="submit" value="Verwijder">
    </form>
</body>
</html>