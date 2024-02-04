<?php
// (?#
// echo('helloworld');
// #?)
if(isset($_POST['signin'])){
    $pdo = new PDO ("mysql:host=localhost;dbname=faille", 'root', '');
    $login = htmlEntities($_POST['login']);
    $password = htmlEntities($_POST['password']);
    $selectall = $pdo->query("SELECT * FROM user WHERE login='$login' AND password='$password'");
    $result = $selectall->fetch();
    $counttable = count((is_countable($result)?$result:[]));
    if($counttable!=0){
echo('connexion réussie');
    }
else{
    echo ('utilisateur non reconnu');
}
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="exemple de faille SQLI">
    <title>formulaire-test</title>
</head>
<body>
    <h1> Injection SQL</h1>

    <form method="post" action="#">
        Login : <label for="signin"></label><input type="text" id="signin" name="login" placeholder="login"><br>
        Password : <input type="text" name="password"> <br>
    <input type="submit" value="sign in" name="signin">
    </form>
    <p>Essayer avec le login <strong> ' OR 1=1 OR 1='</strong>: la connexion fonctionne :'(</p>
</body>
</html>