<?php

use App\Tag;
use App\Category;
use App\Post;
use Carbon\Carbon;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Storage;

class PostsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Storage::disk('public')->deleteDirectory('posts');
        Storage::disk('public')->deleteDirectory('headers');
    	Post::truncate();
    	Category::truncate();
        Tag::truncate();

    	$category = new Category();
    	$category->name = "Categoría 1";
    	$category->save();

    	$category = new Category();
    	$category->name = "Categoría 2";
    	$category->save();

        // $tag = new App\Tag();
        // $tag->name = "Etiqueta 1";
        // $tag->save();

        // $tag = new App\Tag();
        // $tag->name = "Etiqueta 2";
        // $tag->save();

        $post = new Post;
        $post->title = "Lorem Ipsum is simply dummy text of the printing";
        $post->subtitle = "Lorem Ipsum has been the industry's standard";
        $post->excerpt = "Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s.";
        $post->body = "<p>Curabitur feugiat mollis turpis vel luctus. Donec et magna enim. Nunc at sapien risus. Ut vestibulum dolor non dapibus consectetur. Nulla massa nisi, posuere eget mauris ac, ultricies interdum sem. Duis porta imperdiet tellus eget tristique. Vestibulum auctor quis eros eget maximus. Vivamus faucibus sapien vitae eros dignissim, vel cursus purus ornare. Fusce eu lorem nunc. Donec quis eros finibus, accumsan mauris a, fermentum lacus.</p><p>Praesent eu orci nec ex iaculis auctor ut in mauris. Maecenas porttitor pretium est vitae fringilla. Maecenas lacinia, neque in dignissim consequat, nisl mi condimentum odio, sed feugiat ex lacus ac nisi. Vivamus leo elit, fringilla eget commodo nec, ultrices vel magna. Pellentesque convallis magna eu libero finibus molestie. Nulla vel elit a magna sagittis lobortis quis ut enim. Aenean malesuada aliquet mauris eu venenatis. Donec luctus feugiat nulla. Integer scelerisque tempor eros. Nunc ac turpis a orci congue congue. </p>";
        $post->published_at = Carbon::now()->subDays(2);
        $post->category_id = 1;
        $post->user_id = 1;
        $post->save();

        $post->tags()->attach(Tag::create(['name' => 'Etiqueta 1']));


        $post = new Post;
        $post->title = "It is a long established fact that a reader will be distracted";
        $post->subtitle = "The point of using Lorem Ipsum is that it has a more-or-less normal distribution of letters";
        $post->excerpt = "It is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout.";
        $post->body = "<p>Nullam enim ligula, varius sed euismod et, dictum sed justo. Nunc sit amet hendrerit lacus. Curabitur viverra vestibulum nisi nec ultricies. Suspendisse facilisis nunc vitae quam dignissim suscipit a sed neque. Nullam odio dolor, venenatis vel elementum sed, rhoncus vitae leo. Maecenas id felis sed dui pulvinar sollicitudin tincidunt a metus. Aenean lacinia ornare lectus et sollicitudin. Morbi commodo sapien nec mauris interdum, non viverra elit placerat. Donec condimentum sit amet leo sed accumsan. Pellentesque habitant morbi tristique senectus et netus et malesuada fames ac turpis egestas.</p><p>Ut tincidunt nulla risus. Nulla vel nisl venenatis, consectetur est in, finibus nunc. Vestibulum eu facilisis enim, quis bibendum libero. Maecenas vehicula aliquam odio, sit amet viverra lorem malesuada gravida. Quisque eget lobortis libero. Donec tempus consequat pretium. Morbi eget elit purus. Suspendisse suscipit eu eros sed euismod. Etiam porta consectetur tortor, sit amet molestie felis vestibulum sed. Vivamus sit amet massa nec risus rhoncus ornare. Duis euismod bibendum hendrerit. In faucibus, metus et pulvinar vulputate, nibh ex varius leo, vel rutrum mauris mauris hendrerit ipsum.</p>";
        $post->published_at = Carbon::now()->subDays(3);
        $post->category_id = 1;
        $post->user_id = 1;
        $post->save();

        $post->tags()->attach(Tag::create(['name' => 'Etiqueta 2']));


        $post = new Post;
        $post->title = "There are many variations of passages of Lorem Ipsum available";
        $post->subtitle = "by injected humour, or randomised words";
        $post->excerpt = "If you are going to use a passage of Lorem Ipsum, you need to be sure there isn't anything embarrassing hidden in the middle of text.";
        $post->body = "<p>Morbi aliquet purus at nisi varius accumsan. Pellentesque pretium mauris quis feugiat mollis. Maecenas aliquet sapien id ante congue ullamcorper. Suspendisse eget sapien molestie, interdum erat non, fermentum eros. Suspendisse quis ligula mauris. Vestibulum quis rhoncus augue. Sed interdum egestas urna quis blandit. Duis condimentum nisi vitae enim scelerisque eleifend a commodo nibh. Sed fringilla turpis ante, vitae rutrum felis lacinia in. Nunc suscipit tempor malesuada. Donec maximus lacus et justo accumsan bibendum. Nam ornare elit non neque tincidunt, at ornare neque bibendum. Vivamus nec auctor enim. Maecenas pretium aliquam nisl. In imperdiet nibh faucibus massa porta congue.</p><p>Praesent eu orci nec ex iaculis auctor ut in mauris. Maecenas porttitor pretium est vitae fringilla. Maecenas lacinia, neque in dignissim consequat, nisl mi condimentum odio, sed feugiat ex lacus ac nisi. Vivamus leo elit, fringilla eget commodo nec, ultrices vel magna. Pellentesque convallis magna eu libero finibus molestie. Nulla vel elit a magna sagittis lobortis quis ut enim. Aenean malesuada aliquet mauris eu venenatis. Donec luctus feugiat nulla. Integer scelerisque tempor eros. Nunc ac turpis a orci congue congue.</p>";
        $post->published_at = Carbon::now()->subDays(2);
        $post->category_id = 2;
        $post->user_id = 1;
        $post->save();

        $post->tags()->attach(Tag::create(['name' => 'Etiqueta 3']));


        $post = new Post;
        $post->title = "Lorem Ipsum is simply dummy text";
        $post->subtitle = "Lorem Ipsum has been the industry's standard";
        $post->excerpt = "Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s.";
        $post->body = "<p>Quisque vehicula tincidunt pretium. Fusce sapien eros, pretium a nisi non, lacinia malesuada nisl. Nullam sed leo ut enim porta ornare. Praesent vitae libero dictum, luctus libero quis, tempor magna. Phasellus volutpat congue ipsum, maximus rutrum justo lacinia a. Proin a tempus purus, in viverra lorem. Aenean sagittis tortor enim, sed sodales felis maximus eu. Proin finibus id nisi hendrerit congue. Curabitur nec tempus tellus. Vestibulum fermentum lorem diam, convallis gravida nulla egestas nec. Aenean ullamcorper, leo ut imperdiet sagittis, nisi enim facilisis lacus, in pellentesque turpis dui non massa. Fusce facilisis sapien non est convallis volutpat. Aenean accumsan quis ipsum quis consectetur. Nam sed diam aliquet tellus lobortis ultricies ut suscipit orci. Morbi molestie dignissim dui vitae aliquet. Donec vehicula elit odio.</p><p>Quisque vel fermentum lectus. Proin nec ipsum vitae nisi finibus euismod. In vulputate nisi ligula, vitae finibus quam convallis eu. Vestibulum a ante hendrerit, porttitor velit non, consequat eros. Nulla facilisi. Fusce faucibus rhoncus facilisis. Curabitur in eros nec metus ullamcorper accumsan a sit amet nibh. Praesent ac nunc commodo, dictum nunc sed, commodo quam. In semper semper diam sed ornare. Praesent aliquet sed sem in tincidunt. Phasellus ante neque, gravida vehicula porta cursus, dignissim eu nisi. Sed quis ex odio. Proin consequat et nisi eu rhoncus. Aenean in justo non nisi convallis ullamcorper. </p>";
        $post->published_at = Carbon::now()->subDays(3);
        $post->category_id = 1;
        $post->user_id = 1;
        $post->save();

        $post->tags()->attach(Tag::create(['name' => 'Etiqueta 4']));


        $post = new Post;
        $post->title = "It is a established fact that a reader will be distracted";
        $post->subtitle = "The point of using Lorem Ipsum is that it has a more-or-less normal distribution of letters";
        $post->excerpt = "It is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout.";
        $post->body = "<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nunc pulvinar mauris orci, quis gravida ante consequat vitae. Praesent in porta enim, sed dapibus lorem. Suspendisse fringilla sollicitudin massa a malesuada. Pellentesque sagittis, lorem porttitor aliquet sagittis, purus arcu gravida ex, non dignissim diam sem varius massa. Aliquam eget ultricies diam. Nulla dictum nibh est, tempor laoreet metus semper vitae. Nulla mollis ac ante ac porta. Proin lacinia, est id rhoncus sagittis, metus massa varius lorem, tempus vehicula odio libero sed nunc. Aenean nisl nisl, sagittis a vehicula vel, aliquet tristique elit. Suspendisse eget tortor sodales, eleifend elit ut, sodales ipsum. Phasellus porttitor blandit dolor eu posuere. In tortor massa, rutrum nec velit vitae, laoreet mattis nulla. Integer viverra bibendum ipsum. Donec cursus, turpis a convallis volutpat, neque purus cursus mauris, at maximus justo eros vitae nisi. Nulla maximus luctus sapien, eu elementum orci bibendum at. Suspendisse euismod consectetur ornare.</p><p>Mauris aliquet felis quis enim laoreet, id feugiat sem tincidunt. Fusce sollicitudin posuere nunc, eu congue risus iaculis sed. Sed sed diam id nibh accumsan mattis. In pellentesque sodales metus nec sodales. Nullam et bibendum purus, eu tincidunt dolor. Pellentesque et molestie ante. Quisque accumsan risus efficitur mollis vestibulum. Suspendisse potenti. In varius dictum sagittis. Nullam mattis tristique enim, sit amet lacinia sapien facilisis vel. Phasellus lacinia magna faucibus, lacinia lacus a, semper lacus.</p>";
        $post->published_at = Carbon::now()->subDays(3);
        $post->category_id = 1;
        $post->user_id = 1;
        $post->save();

        $post->tags()->attach(Tag::create(['name' => 'Etiqueta 5']));
        
    }
}
