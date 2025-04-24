<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Homepage</title>
    <style>
        h {
    font-size: 100px;
}

ul {
    list-style-type: none;
    margin: 0;
    padding: 0;
    overflow: hidden;
    background-color: #333;
}

li {
    float: left;
}

li a {
    display: block;
    color: red;
    text-align: center;
    padding: 14px 16px;
    text-decoration: none;
}

li a:hover {
    background-color: black;
}

body {
    background-color: lightblue;
}

header {
    background-color: navy;
}

.logo-container {
  display: inline-block;
  vertical-align: middle;
  justify-content: center;
}

p {
    font-size: 40px;
}
    </style>
</head>
<body>
    <header>
    <div class="logo-container">
        <a href="index.php"><img src="img/images.png" height="50" alt="ABLogo"></a>
    </div>

    <h>Welkom</h>
        <br>
        <br>
    </header>
        <ul>
            <li><a href="CreateContactView.php">contact aanmaken</a></li>
            <li><a href="CreateAddressView.php">Adress aanmaken</a></li>
            <li><a href="ReadAddressView.php">Adressgegevens bekijken</a></li>
            <li><a href="ReadContactView.php">Contactgegevens bekijken</a></li>
            <li><a href="DeleteAddressView.php">Adressgegevens verwijderen</a></li>
            <li><a href="DeleteContactView.php">Contactgegevens verwijderen</a></li>
        </ul>

    <p>Welkom Op de Website AddressBook</p>    

</body>    
</html>