<?php

namespace Database\Seeders;

use App\Models\InformativeMenuDetails;
use Carbon\Carbon;
use Illuminate\Database\Seeder;

class InformativeMenuDetailsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        InformativeMenuDetails::insert(
            [

                [
                    'menu_id' => 'IMS-00000',
                    'imd_name' => 'आइतबार',
                    'imd_image' => '71651620298477.png',
                    'imd_audio' => '71651620298477.mp3',
                    'imd_video' => '71651620298477.m4a',
                    'imd_background_image' => '71651620298477.png',
                    'imd_description' => 'Aaitabar description',
                    'imd_order' => '1',
                    'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
                    'updated_at' => Carbon::now()->format('Y-m-d H:i:s'),
                ],
                [
                    'menu_id' => 'IMS-00000',
                    'imd_name' => 'सोमबार ',
                    'imd_image' => '71651620298477.png',
                    'imd_audio' => '71651620298477.mp3',
                    'imd_video' => '71651620298477.m4a',
                    'imd_background_image' => '71651620298477.png',
                    'imd_description' => 'Sombar description',
                    'imd_order' => '2',
                    'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
                    'updated_at' => Carbon::now()->format('Y-m-d H:i:s'),
                ],
                [
                    'menu_id' => 'IMS-00000',
                    'imd_name' => 'मंगलबार ',
                    'imd_image' => '71651620298477.png',
                    'imd_audio' => '71651620298477.mp3',
                    'imd_video' => '71651620298477.m4a',
                    'imd_background_image' => '71651620298477.png',
                    'imd_description' => 'Mangalbar description',
                    'imd_order' => '3',
                    'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
                    'updated_at' => Carbon::now()->format('Y-m-d H:i:s'),
                ],
                [
                    'menu_id' => 'IMS-00000',
                    'imd_name' => 'बुधबार ',
                    'imd_image' => '71651620298477.png',
                    'imd_audio' => '71651620298477.mp3',
                    'imd_video' => '71651620298477.m4a',
                    'imd_background_image' => '71651620298477.png',
                    'imd_description' => 'Budhabar description',
                    'imd_order' => '4',
                    'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
                    'updated_at' => Carbon::now()->format('Y-m-d H:i:s'),
                ],
                [
                    'menu_id' => 'IMS-00000',
                    'imd_name' => 'बिहिबार ',
                    'imd_image' => '71651620298477.png',
                    'imd_audio' => '71651620298477.mp3',
                    'imd_video' => '71651620298477.m4a',
                    'imd_background_image' => '71651620298477.png',
                    'imd_description' => 'Bihibar description',
                    'imd_order' => '5',
                    'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
                    'updated_at' => Carbon::now()->format('Y-m-d H:i:s'),
                ],
                [
                    'menu_id' => 'IMS-00000',
                    'imd_name' => 'शुक्रबार ',
                    'imd_image' => '71651620298477.png',
                    'imd_audio' => '71651620298477.mp3',
                    'imd_video' => '71651620298477.m4a',
                    'imd_background_image' => '71651620298477.png',
                    'imd_description' => 'Sukrabar description',
                    'imd_order' => '6',
                    'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
                    'updated_at' => Carbon::now()->format('Y-m-d H:i:s'),
                ],
                [
                    'menu_id' => 'IMS-00000',
                    'imd_name' => 'शनिबार ',
                    'imd_image' => '71651620298477.png',
                    'imd_audio' => '71651620298477.mp3',
                    'imd_video' => '71651620298477.m4a',
                    'imd_background_image' => '71651620298477.png',
                    'imd_description' => 'Sanibar description',
                    'imd_order' => '7',
                    'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
                    'updated_at' => Carbon::now()->format('Y-m-d H:i:s'),
                ]
            ]
        );
    }
}
