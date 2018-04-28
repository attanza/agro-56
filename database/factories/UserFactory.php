<?php

use Faker\Generator as Faker;

$factory->define(App\User::class, function (Faker $faker) {
    return [
        'name' => $faker->name,
        'email' => $faker->unique()->safeEmail,
        'password' => '$2y$10$TKh8H1.PfQx37YgCzwiKb.KjNyWgaHb9cbcoQgdIVFlYg7B77UdFm', // secret
        'remember_token' => str_random(10),
    ];
});

$factory->define(App\Models\Komoditas::class, function (Faker $faker) {
    return [
        'nama' => $faker->name,
        'harga' => rand(10000, 20000),
        'satuan' => $faker->word,
    ];
});

$factory->define(App\Models\JenisSaprotan::class, function (Faker $faker) {
    return [
        'nama' => $faker->word,
    ];
});

$factory->define(App\Models\Saprotan::class, function (Faker $faker) {
    return [
        'nama' => $faker->word,
        'jenis_id' => 1,
        'merk' => $faker->word,
        'satuan' => $faker->word,
        'harga_satuan' => rand(100000, 400000),
    ];
});

$factory->define(App\Models\Vendor::class, function (Faker $faker) {
    return [
        'nama' => $faker->name,
        'alamat' => $faker->streetAddress,
        'telpon' => $faker->e164PhoneNumber,
        'npwp' => str_random(15),
        'siup' => str_random(15),
        'tdp' => str_random(15),
        'jenis_saprotan' => 1,
        'harga' => rand(100000, 400000),
        'nama_penganggung_jawab' => $faker->name,
        'posisi_penanggung_jawab' => $faker->word,
        'alamat_penanggung_jawab' => $faker->streetAddress,
        'no_telpon_penanggung_jawab' => $faker->e164PhoneNumber,
    ];
});
