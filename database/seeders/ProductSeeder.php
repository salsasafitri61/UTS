<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Product;

class ProductSeeder extends Seeder
{
    public function run(): void
    {
        Product::insert([
            [
                'id' => 1,
                'name' => 'Hoodie Oversized',
                'price' => 250000,
                'description' => 'Hoodie oversized berbahan fleece, nyaman dan cocok untuk gaya santai.',
                'category' => 'Outerwear',
                'image' => 'uploads/hoodieoversized.jpg',
            ],
            [
                'id' => 2,
                'name' => 'Tote Bag Kanvas',
                'price' => 70000,
                'description' => 'Tote bag kanvas dengan desain minimalis, praktis dan stylish.',
                'category' => 'Aksesoris',
                'image' => 'uploads/totebagkanvas.jpg',
            ],
            [
                'id' => 3,
                'name' => 'Crop Top',
                'price' => 150000,
                'description' => 'Crop top cocok untuk gaya kasual atau hangout.',
                'category' => 'Atasan',
                'image' => 'uploads/croptop.jpg',
            ],
            [
                'id' => 4,
                'name' => 'Sneakers Chunky',
                'price' => 450000,
                'description' => 'Sneakers chunky dengan desain trendi, pas untuk gaya jalanan.',
                'category' => 'Aksesoris',
                'image' => 'uploads/sneakerschunky.jpg',
            ],
            [
                'id' => 5,
                'name' => 'Jogger Pants',
                'price' => 180000,
                'description' => 'Jogger pants berbahan nyaman, pas untuk olahraga atau santai.',
                'category' => 'Bawahan',
                'image' => 'uploads/joggerpants.jpg',
            ],
            [
                'id' => 6,
                'name' => 'Bucket Hat',
                'price' => 90000,
                'description' => 'Bucket hat adalah aksesoris kekinian untuk Gen Z.',
                'category' => 'Aksesoris',
                'image' => 'uploads/buckethat.jpg',
            ],
            [
                'id' => 7,
                'name' => 'Oversized Blazer',
                'price' => 320000,
                'description' => 'Oversized blazer dengan desain edgy, cocok untuk acara kasual maupun formal.',
                'category' => 'Outerwear',
                'image' => 'uploads/oversizedblazer.jpg',
            ],
            [
                'id' => 8,
                'name' => 'Graphic Tee',
                'price' => 120000,
                'description' => 'Kaos dengan grafis kekinian yang mewakili ekspresi unik anak muda.',
                'category' => 'Atasan',
                'image' => 'uploads/graphictee.jpg',
            ],
            [
                'id' => 9,
                'name' => 'Wide Leg Pants',
                'price' => 200000,
                'description' => 'Celana wide-leg dengan bahan nyaman, pilihan tepat untuk gaya kasual chic.',
                'category' => 'Bawahan',
                'image' => 'uploads/widelegpants.jpg',
            ],
            [
                'id' => 10,
                'name' => 'Corset Top',
                'price' => 180000,
                'description' => 'Corset top modern yang trendi untuk tampilan berani.',
                'category' => 'Atasan',
                'image' => 'uploads/corsettop.jpg',
            ],
            [
                'id' => 11,
                'name' => 'Mini Skirt Plaid',
                'price' => 170000,
                'description' => 'Rok mini dengan motif kotak-kotak, pas untuk gaya retro atau modern.',
                'category' => 'Bawahan',
                'image' => 'uploads/miniskirtplaid.jpg',
            ],
            [
                'id' => 12,
                'name' => 'Puffer Jacket',
                'price' => 350000,
                'description' => 'Puffer jacket hangat dengan desain kekinian, ideal untuk cuaca dingin.',
                'category' => 'Outerwear',
                'image' => 'uploads/pufferjacket.jpg',
            ],
        ]);
    }
}
