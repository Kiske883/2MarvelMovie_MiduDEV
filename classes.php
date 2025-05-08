<?php

declare(strict_types=1);

class SuperHero
{
    // promoted properties -> Asi se declara el constructor en PHP 8.0,
    // es una gran diferencia con respecto a Java por ejemplo
    // que tenemos que declarar las publicas al principio en el constructor 
    // recibir las variables y asignarlas a las propiedades de clase
    // gran avance de PHP 8.0 
    // Podemos tanbien crear objetos que sean solo de lectura, para porteger los datos,
    // ahora bien tenemos que tener en cuenta que ademas entonces tenemos que declarar el tipo de dato
    public function __construct(
        readonly public string $name,
        public array $powers,
        public string $planet
    ) {}

    public function show_all()
    {
        return get_object_vars($this);
        // get_object_vars es una funcion de PHP que devuelve un array asociativo con las propiedades del objeto
    }

    public function attack()
    {
        return "¡$this->name ataca con sus poderes!";
    }

    public function description()
    {
        $powers = implode(", ", $this->powers);
        // implode es una funcion de PHP que convierte un array en un string
        return "Soy $this->name, un superhéroe de $this->planet con poderes : $powers.";
    }

    public static function random()
    {
        $names = ["Superman", "Batman", "Wonder"];
        $powers = [
            ["vuelo", "super fuerza", "rayos laser"],
            ["inteligencia", "habilidad con armas", "agilidad"],
            ["fuerza", "velocidad", "invisibilidad"]
        ];
        $planets = ["Krypton", "Tierra", "Themyscira"];

        // array_rand es una funcion de PHP que devuelve una clave aleatoria de un array 
        $name = $names[array_rand($names)];
        $power = $powers[array_rand($powers)];
        $planet = $planets[array_rand($planets)];

        // echo "Soy $name, un superhéroe de $planet con poderes : " .implode(", ", $power);

        return new self($name, $power, $planet);
        // self hace referencia a la propia clase, es como el this pero para la clase   
   
    }
}

$hero = new SuperHero("Superman", ["vuelo", "super fuerza", "rayos laser"], "Krypton");
// echo $hero->description();

// Se puede llamar a un metodo estatico sin tener que instanciar la clase
$hero = SuperHero::random();
echo $hero->description();
?>