<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class UsersTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        

        \DB::table('users')->delete();
        
        \DB::table('users')->insert(array (
            0 => 
            array (
                'bio' => 'Lorem Ipsum is simply dummy text of the printing and typesetting industry.',
                'created_at' => NULL,
                'date_of_birth' => 'Mai 9, 1996',
                'email' => 'anis.awadi96@gmail.com',
                'email_verified_at' => '2023-07-15 09:16:16',
                'id' => 1,
                'location' => 'Jendouba, Tunisia',
                'name' => 'Anis Awadi',
                'occupation' => 'Laravel Full Stack Developer',
                'medium' => NULL,
                'twitter' => NULL,
                'dribble' => NULL,
                'linkedin' => NULL,
                'CV_drive' => NULL,
                'password' => '$2y$10$AjEleI/.jkoUShPoqp2x3.Iunt811zmJlcUGZQvNFONP7EVzSYEwq',
                'phone' => '+216-25219853',
                'profile_photo_path' => NULL,
                'remember_token' => NULL,
                'two_factor_confirmed_at' => NULL,
                'two_factor_recovery_codes' => NULL,
                'two_factor_secret' => NULL,
                'updated_at' => '2023-07-15 09:35:36',
            ),
        ));
        
        
    }
}