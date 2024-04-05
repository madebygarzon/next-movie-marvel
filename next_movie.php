<?php
const API_URL = "https://whenisthenextmcufilm.com/api";
#Inicializar una nueva sesión de cURL; ch = cURL handle
$ch = curl_init(API_URL); 
// Inidicar que queremos recibir el resultado de la peticion y no mostrarla en pantalla
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true); 
/* Ejecutar la petición
y guardamos el resultado
*/
$response = curl_exec($ch);

// Una alternativa seria utilizar file_get_contents
// $response = file_get_contents("http://www.google.es"); si solo quiero hacer un GET a una API
$data = json_decode($response, true);
curl_close($ch);
// var_dump($data);
?>
<head>
    <meta  charset="UTF-8" />
    <title>The Next Movie for Marvel</title>
    <link
    rel="stylesheet"
    href="https://cdn.jsdelivr.net/npm/@picocss/pico@2/css/pico.classless.min.css"
    />
</head>

<main>
    
        <section>
            <img src="<?= $data["poster_url"]; ?>" width="200" alt="poster <?= $data["title"];  ?>" style="border-radius: 16px" />
        </section>
    <hgroup>
        <h2><?= $data["title"]; ?> se estrena en <?= $data["days_until"];  ?> días. </h2>
        <p>Fecha de estreno: <?= $data["release_date"]; ?> </p>
        <p>El siguiente estreno es: <?= $data["following_production"]["title"] ?> </p>
    </hgroup>
    
</main>

<style>
    :root {
        color-scheme: light dark;
        font-size: 15px;
        /*font-family: 'Poppins'; */

    }

    body {
        display: grid;
        place-content: center;
    }

    section {
        display: flex; 
        justify-content: center;
        text-align: center;
    }
    img {
        text-align: center;
    }
    hgroup {
        display: flex;
        flex-direction: column;
        justify-content: center;
        text-align: center;

    }

</style>