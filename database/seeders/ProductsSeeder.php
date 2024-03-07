<?php

namespace Database\Seeders;

use App\Models\Product;
use App\Models\ProductType;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class ProductsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // create product type
        $female_type = ProductType::create([
            'name' => 'female'
        ]);

        $male_type = ProductType::create([
            'name' => 'male'
        ]);


        // create product
        Product::create([
            'name' => 'PRIMEBLUE TRACK PANTS',
            'description' => 'Sound too good to be true',
            'price' => 45.0,
            'image' => 'https://res.cloudinary.com/techis/image/upload/v1636085698/vfdlyu9cog7lav4wlvh7.png',
            'product_type_id' => $female_type->id,
            'category_id' => 3,
        ]);

        Product::create([
            'name' => 'Believe This 2.0 Long Tights',
            'description' => "Women's Style",
            'price' => 75.0,
            'image' => 'https://res.cloudinary.com/techis/image/upload/v1636085862/xg9my6m94i1owokev4y6.png',
            'product_type_id' => $female_type->id,
            'category_id' => 3,
        ]);

        Product::create([
            'name' => 'Adicolor Essentials Fleece Sweatshirt',
            'description' => "Women's Originals",
            'price' => 50.0,
            'image' => 'https://res.cloudinary.com/techis/image/upload/v1636085940/spsl3zpicnhinadjbxml.png',
            'product_type_id' => $female_type->id,
            'category_id' => 1,
        ]);

        Product::create([
            'name' => 'Essentials Relaxed Logo Hoodie',
            'description' => "Women's Essentials",
            'price' => 40.0,
            'image' => 'https://res.cloudinary.com/techis/image/upload/v1636085960/v9qvnwiuitneluvjcm0s.png',
            'product_type_id' => $female_type->id,
            'category_id' => 1,
        ]);

        Product::create([
            'name' => 'Brand Love Fleece Hoodie',
            'description' => "Women's Essentials Giant Logo",
            'price' => 50.0,
            'image' => 'https://res.cloudinary.com/techis/image/upload/v1636086002/ievy5w4gtpnhujzpbqve.png',
            'product_type_id' => $female_type->id,
            'category_id' => 1,
        ]);

        Product::create([
            'name' => '311 Shaping Skinny Women\'s Jeans',
            'description' => 'A super-comfortable jean with a flattering skinny leg',
            'price' => 65.0,
            'image' => 'https://res.cloudinary.com/techis/image/upload/v1636086239/qkmp8n4ecsgkz9fqnqrl.png',
            'product_type_id' => $female_type->id,
            'category_id' => 2,
        ]);

        Product::create([
            'name' => 'Ribcage Straight Ankle Women\'s Jeans',
            'description' => 'Built to contour curves, lengthen legs',
            'price' => 59.99,
            'image' => 'https://res.cloudinary.com/techis/image/upload/v1636086291/cwkynuinxbtfbgxyxrcs.png',
            'product_type_id' => $female_type->id,
            'category_id' => 2,
        ]);

        Product::create([
            'name' => '501® Original Fit Women\'s Jeans',
            'description' => 'Made with an innovative tummy-slimming panel',
            'price' => 68.99,
            'image' => 'https://res.cloudinary.com/techis/image/upload/v1636086337/pzjwvjkzcv0pigiazweh.png',
            'product_type_id' => $female_type->id,
            'category_id' => 2,
        ]);

        Product::create([
            'name' => 'River Island double pom pom',
            'description' => 'Outfit complete',
            'price' => 26.99,
            'image' => 'https://res.cloudinary.com/techis/image/upload/v1636095381/nt3fgwhfug9uhkzca29u.jpg',
            'product_type_id' => $female_type->id,
            'category_id' => 3,
        ]);

        Product::create([
            'name' => 'ASOS DESIGN borg roll back',
            'description' => 'Put a lid on it',
            'price' => 26.0,
            'image' => 'https://res.cloudinary.com/techis/image/upload/v1636095120/sge7fvhkhd0xaozgyisc.jpg',
            'product_type_id' => $female_type->id,
            'category_id' => 3,
        ]);

        Product::create([
            'name' => 'My Accessories London Exclusive',
            'description' => 'Exclusive to ASOS',
            'price' => 13.0,
            'image' => 'https://res.cloudinary.com/techis/image/upload/v1636087926/qitthsnqqbfwjwd4lnfw.jpg',
            'product_type_id' => $female_type->id,
            'category_id' => 3,
        ]);

        Product::create([
            'name' => 'METRONAUT',
            'description' => 'Slim Men Grey Jeans',
            'price' => 29.0,
            'image' => 'https://res.cloudinary.com/techis/image/upload/v1636088245/tz7n67melxfaccgvkmd9.png',
            'product_type_id' => $male_type->id,
            'category_id' => 2,
        ]);

        Product::create([
            'name' => 'Urbano Fashion',
            'description' => 'Jogger Fit Men Grey Jeans',
            'price' => 49.0,
            'image' => 'https://res.cloudinary.com/techis/image/upload/v1636088306/xooptyrg50i5agmgt2ix.png',
            'product_type_id' => $male_type->id,
            'category_id' => 2,
        ]);

        Product::create([
            'name' => 'Allen Solly',
            'description' => 'Anti-Bacterial Men Slim Fit Checked Shirt',
            'price' => 19.0,
            'image' => 'https://res.cloudinary.com/techis/image/upload/v1636088369/hnv27hxoqtcdd8a7dsv2.png',
            'product_type_id' => $male_type->id,
            'category_id' => 1,
        ]);

        Product::create([
            'name' => 'FLYING MACHINE',
            'description' => 'Men Slim Fit Solid Casual Shirt',
            'price' => 39.0,
            'image' => 'https://res.cloudinary.com/techis/image/upload/v1636088422/kbshggwq5isezdu7j8pn.png',
            'product_type_id' => $male_type->id,
            'category_id' => 1,
        ]);

        Product::create([
            'name' => 'Jai Textiles',
            'description' => 'Men Slim Fit Solid Spread Collar Shirt',
            'price' => 29.0,
            'image' => 'https://res.cloudinary.com/techis/image/upload/v1636088453/un18b0dl4fyoczeuy3f4.png',
            'product_type_id' => $male_type->id,
            'category_id' => 1,
        ]);

        Product::create([
            'name' => 'Lyle & Scott beanie in navy',
            'description' => 'Cold-weather wins',
            'price' => 12.0,
            'image' => 'https://res.cloudinary.com/techis/image/upload/v1636088514/am6z1rerqkywcdyszx2c.png',
            'product_type_id' => $male_type->id,
            'category_id' => 3,
        ]);

        Product::create([
            'name' => 'Carhartt WIP watch beanie in khaki',
            'description' => 'Domed crown',
            'price' => 19.0,
            'image' => 'https://res.cloudinary.com/techis/image/upload/v1636088541/ryvw4agzjgpvnscbw9fu.png',
            'product_type_id' => $male_type->id,
            'category_id' => 3,
        ]);

        Product::create([
            'name' => 'Carhartt WIP chase beanie in navy',
            'description' => 'Turn-up brim',
            'price' => 15.0,
            'image' => 'https://res.cloudinary.com/techis/image/upload/v1636088585/tlrogn96ohdxozfe23ee.png',
            'product_type_id' => $male_type->id,
            'category_id' => 3,
        ]);

        Product::create([
            'name' => 'Willit Men\'s Cotton Yoga Sweatpants Open Bottom Jogger',
            'description' => 'Comfortable yoga sweatpants for men',
            'price' => 33.99,
            'image' => 'https://res.cloudinary.com/techis/image/upload/v1636096101/fk6lmoe8ongzi5hjyqyv.jpg',
            'product_type_id' => $male_type->id,
            'category_id' => 4,
        ]);

        Product::create([
            'name' => 'BALEAF Men\'s Cotton Yoga Sweatpants Lounge Pants Open',
            'description' => 'Soft lounge pants for men',
            'price' => 35.99,
            'image' => 'https://res.cloudinary.com/techis/image/upload/v1636096177/t75jh82v7spwsi9tgj3w.jpg',
            'product_type_id' => $male_type->id,
            'category_id' => 4,
        ]);

        Product::create([
            'name' => 'Peter England University',
            'description' => 'Slim Men Light Blue Jeans',
            'price' => 39.55,
            'image' => 'https://res.cloudinary.com/techis/image/upload/v1636088186/ouc7du0ijibrm6qlqcfs.png',
            'product_type_id' => $male_type->id,
            'category_id' => 2,
        ]);

        Product::create([
            'name' => 'THE GYM PEOPLE Men\'s Fleece Pants with Deep Pockets Joggers',
            'description' => 'Warm fleece pants with deep pockets for men',
            'price' => 30.99,
            'image' => 'https://res.cloudinary.com/techis/image/upload/v1636096137/vfjodsa46c92nq8nqbnv.jpg',
            'product_type_id' => $male_type->id,
            'category_id' => 4,
        ]);
    }
}
