<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;
use League\Csv\Reader;

class FlatsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        
        //load the CSV document from a file path
        $csv = Reader::createFromPath(Storage::path('property-data.csv'), 'r');
        $csv->setHeaderOffset(0);

        $records = $csv->getRecords(); //returns all the CSV records as an Iterator object

        foreach ($records as $key => $value) {
            DB::table('flats')->insert([
                'name' => $value['Name'],
                'price' => $value['Price'],
                'bedrooms' => $value['Bedrooms'],
                'bathrooms' => $value['Bathrooms'],
                'storeys' => $value['Storeys'],
                'garages' => $value['Garages'],
            ]);
        }
        
    }
}
