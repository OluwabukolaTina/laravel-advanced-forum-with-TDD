<?php

use Illuminate\Database\Seeder;

use App\Reply;

class RepliesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        $r1 = [

        	'user_id' => 1,

        	'discussion_id' => 1,

        	'content' => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Etiam interdum leo sit amet pulvinar volutpat. Sed rhoncus erat vitae tempor sollicitudin. Mauris consequat eros nec nisi eleifend viverra. Nullam tempus ante eleifend velit volutpat, nec gravida eros auctor. Maecenas mollis ac nibh id ultricies. Cras ut tristique purus, a porta tortor. Donec mauris nibh, porta sit amet nibh sed, tempus sollicitudin augue. In eros diam, iaculis a risus eu, condimentum bibendum magna. Phasellus aliquam erat mi, id vehicula dui ultricies vitae. Lorem ipsum dolor sit amet, consectetur adipiscing elit. Morbi vel tellus vulputate, tempus nisi in, eleifend dolor. Sed venenatis, urna vitae elementum malesuada, ante lorem convallis nunc, vitae tincidunt augue dolor quis turpis. Cras maximus turpis lorem.'

        ];

        $r2 = [

        	'user_id' => 2,

        	'discussion_id' => 2,

        	'content' => 'Aenean faucibus tortor tellus, quis pretium magna finibus ac. Maecenas a sagittis nisl. Phasellus pulvinar enim a varius faucibus. Nulla neque massa, hendrerit eu sapien et, posuere lacinia ante. Morbi vel turpis non sapien luctus maximus. Sed id mi varius, tempor tellus sit amet, bibendum purus. Etiam fringilla risus euismod turpis aliquam fermentum. Aenean accumsan dapibus libero ac viverra. Quisque lobortis sollicitudin ligula at imperdiet. Nullam vitae sapien eget ex vehicula egestas. Orci varius natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus.'

        ];

        $r3 = [

        	'user_id' => 1,

        	'discussion_id' => 3,

        	'content' => 'Suspendisse gravida eget magna in dictum. Quisque ullamcorper odio purus, sit amet pulvinar elit tristique eget. Aenean odio augue, malesuada et magna sed, tincidunt facilisis nisi. Aenean vel lacinia turpis. In viverra nisi mattis lorem volutpat, et rutrum massa condimentum. Proin vel quam mi. Donec mauris erat, lacinia placerat orci ut, tincidunt efficitur eros. Nulla eu posuere diam.'

        ];

        $r4 = [

        	'user_id' => 2,

        	'discussion_id' => 4,

        	'content' => 'Praesent porttitor blandit iaculis. Nunc malesuada nunc quis orci posuere, vitae interdum augue convallis. Quisque bibendum urna et erat consectetur faucibus. Aenean cursus eros lectus, non tristique metus varius sed. Curabitur id tellus sed magna dictum vestibulum. Aliquam erat volutpat. Pellentesque suscipit ex semper arcu tempus, sed interdum justo accumsan. Nulla facilisi. In vel viverra dui. Proin egestas efficitur urna, in pellentesque sem suscipit non. Curabitur egestas risus ac massa aliquam molestie. Maecenas nisi massa, fermentum at purus vel, venenatis rhoncus nulla. Fusce hendrerit tristique ante, a suscipit neque dignissim non.'

        ];

        Reply::create($r1);

        Reply::create($r2);

        Reply::create($r3);

        Reply::create($r4);


    }
}
