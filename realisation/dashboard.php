<?php
session_start();

if(!isset($_SESSION["user"])){
    header("location:login.php");
    exit;
}
$user=$_SESSION["user"];
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard</title>
</head>
<body>
 <h2>
<?php
if($user["role"] === "administrateur"){
    echo "bienvenue administrateur " . $user["name"];

}elseif($user["role"] === "formateur"){
    echo "bienvenue formateur " . $user["name"];
}else{
    echo "bienvenue apprenant " . $user["name"];
    
}
?>
 </h2>
<form action="logout.php" method="POST">
<button type="submit">Se déconnecter</button>
</form>

    
</body>
</html>