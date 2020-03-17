<h1>Transmission des données</h1>

<hr>
<h2>Exercice 1</h2>
<a href="main.php?valeur=52">Cliquer pour avoir la valeur en degré</a>
<?php

echo '<h3>1.</h3>';
$val = $_GET['valeur'];
if(isset($val)) {
    $newVal = ($val - 32) * 5 / 9;
    echo "La valeur en degré est " . $newVal;
}
echo '<h3>2.</h3>';
?>

<body>
<form action="1.php" method="post">
    Valeur en Fahreinheit : <input type="text" name="val" />
    <input type="submit" value = "Convertir"/>
</form>
</body>

<hr>
<h2>Exercice 2</h2>

<body>
<form method="post">
    Nom : <input type="text" name="nom" value="<?php if (isset($_POST['nom'])){echo $_POST['nom'];} ?>"/>
    Prénom : <input type="text" name="prenom" value="<?php if (isset($_POST['prenom'])){echo $_POST['prenom'];} ?>" />
    <br>
        Débutant : <input type="radio" name="rad" id="deb" value="débutant" checked="<?php if ($_POST['rad']==2){echo 'checked';} ?>">
        Avancé : <input type="radio" name="rad" id="av" value="avancé" checked="<?php if ($_POST['rad']==2){echo 'checked';} ?>">
    <br>
    <input type="reset" value = "Effacer"/>
    <input type="submit" value = "Envoyer"/>
</form>
</body>

<?php
$nom = $_POST['nom'];
$prenom = $_POST['prenom'];
$niv = $_POST['rad'];
if(isset($nom) && isset($prenom) && isset($niv)){
    echo "Bonjour ".$prenom." ".$nom.". Vous avez un niveau ".$niv;
}
?>

<hr>
<h2>Exercice 3</h2>

<body>
<form method="post">
    Nom : <input type="text" name="nom1" value="<?php if (isset($_POST['nom1'])){echo $_POST['nom1'];} ?>"/>
    Prénom : <input type="text" name="prenom1" value="<?php if (isset($_POST['prenom1'])){echo $_POST['prenom1'];} ?>" />
    Age : <input type="text" name="age" value="<?php if (isset($_POST['age'])){echo $_POST['age'];} ?>" />
    <br>
    Langues pratiquées (choisir au minimum 2)
    <br>
    <select name="langues[]" multiple="multiple">
        <option value="français">français</option>
        <option value="anglais">anglais</option>
        <option value="allemand">allemand</option>
        <option value="espagnol">espagnol</option>
    </select>
    <br>
    Compétences informatiques (choisir au minimum 2)
    <br>
    HTML <input type="checkbox" name="1" id="deb" value="HTML">
    CSS <input type="checkbox" name="2" id="deb" value="CSS">
    PHP <input type="checkbox" name="3" id="deb" value="PHP">
    SQL <input type="checkbox" name="4" id="deb" value="SQL">
    C <input type="checkbox" name="5" id="deb" value="C">
    C++ <input type="checkbox" name="6" id="deb" value="C++">
    JS <input type="checkbox" name="7" id="deb" value="JS">
    PYTHON <input type="checkbox" name="8" id="deb" value="PYTHON">
    <br>
    <input type="reset" value = "EFFACER"/>
    <input type="submit" value = "ENVOI"/>
</form>
</body>

<?php
$nom1 = $_POST['nom1'];
$prenom1 = $_POST['prenom1'];
$age = $_POST['age'];
if(isset($nom1) && isset($prenom1) && isset($age)){
    echo "Vous êtes ".$prenom1." ".$nom1;
    echo "Vous avez ".$age." ans";
    echo '<br>';
    echo "Vous parlez :";
    echo '<br>';
    $langues=$_POST['langues'];
    foreach ($langues as $valeur){
        echo "<li>$valeur</li>";
    }
    echo "Vous avez des compétences informatiques en :";
    echo '<br>';
    for($i = 0; $i < 9; $i++){
        if(isset($_POST["$i"])){
            echo '<li>'.$_POST["$i"].'</li>';
        }
    }

}
?>

