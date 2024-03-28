<?php
require_once 'classes/User.php';
require_once 'classes/Hash.php';
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
    <form action="codeTester.php" method="post">
        <label>Email</label> <br>
        <input type="email" name="email"> <br>
        <label>Password</label><br>
        <input type="password" name = "pw"><br>
        <input type="submit" name = "regis"value="Register"><br>
    </form>
</body>

</html>
<?php

$user = new User();
if(isset($_POST['regis'])){
    $email = $_POST['email'];
    $pw = $_POST['pw'];
    $arr = array(
        "email" => $email,
        "pw" => $pw
    );

    $user->insert('patients',$arr);
    header('location:index.php');
}