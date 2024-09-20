<?php
$city = "Goma";
$apiKey = "12760f50dbe516811e6d268e08864763";
$url = "http://api.openweathermap.org/data/2.5/weather?q={$city}&appid={$apiKey}&units=metric";

$ch = curl_init();
curl_setopt($ch, CURLOPT_URL, $url);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
$response = curl_exec($ch);

if ($response === false) {
    echo 'Erreur : ' . curl_error($ch);
} else {
    $data = json_decode($response, true);
    echo "Météo à " . $data['name'] . "<br>";
    echo "Température: " . $data['main']['temp'] . "°C<br>";
    echo "Condition: " . $data['weather'][0]['description'] . "<br>";
}

curl_close($ch);
?>
