<?php

$name  = "Guest";
$color = "burlywood";
$lang  = "fr";
$last  = "";

if(isset($_COOKIE["name"])) {
    $name = $_COOKIE["name"];
}

if(isset($_COOKIE["bg_color"])) {
    $color = $_COOKIE["bg_color"];
}

if(isset($_COOKIE["lang"])) {
    $lang = $_COOKIE["lang"];
}

if(isset($_COOKIE["last_update"])) {
    $last = $_COOKIE["last_update"];
}

if($_SERVER["REQUEST_METHOD"] === "POST") {

    if(!empty($_POST["f_name"])) {
        $name = $_POST["f_name"];
        setcookie("name", $name, time() + 3600 * 24 * 30);
    }

    if(!empty($_POST["bg_color"])) {
        $color = $_POST["bg_color"];
        setcookie("bg_color", $color, time() + 3600 * 24 * 30);
    }

    if(!empty($_POST["choose"])) {
        $lang = $_POST["choose"];
        setcookie("lang", $lang, time() + 3600 * 24 * 30);
    }

   
    $last = date("Y-m-d H:i:s");
    setcookie("last_update", $last, time() + 3600 * 24 * 30);
}


if($_SERVER["REQUEST_METHOD"] === "GET") {
    if(isset($_GET["action"]) && $_GET["action"] == "reset") {

        setcookie("name", "", time() - 3600);
        setcookie("bg_color", "", time() - 3600);
        setcookie("lang", "", time() - 3600);
        setcookie("last_update", "", time() - 3600);

        $name  = "Guest";
        $color = "burlywood";
        $lang  = "fr";
        $last  = "";
    }
}



$text = [
    "en" => [
        "greeting" => "Hello",
        "name_placeholder" => "Enter your name",
        "choose_color" => "Choose color",
        "save_button" => "Save",
        "language_label" => "Choose language",
        "reset_all" => "Reset all",

    ],
    "fr" => [
        "greeting" => "Bonjour",
        "name_placeholder" => "Entrez votre nom",
        "choose_color" => "Choisir la couleur",
        "save_button" => "Enregistrer",
        "language_label" => "Choisir la langue",
        "reset_all" => "Tout réinitialiser",
    ]

    ];
$tradiction = $text[$lang]; 


?>

<!DOCTYPE html>
<html>
<head>
    <title>Preferences</title>
</head>

<body style="background-color: <?php echo $color; ?>;">
!
<div style="
        width:400px;
        margin:80px auto;
        background:white;
        padding:20px;
        border-radius:10px;
        text-align:center;">

    <h1>
        <?php 
        if($lang == "fr"){
            echo "Bienvenue, ";
        } else {
            echo "Welcome, ";
        }
        echo $name; 
        ?>
    </h1>

    <?php if($last != "") { ?>
        <h3>Dernière mise à jour: <?php echo $last; ?></h3>
    <?php } ?>

    <form method="post">

        <label><?php echo $tradiction["name_placeholder"] ; ?></label><br>
        <input type="text" name="f_name"><br><br>

        <label><?php echo $tradiction["choose_color"] ; ?></label><br>
        <input type="color" name="bg_color"><br><br>

        <label><?php echo $tradiction["language_label"] ; ?></label><br>
        <select name="choose">
            <option value="fr">Français</option>
            <option value="en">English</option>
        </select><br><br>

        <input type="submit" value="<?php echo $tradiction["reset_all"] ; ?>">
    </form>

    <br><hr><br>

    <a href="?action=reset"><?php echo $tradiction["reset_all"] ; ?></a>

</div>

</body>
</html>