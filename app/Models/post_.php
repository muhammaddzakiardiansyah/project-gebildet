<?php 

 namespace App\Models;

 class post {
    private static $postingan = [
        [
            "name" => "Joji",
            "slug" => "Joji",
            "caption" => "Lorem ipsum dolor, sit amet consectetur adipisicing elit. Impedit fuga aliquam nesciunt voluptatum! Accusamus sapiente rerum voluptates, eos nulla molestiae alias eaque fuga voluptatum laborum expedita. Aliquam earum explicabo dolores.",
            "image" => "joji.png"
        ],
        [
            "name" => "Mustafa atef",
            "slug" => "Mustafa-atef",
            "caption" => "Lorem ipsum dolor, sit amet consectetur adipisicing elit. Impedit fuga aliquam nesciunt voluptatum! Accusamus sapiente rerum voluptates, eos nulla molestiae alias eaque fuga voluptatum laborum.",
            "image" => "madadelnaby.jpg"
        ],
        [
            "name" => "Payung teduh",
            "slug" => "Payung-teduh",
            "caption" => "Lorem ipsum dolor, sit amet consectetur adipisicing elit. Impedit fuga aliquam nesciunt, eos nulla molestiae alias eaque fuga voluptatum laborum expedita. Aliquam earum explicabo dolores.",
            "image" => "payungteduh.jpg"
        ],
        [
            "name" => "Charlie puth",
            "slug" => "Charlie-puth",
            "caption" => "Lorem ipsum dolor, sit amet consectetur adipisicing elit. Impedit fuga aliquam nesciunt, eos nulla molestiae alias eaque fuga voluptatum laborum expedita. Aliquam earum explicabo dolores.",
            "image" => "charlie.jpg"
        ]
        ];

        public static function all() {
            return collect(self::$postingan);
        }

        public static function find($slug) {
            $posts = static::all();
            // $post = [];
            // foreach( $posts as $p ) {
            //     if( $p["slug"] === $slug ) {
            //         $post = $p;
            //     }
            // }

            return $posts->firstWhere('slug', $slug);
        }
 }