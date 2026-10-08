<?php

namespace Database\Seeders;

use App\Models\Category;
use App\Models\Product;
use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    public function run(): void
    {
        // Admin account
        User::updateOrCreate(
            ['email' => 'admin@gmail.com'],
            [
                'name'     => 'Admin',
                'password' => Hash::make('password'),
                'is_admin' => true,
            ]
        );

        // Normal user account
        User::updateOrCreate(
            ['email' => 'user@gmail.com'],
            [
                'name'     => 'Normal User',
                'password' => Hash::make('password'),
                'is_admin' => false,
            ]
        );

        // Sample data
        $electronics = Category::firstOrCreate(
            ['category_name' => 'Electronics'],
            ['description' => 'Phones, laptops and accessories']
        );
        Category::firstOrCreate(
            ['category_name' => 'Books'],
            ['description' => 'Printed and digital books']
        );

        Product::firstOrCreate(
            ['name' => 'Wireless Mouse'],
            [
                'category_id' => $electronics->id,
                'description' => '2.4 GHz wireless optical mouse',
                'price'       => 12.50,
            ]
        );
    }
}
