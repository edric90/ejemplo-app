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
    }
}
