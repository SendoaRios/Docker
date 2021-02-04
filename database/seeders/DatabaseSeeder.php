<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Hotel;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $file = fopen('public\assets\hotels.csv', "r");
       
        $data = array();
        $i = 0;
        while (($filedata = fgetcsv($file, 1000, ";")) !== FALSE) {
            $num = count($filedata );
            // Skip first row (Remove below comment if you want to skip the first row)
            if($i == 0){
                $i++;
                continue;
            }
            for ($c=0; $c < $num; $c++) {
               $data[$i][] = $filedata [$c];
            }
            $i++;
         }
        
         fclose($file);

        // Insert to MySQL database
        foreach($data as $importData){
            $hotel = new Hotel();
            $hotel->id=$importData[0];
            $hotel->titulo=$importData[1];
            $hotel->logo=$importData[2];
            $hotel->estrellas=$importData[3];
            $hotel->save();
            
        }
    }
}
