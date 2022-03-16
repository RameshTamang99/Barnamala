<?php

namespace Database\Seeders;

use App\Models\InformativeMenu;
use Carbon\Carbon;
use Illuminate\Database\Seeder;

class InformativeMenuTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        InformativeMenu::insert(
            [

                [
                    'name' => 'बार',
                    'status' => '1',
                    'menu_id' => 'IMS-00000',
                    'description' => 'Baar description',
                    'background' => '71651620298477.jpg',
                    'back_icon' => '71651620298477.jpg',
                    'card_image' => '71651620298477.jpg',
                    'order' => '1',
                    'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
                    'updated_at' => Carbon::now()->format('Y-m-d H:i:s'),
                ],
                [
                    'name' => 'महिना',
                    'status' => '1',
                    'menu_id' => 'IMS-00001',
                    'description' => 'Mahina description',
                    'background' => '71651620298477.jpg',
                    'back_icon' => '71651620298477.jpg',
                    'card_image' => '71651620298477.jpg',
                    'order' => '2',
                    'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
                    'updated_at' => Carbon::now()->format('Y-m-d H:i:s'),
                ],
                [
                    'name' => 'ग्रह',
                    'status' => '1',
                    'menu_id' => 'IMS-00002',
                    'description' => 'Graha description',
                    'background' => '71651620298477.jpg',
                    'back_icon' => '71651620298477.jpg',
                    'card_image' => '71651620298477.jpg',
                    'order' => '3',
                    'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
                    'updated_at' => Carbon::now()->format('Y-m-d H:i:s'),
                ],
                [
                    'name' => 'आकृती',
                    'status' => '1',
                    'menu_id' => 'IMS-00003',
                    'description' => 'Aakriti description',
                    'background' => '71651620298477.jpg',
                    'back_icon' => '71651620298477.jpg',
                    'card_image' => '71651620298477.jpg',
                    'order' => '4',
                    'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
                    'updated_at' => Carbon::now()->format('Y-m-d H:i:s'),
                ],
                [
                    'name' => 'राम्रो बानी',
                    'status' => '1',
                    'menu_id' => 'IMS-00004',
                    'description' => 'Ramro Bani description',
                    'background' => '71651620298477.jpg',
                    'back_icon' => '71651620298477.jpg',
                    'card_image' => '71651620298477.jpg',
                    'order' => '5',
                    'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
                    'updated_at' => Carbon::now()->format('Y-m-d H:i:s'),
                ],
                [
                    'name' => 'तरकारी',
                    'status' => '1',
                    'menu_id' => 'IMS-00005',
                    'description' => 'Tarkari description',
                    'background' => '71651620298477.jpg',
                    'back_icon' => '71651620298477.jpg',
                    'card_image' => '71651620298477.jpg',
                    'order' => '6',
                    'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
                    'updated_at' => Carbon::now()->format('Y-m-d H:i:s'),
                ],
                [
                    'name' => 'सारीर को अङ्ग',
                    'status' => '1',
                    'menu_id' => 'IMS-00006',
                    'description' => 'Sarir Ko Anga description',
                    'background' => '71651620298477.jpg',
                    'back_icon' => '71651620298477.jpg',
                    'card_image' => '71651620298477.jpg',
                    'order' => '7',
                    'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
                    'updated_at' => Carbon::now()->format('Y-m-d H:i:s'),
                ],
                [
                    'name' => 'रङ ',
                    'status' => '1',
                    'menu_id' => 'IMS-00007',
                    'description' => 'Rang description',
                    'background' => '71651620298477.jpg',
                    'back_icon' => '71651620298477.jpg',
                    'card_image' => '71651620298477.jpg',
                    'order' => '7',
                    'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
                    'updated_at' => Carbon::now()->format('Y-m-d H:i:s'),
                ]
            ]
        );
    }
}
