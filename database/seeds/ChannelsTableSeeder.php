<?php

use Illuminate\Database\Seeder;

use App\Channel;

class ChannelsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        $channel1 = ['title' => 'Laravel'];

        $channel2 = ['title' => 'VueJs'];

        $channel3 = ['title' => 'AdonisJs'];

        $channel4 = ['title' => 'Django'];

        $channel5 = ['title' => 'AngularJs'];

        $channel6 = ['title' => 'ExpressJs'];

        $channel7 = ['title' => 'Javascript'];

        $channel8 = ['title' => 'HapiJs'];

        Channel::create($channel1);

        Channel::create($channel2);

        Channel::create($channel3);

        Channel::create($channel4);

        Channel::create($channel5);

        Channel::create($channel5);

        Channel::create($channel6);

        Channel::create($channel7);

        Channel::create($channel8);




        
    }
}
