<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Bootcamp;
use File;

class BootcampSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // 1. Truncar la tabla bootcamps
        // Bootcamps::truncate();

        // 2. leer el archivo bootcamps.json
        $json = File::get("database/_data/bootcamps.json");
          // convertir el contenido json en un array
          $arreglo_bootcamp = json_decode($json);

        // 3. leer el archivo y por cada bootcamp 
        foreach ($arreglo_bootcamp as $bootcamp) {
            // 4. Crear un bootcamp por cada uno
            $b = new Bootcamp();
            $b->name = $bootcamp->name;
            $b->description = $bootcamp->description;
            $b->website = $bootcamp->website;
            $b->phone = $bootcamp->phone;
            $b->average_rating = $bootcamp->average_rating;
            $b->average_cost = $bootcamp->average_cost;
            $b->user_id  = 1;
            $b->save();
        }
        
    }

}
