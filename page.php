<?php
session_start();
echo "Bonjour ".$_SESSION["Nom"]."<br>";
echo "Ta première connexion était ".$_SESSION["Date"]."<br>";
echo "<a href='".$_SESSION["Site"]."'>Cliquez ici</a>";

