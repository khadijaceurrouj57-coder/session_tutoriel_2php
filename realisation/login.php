<?php


$users = [

    ["name"=>"Ahmed","password"=>"admin123","role"=>"administrateur","active"=>true],
    ["name"=>"Sara","password"=>"pass456","role"=>"formateur","active"=>true],
    ["name"=>"Leila","password"=>"test789","role"=>"apprenant","active"=>false],
    ["name"=>"Alae","password"=>"test309","role"=>"apprenant","active"=>true]

];
 
$message = "";
if($_SERVER["REQUEST_METHOD"] === "POST"){

    $name=$_POST["name"];
    $password=$_POST["password"];

     $found =false;
    foreach($users as $user){
       if ($user["name"] === $name && $user["password"] === $password){
        $found=true;
        if($user["active"] === false){
            $message="compte desactive";
        }else{
          session_start();
          $_SESSION["user"]=$user;
          header("location:dashboard.php");
          exit;

        }



       } 
    }
    if(!$found){
        $message="idenfication incorecte";
    }
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
    <form method="POST" >
<label >name:</label>
<input type="text" name="name" placeholder="name"><br><br>
<label >password:</label>
<input type="password" name="password" placeholder="password"><br><br>
<button type="submit">se connecter</button><br><br>

<p><?php echo $message;  ?></p>

    </form>
</body>
</html>