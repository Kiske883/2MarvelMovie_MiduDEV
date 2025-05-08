<?php

/* Formas de importar archivos en PHP
   require_once "functions.php"; // Si no existe el archivo, se para la ejecución
   include_once "functions.php"; // Si no existe el archivo, se sigue ejecutando el código
*/
/* En definitiva yo aconsejaria utilizar el require_once, ya que no me interesa que se siga ejecutando
   si no existe la libreria de funciones */ 

require_once "functions.php";
require_once "classes/NextMovie.php";

$next_movie = NextMovie::fetch_and_create_movie(API_URL);
$data = $next_movie->get_data();
// var_dump($data);
$untilMessage = get_until_message($data["daysUntil"]);

// $data = get_data_url(API_URL);
// $untilMessage = get_until_message($data["days_until"]);
?>
<?php render_template("head",$data); ?>
<?php render_template("main",array_merge($data,["untilMessage" => $untilMessage])); ?>
