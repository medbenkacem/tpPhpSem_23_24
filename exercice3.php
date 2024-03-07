<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <h1>Calcul sur les variables</h1>
    <?php 
    //valeurs 0.2, 150 et 10 aux variables $TVA,$ PRIX et $Nombre.
$TVA=0.2;
$PRIX=150;
$Nombre=10;
//Calculer le prix HT (Hors Taxe) et le prix TTC(Tout Taxe Comprise) pour les 10 articles et
//les afficher.
$HT=$TVA*$PRIX*$Nombre;
$TTC=(1+$TVA)*$HT;
echo $TTC;
?>
</body>
</html>