<!DOCTYPE html>
<html lang="nl">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Adress Bijwerken</title>
    <style>
    body {
        background-color: lightblue;
    }
    </style>
</head>
<body>
    <h1>Adress Bijwerken</h1>
    <form action="UpdateAddressController.php" method="post">
        <label for="address_id">Adress ID:</label>
        <input type="text" id="Address_id" name="address_id" required><br><br>
        <input type="submit" value="Bijwerken">
    </form>
</body>
</html>