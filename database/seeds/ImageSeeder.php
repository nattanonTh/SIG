<?php

use App\Image;
use Illuminate\Database\Seeder;

class ImageSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Image::create(['type'=> 'image/jpeg', 'name' => 'test', 'size' => 150000, 'path' => 'uploads/']);
        Image::create(['type'=> 'image/jpeg', 'name' => 'test', 'size' => 150000, 'path' => 'uploads/']);
        Image::create(['type'=> 'image/jpeg', 'name' => 'test', 'size' => 150000, 'path' => 'uploads/']);
        Image::create(['type'=> 'image/jpeg', 'name' => 'test', 'size' => 150000, 'path' => 'uploads/']); 
    }
}
