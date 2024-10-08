<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;
use App\Models\Category;
use App\Models\Post;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {

       
    //    Category::factory(5)->create();
        
        User::create([
            'name' => 'Muhammad Dzaki ardiansyah',
            'username' => 'Muhammad dzaki',
            'email' => 'muhammaddzaki@gmail.com',
            'password' => bcrypt('12345')
        ]);

        // User::create([
        //     'name' => 'Muhammad Abim',
        //     'email' => 'muhammadabim@gmail.com',
        //     'password' => bcrypt('54321')
        // ]);

        Category::create([
            'nama' => 'Web Programming',
            'slug' => 'web-programming'
        ]);

        Category::create([
            'nama' => 'Mobile Programming',
            'slug' => 'mobile-programming'
        ]);

        Category::create([
            'nama' => 'Desgin',
            'slug' => 'desgin'
        ]);

        Category::create([
            'nama' => 'Personal',
            'slug' => 'personal'
        ]);

        User::factory(3)->create();
        Post::factory(25)->create();

        // Post::create([
        //     'category_id' => '1',
        //     'user_id' => '1',
        //     'judul' => 'Belajar html 5',
        //     'slug' => 'belajar-html-5',
        //     'excrpt' => 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Earum delectus quam deserunt enim at repellat recusandae harum quis quibusdam exercitationem inventore aspernatur adipisci odio aut libero error labore sit voluptatibus',
        //     'caption' => '<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Earum delectus quam deserunt enim at repellat recusandae harum quis quibusdam exercitationem inventore aspernatur adipisci odio aut libero error labore sit voluptatibus, natus consequatur dolore similique ipsum vel? Distinctio eos similique quis sit sapiente voluptatum est fugiat sunt eius mollitia,</p><p>excepturi assumenda blanditiis animi maxime officiis. Unde fugit nulla quia ea perferendis in numquam similique eos soluta expedita quos, doloribus ducimus magni quasi animi eum quis veritatis delectus</p><p> doloremque! Labore est fugiat ducimus voluptas modi in reprehenderit iure, adipisci architecto eius! Natus reprehenderit vel perspiciatis aliquam voluptatem sequi quo eaque. Tempore, doloribus.</p>'
           
        // ]);

        // Post::create([
        //     'category_id' => '2',
        //     'user_id' => '1',
        //     'judul' => 'Belajar Kotlin',
        //     'slug' => 'belajar-kotlin',
        //     'excrpt' => 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Earum delectus quam deserunt enim at repellat recusandae harum quis quibusdam exercitationem inventore aspernatur adipisci odio aut libero error labore sit voluptatibus',
        //     'caption' => '<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Earum delectus quam deserunt enim at repellat recusandae harum quis quibusdam exercitationem inventore aspernatur adipisci odio aut libero error labore sit voluptatibus, natus consequatur dolore similique ipsum vel? Distinctio eos similique quis sit sapiente voluptatum est fugiat sunt eius mollitia,</p><p>excepturi assumenda blanditiis animi maxime officiis. Unde fugit nulla quia ea perferendis in numquam similique eos soluta expedita quos, doloribus ducimus magni quasi animi eum quis veritatis delectus</p><p> doloremque! Labore est fugiat ducimus voluptas modi in reprehenderit iure, adipisci architecto eius! Natus reprehenderit vel perspiciatis aliquam voluptatem sequi quo eaque. Tempore, doloribus.</p>'
            
        // ]);

        // Post::create([
        //     'category_id' => '3',
        //     'user_id' => '2',
        //     'judul' => 'Belajar Figma',
        //     'slug' => 'belajar-figma',
        //     'excrpt' => 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Earum delectus quam deserunt enim at repellat recusandae harum quis quibusdam exercitationem inventore aspernatur adipisci odio aut libero error labore sit voluptatibus',
        //     'caption' => '<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Earum delectus quam deserunt enim at repellat recusandae harum quis quibusdam exercitationem inventore aspernatur adipisci odio aut libero error labore sit voluptatibus, natus consequatur dolore similique ipsum vel? Distinctio eos similique quis sit sapiente voluptatum est fugiat sunt eius mollitia,</p><p>excepturi assumenda blanditiis animi maxime officiis. Unde fugit nulla quia ea perferendis in numquam similique eos soluta expedita quos, doloribus ducimus magni quasi animi eum quis veritatis delectus</p><p> doloremque! Labore est fugiat ducimus voluptas modi in reprehenderit iure, adipisci architecto eius! Natus reprehenderit vel perspiciatis aliquam voluptatem sequi quo eaque. Tempore, doloribus.</p>'
            
        // ]);
    }
}