<hr>
<h2>Exercice 4</h2>
<body>
<form method="post">
    Nombre 1 : <input type="text" name="nb1" value="<?php if (isset($_POST['nb1'])){echo $_POST['nb1'];} ?>"/>
    <br>
    Nombre 2 : <input type="text" name="nb2" value="<?php if (isset($_POST['nb2'])){echo $_POST['nb2'];} ?>" />
    <br>
    Resultat : <input type="text" name="resultat" value="<?php
    $x=$_POST['nb1'];
    $y=$_POST['nb2'];
    if(isset($x) && isset($y)){
        $res=0;
        if($_POST['add']){
            $res = $x + $y;
        } else if($_POST['sous']){
            $res = $x-$y;
        } else if($_POST['div'] && $y != 0){
            $res = $x/$y;
        } else if($_POST['puiss']){
            $res = pow($x,$y);
        }
        echo $res;
    }
    ?>" />
    <br>
    Cliquer sur un bouton :
    <input type="submit" name="add" value = "Addition x+y"/>
    <input type="submit" name="sous" value = "Soustraction x-y"/>
    <input type="submit" name="div" value = "Division x/y"/>
    <input type="submit" name="puiss" value = "Puissance x^y"/>
</form>
</body>

<hr>
<h2>Exercice 5</h2>
<body>
<form method="post" enctype="multipart/form-data">
    Fichier 1 : <input type="file" name="f1" value = "Choisir un fichier"/>
    <br>
    Fichier 2 : <input type="file" name="f2" value = "Choisir un fichier"/>
    <br>
    <input type="submit" value = "Envoi"/>
</form>
</body>

<?php
    $file1 = basename("f1","name");
    $file2 = basename("f2","name");
    move_uploaded_file($_FILES["images"]["tmp_name"],$file1);
    move_uploaded_file($_FILES["images"]["tmp_name"],$file2);
    echo $_FILES["$file1"]["name"];
    echo $_FILES["$file2"]["name"];

    ?>

<hr>
<h2>Exercice 7</h2>
<?php
    setcookie("cookie0","test0",time() + 30);
    setcookie("cookie1","test1");
    echo $_COOKIE['cookie0'];
    echo $_COOKIE['cookie1'];

    //setcookie("cookie1","test1", time() - 10);
    //setcookie("cookie0","");

    //echo $_COOKIE['cookie0'];
    //echo $_COOKIE['cookie1'];

?>

<hr>
<h2>Exercice 9</h2>

<?php
    session_start();
    echo session_id();
    $_SESSION["Nom"]="On est la";
    $_SESSION["Date"]=time();
    $_SESSION["Site"]="https://google.com";

    echo "<a href='page.php'>Cliquez ici</a>";
?>
<hr>
<h2>Exercice 10</h2>
<?php
    $id_file = fopen('test-fic.txt','r');
    if(!$id_file) {
        echo "Erreur d'accès au fichier";
    } else{
        while($ligne=fgets($id_file)){
            echo $ligne.'<br>';
        }
        fclose($id_file);
    }

    $id_file = fopen('test-fic.txt','a');
    if($id_file){
        fwrite($id_file,"Rémi ADDE");
        fclose($id_file);
    }
    $id_file = fopen('test-fic.txt','r');
    if(!$id_file) {
        echo "Erreur d'accès au fichier";
    } else{
        while($ligne=fgets($id_file)){
            echo $ligne.'<br>';
        }
        fclose($id_file);
    }
?>

<hr>
<h2>Exercice 11</h2>
<?php
    $chaines=[];
    $contact=fopen("contact.txt","r+");

    if(!$contact) {
        echo "Erreur d'accès au fichier";
    } else{
        $i=0;
        while($ligne=fgets($contact)){
            $chaines[$i]=explode(";",$ligne);
            $i++;
        }
    fclose($id_file);
    }

    foreach ($chaines as $c){
        foreach ($c as $s){
            echo $s;
        }
        echo '<br>';
    }
?>

<hr>
<h2>Exercice 12</h2>
<form method="post">
    Nom <input type="text" name="nom" value="<?php if (isset($_POST['nom'])){echo $_POST['nom'];} ?>"/>
    <br>
    Prenom <input type="text" name="prenom" value="<?php if (isset($_POST['prenom'])){echo $_POST['prenom'];} ?>" />
    <br>
</form>

