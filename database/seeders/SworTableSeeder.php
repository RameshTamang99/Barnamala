<?php

namespace Database\Seeders;

use App\Models\Swor;
use Carbon\Carbon;
use Illuminate\Database\Seeder;

class SworTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Swor::insert(
            [

                [
                    'swor_name' => 'अ',
                    'swor_audio' => '464548453354.m4a',
                    'swor_order' => '1',
                    'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
                    'updated_at' => Carbon::now()->format('Y-m-d H:i:s'),
                ],
                [
                    'swor_name' => 'आ',
                    'swor_audio' => '464548453354.m4a',
                    'swor_order' => '2',
                    'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
                    'updated_at' => Carbon::now()->format('Y-m-d H:i:s'),
                ],
                [
                    'swor_name' => 'ई',
                    'swor_audio' => '464548453354.m4a',
                    'swor_order' => '3',
                    'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
                    'updated_at' => Carbon::now()->format('Y-m-d H:i:s'),
                ],
                [
                    'swor_name' => 'उ',
                    'swor_audio' => '464548453354.m4a',
                    'swor_order' => '4',
                    'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
                    'updated_at' => Carbon::now()->format('Y-m-d H:i:s'),
                ],
                [
                    'swor_name' => 'ऊ',
                    'swor_audio' => '464548453354.m4a',
                    'swor_order' => '5',
                    'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
                    'updated_at' => Carbon::now()->format('Y-m-d H:i:s'),
                ],
                [
                    'swor_name' => 'ए',
                    'swor_audio' => '464548453354.m4a',
                    'swor_order' => '6',
                    'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
                    'updated_at' => Carbon::now()->format('Y-m-d H:i:s'),
                ],
                [
                    'swor_name' => 'ऐ',
                    'swor_audio' => '464548453354.m4a',
                    'swor_order' => '7',
                    'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
                    'updated_at' => Carbon::now()->format('Y-m-d H:i:s'),
                ],
                [
                    'swor_name' => 'ओ',
                    'swor_audio' => '464548453354.m4a',
                    'swor_order' => '8',
                    'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
                    'updated_at' => Carbon::now()->format('Y-m-d H:i:s'),
                ],
                [
                    'swor_name' => 'औ',
                    'swor_audio' => '464548453354.m4a',
                    'swor_order' => '9',
                    'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
                    'updated_at' => Carbon::now()->format('Y-m-d H:i:s'),
                ],
                [
                    'swor_name' => 'अं',
                    'swor_audio' => '464548453354.m4a',
                    'swor_order' => '10',
                    'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
                    'updated_at' => Carbon::now()->format('Y-m-d H:i:s'),
                ],
                [
                    'swor_name' => 'अः',
                    'swor_audio' => '464548453354.m4a',
                    'swor_order' => '11',
                    'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
                    'updated_at' => Carbon::now()->format('Y-m-d H:i:s'),
                ],
                [
                    'swor_name' => 'ऋ',
                    'swor_audio' => '464548453354.m4a',
                    'swor_order' => '12',
                    'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
                    'updated_at' => Carbon::now()->format('Y-m-d H:i:s'),
                ],
                [
                    'swor_name' => 'ॠ',
                    'swor_audio' => '464548453354.m4a',
                    'swor_order' => '13',
                    'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
                    'updated_at' => Carbon::now()->format('Y-m-d H:i:s'),
                ]
            ]
        );
    }
}
