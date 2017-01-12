<?php

/*
|--------------------------------------------------------------------------
| Model Factories
|--------------------------------------------------------------------------
|
| Here you may define all of your model factories. Model factories give
| you a convenient way to create models for testing and seeding your
| database. Just tell the factory how a default model should look.
|
*/

$factory->define(App\User::class, function (Faker\Generator $faker) {
    static $password;

    return [
        'name' => $faker->name,
        'email' => $faker->safeEmail,
        'password' => $password ?: $password = bcrypt('secret'),
        'remember_token' => str_random(10),
    ];
});

$factory->define(App\Cliente::class, function(Faker\Generator $faker) {

	return [
		'nombre' => $faker->name,
		'direccion' => $faker->address,
		'telefono' => $faker->phoneNumber,
	];
});

$factory->define(App\Proveedor::class, function(Faker\Generator $faker) {

	return [
		'nombre' => $faker->name,
		'direccion' => $faker->address,
		'telefono' => $faker->phoneNumber,
	];
});

$factory->define(App\Modelo::class, function(Faker\Generator $faker) {

	return [
		'modelo' => $faker->word,
		'marca'	=> $faker->company,
		'detalles' => $faker->sentence,
	];
});

$factory->define(App\Articulo::class, function(Faker\Generator $faker){
	return[
		'clave' => $faker->word,
		'nombre' => $faker->randomElement($array = array('Bujia', 'Aceite', 'Filtro', 'Banda',
			'Calibrador', 'Piston', 'Clutch', 'Carburador', 'Arbol de levas', 'Suspension',
			'Tornillo', 'Frenos', 'Turbo Kit', 'Balata', 'Tambor', 'Disco')),
		'id_categoria' => $faker->randomElement($array = array ('1','2','3','4')),
		'cantidad' => $faker->numberBetween($min = 20, $max = 100),
		'stock' => $faker->numberBetween($min = 50, $max = 15),
		'precio' => $faker->randomFloat($nbMaxDecimals = 2, $min = 50, $max = 500),
		'marca' => $faker->randomElement($array = array(
			'Bisch', 'Champion', 'Castrol', 'Mobil', 'Royal Purple', 'K&N', 'Gatorback', 'Gates',
			'Accel', 'MSD', 'Mallory', 'Magnecor', 'Autometer', 'Spek', 'EBC Brakes', 'Stoptech',
			'Wilwood', 'Crane Cams', 'Crowe', 'Clutchmasters', 'Centerforce', 'Holley', 'Edelbrock'))
	];
});

$factory->define(App\Venta::class, function(Faker\Generator $faker) {

	return [
		'fecha' => $faker->dateTimeThisMonth,
		'total' => $faker->randomFloat(2, .50),
		'pago' => $faker->randomElement($array = array('EFVO', 'CHEQUE', 'TD', 'TC', 'TE')),
		'id_cliente' => $faker->numberBetween(8, 25)
	];
});

$factory->define(App\Compra::class, function(Faker\Generator $faker) {

	return [
		'fecha' => $faker->dateTimeThisMonth,
		'total' => $faker->randomFloat(2, .50),
		'id_proveedor' => $faker->numberBetween(1, 25)
	];
});
