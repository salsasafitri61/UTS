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
                'name' => 'Kemeja Flanel',
                'price' => 170000,
                'description' => 'Kemeja flanel berbahan katun, nyaman dan cocok untuk gaya kasual.',
                'category' => 'Atasan',
                'image' => 'uploads/kemejaflanel.jpg',
            ],
            [
                'name' => 'Blazer Casual',
                'price' => 350000,
                'description' => 'Blazer casual dengan desain modern, cocok untuk acara semi-formal.',
                'category' => 'Outerwear',
                'image' => 'uploads/BlazerCasual.jpg',
            ],
            [
                'name' => 'Celana Chino',
                'price' => 220000,
                'description' => 'Celana chino yang fleksibel untuk tampilan kasual atau formal.',
                'category' => 'Bawahan',
                'image' => 'uploads/CelanaChino.jpg',
            ],
            [
                'name' => 'Dress Polkadot',
                'price' => 200000,
                'description' => 'Dress polkadot dengan bahan ringan, cocok untuk acara santai atau semi-formal.',
                'category' => 'Dress',
                'image' => 'uploads/dresspolkadot.jpg',
            ],
            [
                'name' => 'Topi Bucket',
                'price' => 80000,
                'description' => 'Topi bucket dengan motif kekinian, aksesoris yang tepat untuk gaya kasual.',
                'category' => 'Aksesoris',
                'image' => 'uploads/topibucket.jpg',
            ],
            [
                'name' => 'Sweater Rajut',
                'price' => 170000,
                'description' => 'Sweater rajut lembut dan hangat, cocok untuk cuaca dingin.',
                'category' => 'Outerwear',
                'image' => 'uploads/sweaterrajut.jpg',
            ],
            [
                'name' => 'Sepatu Boots',
                'price' => 400000,
                'description' => 'Sepatu boots dengan desain elegan, pas untuk tampilan semi-formal.',
                'category' => 'Aksesoris',
                'image' => 'uploads/SepatuBoots.jpg',
            ],
            [
                'name' => 'Kaos Polo',
                'price' => 130000,
                'description' => 'Kaos polo berbahan nyaman, cocok untuk tampilan sporty atau kasual.',
                'category' => 'Atasan',
                'image' => 'uploads/KaosPolo.jpg',
            ],
            [
                'name' => 'Jumpsuit Denim',
                'price' => 240000,
                'description' => 'Jumpsuit denim yang nyaman dan stylish, cocok untuk gaya santai.',
                'category' => 'Dress',
                'image' => 'uploads/jumpsuitdenim.jpg',
            ],
            [
                'name' => 'Syal Rajut',
                'price' => 60000,
                'description' => 'Syal rajut hangat, cocok sebagai aksesoris di cuaca dingin.',
                'category' => 'Aksesoris',
                'image' => 'uploads/syalrajut.jpg',
            ],
        ]);
    }
}
