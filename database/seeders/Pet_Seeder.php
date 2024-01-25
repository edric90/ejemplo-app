<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Pet;
class Pet_Seeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $pet = new Pet();
        $pet->name='Bobi';
        $pet->color='Negro';
        $pet->gender='Macho';
        $pet->age=7;
        $pet->type='Mestizo';
        $pet->client_id=1;
        $pet->save();

        $pet1 = new Pet();
        $pet1->name='Chester';
        $pet1->color='Marron';
        $pet1->gender='Macho';
        $pet1->age=7;
        $pet1->type='Mestizo';
        $pet1->client_id=2;
        $pet1->save();
    }
}
