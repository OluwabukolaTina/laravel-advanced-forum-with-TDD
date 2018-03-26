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
        // $channel1 = ['title' => 'Laravel'];

        // $channel2 = ['title' => 'VueJs'];

        // $channel3 = ['title' => 'AdonisJs'];

        // $channel4 = ['title' => 'Django'];

        // $channel5 = ['title' => 'AngularJs'];

        // $channel6 = ['title' => 'ExpressJs'];

        // $channel7 = ['title' => 'Javascript'];

        // $channel8 = ['title' => 'HapiJs'];

        $t1 =  'Laravel';

        $t2 = 'VueJs';

        $t3 = 'AdonisJs';

        $t4 = 'Django';

        $t5 = 'AngularJs';

        $t6 = 'ExpressJs';

        $t7 = 'Javascript';

        $t8 = 'HapiJs';

        $c1 = [

            'title' => $t1,

            'slug' => str_slug($t1)

        ];

        $c2 = [

            'title' => $t2,

            'slug' => str_slug($t2)

        ];

        $c3 = [

            'title' => $t3,

            'slug' => str_slug($t3)

        ];

        $c4 = [

            'title' => $t4,

            'slug' => str_slug($t4)

        ];

        $c5 = [

            'title' => $t5,

            'slug' => str_slug($t5)

        ];

        $c6 = [

            'title' => $t6,

            'slug' => str_slug($t6)

        ];

        $c7 = [

            'title' => $t7,

            'slug' => str_slug($t7)

        ];

        $c8 = [

            'title' => $t8,

            'slug' => str_slug($t8)

        ];

        Channel::create($c1);

        Channel::create($c2);

        Channel::create($c3);

        Channel::create($c4);

        Channel::create($c5);

        Channel::create($c5);

        Channel::create($c6);

        Channel::create($c7);

        Channel::create($c8);
        
    }
}
