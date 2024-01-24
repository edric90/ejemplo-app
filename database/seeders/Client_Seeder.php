<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

use App\Models\Client;

class Client_Seeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $client = new Client();
        $client->first_name = "Edison Ricardo";
        $client->last_name = "Caero Flores";
        $client->address='c 3 s/n Barrio 15 de Agosto';
        $client->zone='Villa 1ro. de Mayo';
        $client->cell_phone='70256845';
        $client->save();        
/*
        $client1 = new Client();
        $client1->first_name = "Edison";
        $client1->last_name = "Caero";
        $client1->address='c 3 s/n Barrio 15 de Agosto';
        $client1->zone='Villa 1ro. de Mayo';
        $client1->cell_phone='70256845';
        $client1->save();        
*/
    }
}
