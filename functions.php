<?php
// Con esto y la asignacion de tipo en la funcion, conseguimos
// algo parecido 
declare(strict_types=1);

/*  Este es el comando para levantar php en un puerto en concreto
    php -S localhost:8000 */
const API_URL = "https://whenisthenextmcufilm.com/api";

/* Dato curioso, en PHP el ambito de declaracion de las variables
   es parecido a Java, salvo por que si quiero utilizar dentro de 
   una funcion una variable que he declarado fuera de la funcion
   tengo que especificar que es global, o pasarla por parametro.

   cosas de PHP XD
   */

// Por convencion snakeCase y no CamelCase como getDataUrl
// podemos forzar el tipo, pero en PHP al final no deja de ser 
// una sugerencia, 
function get_data_url(string $url): array
{

    $result = file_get_contents($url);

    /* Ahora vamos a parsear los datos en un Json 
       el segundo parametro le indicamos que lo queremos 
       con un array asociativo */
    $data = json_decode($result, true);

    return $data;
}

function get_until_message(int $days): string
{
    return match (true) {
        $days < 0 => "La película ya se ha estrenado!",
        $days == 0 => "Hoy es el estreno!",
        $days == 1 => "La película se estrena mañana!",
        $days <= 7 => "La película se estrena esta semana",
        $days <= 30 => "La película se estrena este mes",
        default => "La película se estrena en $days días.",
    };
}

function render_template( string $template, array $data = []) {
    extract($data); // Extrae las variables del array asociativo
    // Extrae las variables del array asociativo y las convierte en variables locales
    require_once "templates/$template.php" ;
}
?>