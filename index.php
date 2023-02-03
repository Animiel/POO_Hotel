<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.1/css/all.min.css" integrity="sha512-MV7K8+y+gLIBoVD59lQIYicR65iaqukzvf/nwasF0nqhPay5w/9lJmVM2hMDcnK1OnMGCdVK+iQrJ7lzPJQd1w==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="style.css" type="text/css">
    <title>Document</title>
</head>
<body>
    
<?php
spl_autoload_register(function ($class_name) {
    include $class_name.'.php';
});

$client1 = new Client("KLEIN", "Freddy");
$client2 = new Client("KAUFFMAN", "Andréa");

$hotel1 = new Hotel("Hilton", "10, route de la Gare", "67000", "STRASBOURG", 4);

$chambre1 = new Chambre(1, 2, false, 100, "", $hotel1);
$chambre2 = new Chambre(2, 2, false, 100, "", $hotel1);
$chambre3 = new Chambre(3, 4, true, 170, "", $hotel1);

$reservation1 = new Reservation($client1, $chambre1, "2023-02-03", "2023-02-10");
$reservation2 = new Reservation($client2, $chambre2, "2023-05-12", "2023-05-26");
$reservation3 = new Reservation($client1, $chambre3, "2023-01-16", "2023-03-03");

echo $hotel1->afficherInfos()."<br><br>";
echo $hotel1->afficherReservation()."<br><br>";
echo $client1->afficherReservation()."<br>";
echo $client2->afficherReservation()."<br>";
echo $hotel1->afficherChambre()."<br>";
?>

</body>
</html>