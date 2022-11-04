<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use DB;

class ProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        DB::table('products')->insert([
            [
                'name' => 'Multiply',
                'description' => 'Multiply is an album released by Ed Sheeran
                on March, 2014.',
                'price' => '150000',
                'stock' => '15',
                'image' => 'album1.png',
                'category_id' => '2'
            ],
            [
                'name' => 'Divide',
                'description' => 'Divide is an album released by
                Ed Sheeran on 2017.',
                'price' => '180000',
                'stock' => '10',
                'image' => 'album2.png',
                'category_id' => '2'
            ],
            [
                'name' => 'Equals',
                'description' => 'Equals is an album released by
                Ed Sheeran on 2020. Music includes "Shivers", "Bad Habits",
                and etc',
                'price' => '200000',
                'stock' => '20',
                'image' => 'album3.png',
                'category_id' => '2'
            ],
            [
                'name' => 'Folklore',
                'description' => 'Folklore is an album by Taylor Swift',
                'price' => '175000',
                'stock' => '15',
                'image' => 'album4.png',
                'category_id' => '1'
            ],
            [
                'name' => 'Parachutes',
                'description' => 'Album by Coldplay. One of the best music albums
                by Coldplay.',
                'price' => '190000',
                'stock' => '4',
                'image' => 'album5.png',
                'category_id' => '3'
            ],
            [
                'name' => 'Spheres',
                'description' => 'Album by Coldplay. Pop Cultural and R & B Music.',
                'price' => '185000',
                'stock' => '0',
                'image' => 'album6.png',
                'category_id' => '2'
            ],
            [
                'name' => 'Moonchild',
                'description' => 'Moonchild (stylized as MOONCHILD) is the 
                debut studio album by Indonesian singer-songwriter Niki.',
                'price' => '150000',
                'stock' => '22',
                'image' => 'album7.png',
                'category_id' => '2'
            ],
            [
                'name' => 'Anti',
                'description' => 'Anti (stylised in all caps) is the 
                eighth studio album by Barbadian singer Rihanna',
                'price' => '130000',
                'stock' => '6',
                'image' => 'album8.png',
                'category_id' => '2'
            ],
            [
                'name' => 'Lover',
                'description' => 'Lover is the seventh studio album by American singer-songwriter Taylor Swift. 
                It was released on August 23, 2019, through Republic Records',
                'price' => '145000',
                'stock' => '7',
                'image' => 'album9.png',
                'category_id' => '1'
            ],
            [
                'name' => 'Loud',
                'description' => 'Loud is the fifth studio album by Barbadian 
                singer Rihanna. It was released on November 12, 2010',
                'price' => '115000',
                'stock' => '0',
                'image' => 'album10.png',
                'category_id' => '4'
            ],
            [
                'name' => 'Sweetener',
                'description' => 'Sweetener is the fourth studio album by American singer Ariana Grande. 
                It was released on August 17, 2018, through Republic Records.',
                'price' => '100000',
                'stock' => '13',
                'image' => 'album12.png',
                'category_id' => '2'
            ],
            [
                'name' => 'Positions',
                'description' => 'Positions is the sixth studio album by American singer Ariana Grande. 
                It was released by Republic Records on October 30, 2020. ',
                'price' => '105000',
                'stock' => '4',
                'image' => 'album13.png',
                'category_id' => '2'
            ],
            [
                'name' => 'In the Lonely Hour',
                'description' => 'In the Lonely Hour is the debut album
                 by English singer and songwriter Sam Smith.',
                'price' => '127500',
                'stock' => '10',
                'image' => 'album14.png',
                'category_id' => '3'
            ],
            [
                'name' => 'Red',
                'description' => 'Red is the fourth studio album by American singer-songwriter Taylor Swift. It was 
                released on October 22, 2012, by Big Machine Records.',
                'price' => '145000',
                'stock' => '5',
                'image' => 'album15.png',
                'category_id' => '2'
            ],
            [
                'name' => 'Handwritten',
                'description' => '"Imagination" is the fourteenth track of the deluxe edition 
                of Shawn Mendes\'s debut studio album, Handwritten.',
                'price' => '160000',
                'stock' => '0',
                'image' => 'album11.png',
                'category_id' => '2'
            ],
        ]);
    }
}
