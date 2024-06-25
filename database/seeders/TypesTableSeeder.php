<?php

namespace Database\Seeders;

use App\Models\Type;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;

class TypesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $typesArray = ['Front-End', 'Back-End', 'Full-Stack'];

        foreach ($typesArray as $type) {
            
            $newType = new Type();

            $newType->name = $type;
            $newType->slug = Str::slug($newType->name);
            
            $newType->save();
            
        }
    }
}
