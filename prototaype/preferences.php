<?php
// 1️⃣ معالجة الفورم وإنشاء الكوكيز
if ($_SERVER["REQUEST_METHOD"] == "POST") {

    $user  = $_POST["user"];
    $color = $_POST["color"];
    $lang  = $_POST["lang"];

    // إنشاء cookies لمدة ساعة
    setcookie("cookie_user", $user, time() + 3600);
    setcookie("cookie_color", $color, time() + 3600);
    setcookie("cookie_lang", $lang, time() + 3600);
    setcookie("cookie_last_update_date", date("Y-m-d H:i:s"), time() + 3600);

    // إعادة تحميل الصفحة
    header("Location: " . $_SERVER["PHP_SELF"]);
    exit();
}

// 2️⃣ قراءة القيم من cookies إذا كانت موجودة
$user  = isset($_COOKIE["cookie_user"]) ? $_COOKIE["cookie_user"] : "";
$color = isset($_COOKIE["cookie_color"]) ? $_COOKIE["cookie_color"] : "white";
$lang  = isset($_COOKIE["cookie_lang"]) ? $_COOKIE["cookie_lang"] : "fr";
$last  = isset($_COOKIE["cookie_last_update_date"]) ? $_COOKIE["cookie_last_update_date"] : null;
?>

<!DOCTYPE html>
<html>
<head>
    <title>Préférences utilisateur</title>
</head>

<body style="background-color: <?php echo $color; ?>;">

<h2>
<?php
if ($lang == "fr") {
    echo "Bienvenue ";
} else {
    echo "مرحبا بك ";
}
echo $user;
?>
</h2>

<?php
if ($last) {
    echo "<p>Dernière visite : " . $last . "</p>";
}
?>

<form method="POST">

    <label>Nom :</label>
    <input type="text" name="user" required><br><br>

    <label>Couleur :</label>
    <select name="color">
        <option value="white">Blanc</option>
        <option value="lightblue">Bleu</option>
        <option value="lightgreen">Vert</option>
    </select><br><br>

    <label>Langue :</label>
    <select name="lang">
        <option value="fr">Français</option>
        <option value="ar">Arabe</option>
    </select><br><br>

    <button type="submit">Enregistrer mes choix</button>

</form>

</body>
</html>

