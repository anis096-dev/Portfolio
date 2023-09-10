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
                'id' => 1,
                'name' => 'Anis Awadi',
                'email' => 'anis.awadi96@gmail.com',
                'date_of_birth' => '1996-05-09',
                'location' => 'Jendouba, Tunisia',
                'phone' => '+216-25219853',
                'bio' => 'Lorem Ipsum is simply dummy text of the printing and typesetting industry.',
                'occupation' => 'Laravel Full Stack Developer',
                'medium' => 'https://medium.com/',
                'twitter' => 'https://twitter.com/',
                'dribble' => 'https://dribbble.com/',
                'linkedin' => 'https://www.linkedin.com/in/anis-awadi-45531b1a2/',
                'CV_drive' => 'https://drive.google.com/file/d/1e8305uEBCtzqn-PCOaFvUFFjoNabiY_c/view?usp=sharing',
                'email_verified_at' => '2023-07-15 09:16:16',
                'password' => '$2y$10$AjEleI/.jkoUShPoqp2x3.Iunt811zmJlcUGZQvNFONP7EVzSYEwq',
                'two_factor_secret' => NULL,
                'two_factor_recovery_codes' => NULL,
                'two_factor_confirmed_at' => NULL,
                'remember_token' => NULL,
                'profile_photo_path' => 'profile-photos/9qUkbHaQGAZ0C7RrMS4HZ83nef3jA0HwdC26h88Z.png',
                'created_at' => NULL,
                'updated_at' => '2023-09-10 13:09:53',
            ),
        ));
        
        
    }
}