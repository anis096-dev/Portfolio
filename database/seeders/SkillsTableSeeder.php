<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class SkillsTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        

        \DB::table('skills')->delete();
        
        \DB::table('skills')->insert(array (
            0 => 
            array (
                'created_at' => '2023-07-22 09:22:34',
                'deleted_at' => NULL,
                'desc' => 'Lorem ipsum dolor sit amet, consectetuer adipiscing elit, sed diam euismod volutpat.',
                'icon' => 'image_uploads/GP5f3WI7X3rjuPlOT7HjdMfSuxhaERrT56AoLnJ8.png',
                'id' => 1,
                'name' => 'ui/ux design	',
                'rate' => 80.0,
                'updated_at' => '2023-07-22 09:22:34',
                'user_id' => 1,
            ),
            1 => 
            array (
                'created_at' => '2023-07-22 09:23:44',
                'deleted_at' => NULL,
                'desc' => 'Lorem ipsum dolor sit amet, consectetuer adipiscing elit, sed diam euismod volutpat.',
                'icon' => 'image_uploads/x04PDLWogwvg2XyBpi6ZLs0J9z7GedFW4Fiwlbn5.png',
                'id' => 2,
                'name' => 'app development',
                'rate' => 90.0,
                'updated_at' => '2023-07-22 09:23:44',
                'user_id' => 1,
            ),
            2 => 
            array (
                'created_at' => '2023-07-22 09:28:01',
                'deleted_at' => NULL,
                'desc' => 'Lorem ipsum dolor sit amet, consectetuer adipiscing elit, sed diam euismod volutpat.',
                'icon' => 'image_uploads/UUwF7kySvquaiJLBAkoe9zXZthkrIV2pF4aou9Pz.png',
                'id' => 3,
                'name' => 'Web Development',
                'rate' => 100.0,
                'updated_at' => '2023-07-22 09:28:01',
                'user_id' => 1,
            ),
        ));
        
        
    }
}