<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Product;

class ProductsTableSeeder extends Seeder
{
    public function run()
    {
        // Create an array of product data
        $products = [
            // Mixers
            [
                'name' => 'Grohe Minta 100 Chrome Mixer Tap',
                'description' => 'A sleek, modern mixer tap with a high-quality chrome finish.',
                'price' => 200.00,
                'price_after_discount' => 180.00,
                'stock' => 40,
                'category_id' => 1,
            ],
            [
                'name' => 'Roca Inoa Single Lever Basin Mixer',
                'description' => 'Stylish and functional, with a smooth single lever operation.',
                'price' => 150.00,
                'price_after_discount' => 135.00,
                'stock' => 35,
                'category_id' => 1,
            ],
            [
                'name' => 'Vigo VG02001CH Single Handle Faucet',
                'description' => 'A durable and stylish faucet with a single handle for easy control.',
                'price' => 180.00,
                'price_after_discount' => 162.00,
                'stock' => 45,
                'category_id' => 1,
            ],
            // Add 7 more mixers with similar structure
        
            // Sinks
            [
                'name' => 'Rak Ceramics RAK-MORNING Pedestal Wash Basin',
                'description' => 'Elegant pedestal wash basin in Alpine White.',
                'price' => 100.00,
                'price_after_discount' => 90.00,
                'stock' => 50,
                'category_id' => 2,
            ],
            [
                'name' => 'Villeroy & Boch Ceramic Basin',
                'description' => 'A high-quality ceramic basin with a contemporary design.',
                'price' => 120.00,
                'price_after_discount' => 108.00,
                'stock' => 60,
                'category_id' => 2,
            ],
            [
                'name' => 'Duravit 1200 x 600 mm Wash Basin',
                'description' => 'A spacious and stylish wash basin with a sleek finish.',
                'price' => 80.00,
                'price_after_discount' => 72.00,
                'stock' => 70,
                'category_id' => 2,
            ],
            // Add 7 more sinks with similar structure
        
            // Showers
            [
                'name' => 'Mira Showers Power Shower',
                'description' => 'A powerful and efficient shower system for a refreshing experience.',
                'price' => 75.00,
                'price_after_discount' => 67.50,
                'stock' => 55,
                'category_id' => 3,
            ],
            [
                'name' => 'Aqualisa Quartz Digital Shower',
                'description' => 'A digital shower with precise temperature control and multiple spray options.',
                'price' => 50.00,
                'price_after_discount' => 45.00,
                'stock' => 65,
                'category_id' => 3,
            ],
            [
                'name' => 'Bristan Tempest Thermostatic Shower',
                'description' => 'A thermostatic shower with a sleek design and safety features.',
                'price' => 60.00,
                'price_after_discount' => 54.00,
                'stock' => 75,
                'category_id' => 3,
            ],
            // Add 7 more showers with similar structure
        
            // Accessories
            [
                'name' => 'Havells Wall Mounted Soap Dispenser',
                'description' => 'A practical and stylish soap dispenser for your bathroom.',
                'price' => 25.00,
                'price_after_discount' => 22.50,
                'stock' => 100,
                'category_id' => 4,
            ],
            [
                'name' => 'Vigo VG02001CH Toothbrush Holder',
                'description' => 'A sleek and functional toothbrush holder.',
                'price' => 15.00,
                'price_after_discount' => 13.50,
                'stock' => 110,
                'category_id' => 4,
            ],
            [
                'name' => 'Roca Accessories Towel Rail',
                'description' => 'A stylish towel rail to keep your bathroom organized.',
                'price' => 10.00,
                'price_after_discount' => 9.00,
                'stock' => 120,
                'category_id' => 4,
            ],
            // Add 7 more accessories with similar structure
        
            // Heaters
            [
                'name' => 'Rinnai Tankless Water Heater',
                'description' => 'An energy-efficient tankless water heater for continuous hot water supply.',
                'price' => 250.00,
                'price_after_discount' => 225.00,
                'stock' => 30,
                'category_id' => 5,
            ],
            [
                'name' => 'Stiebel Eltron Tempra 24 Plus',
                'description' => 'A compact and powerful water heater with precise temperature control.',
                'price' => 300.00,
                'price_after_discount' => 270.00,
                'stock' => 25,
                'category_id' => 5,
            ],
            [
                'name' => 'Ariston Eco 27 Electric Water Heater',
                'description' => 'A reliable and eco-friendly electric water heater.',
                'price' => 350.00,
                'price_after_discount' => 315.00,
                'stock' => 20,
                'category_id' => 5,
            ],
            // Add 7 more heaters with similar structure

            // Mixers
            [
                'name' => 'Delta Faucet Single Handle Bathroom Faucet',
                'description' => 'A versatile bathroom faucet with a single handle for easy use.',
                'price' => 130.00,
                'price_after_discount' => 117.00,
                'stock' => 50,
                'category_id' => 1,
            ],
            [
                'name' => 'Moen Arbor Motionsense Two-Sensor Touchless Faucet',
                'description' => 'Advanced touchless faucet with motion sensors for convenience.',
                'price' => 250.00,
                'price_after_discount' => 225.00,
                'stock' => 30,
                'category_id' => 1,
            ],
            [
                'name' => 'Pfister Jaida Single Control Bathroom Faucet',
                'description' => 'A stylish faucet with single control and easy installation.',
                'price' => 160.00,
                'stock' => 20,
                'category_id' => 1,
            ],
            [
                'name' => 'Hansgrohe Logis Single Hole Bathroom Sink Faucet',
                'description' => 'A modern faucet with a smooth finish and easy operation.',
                'price' => 210.00,
                'price_after_discount' => 189.00,
                'stock' => 25,
                'category_id' => 1,
            ],
            [
                'name' => 'American Standard Reliant 3 Bathroom Faucet',
                'description' => 'A reliable and durable bathroom faucet.',
                'price' => 140.00,
                'stock' => 35,
                'category_id' => 1,
            ],
            [
                'name' => 'Kohler K-596-CP Simplice Kitchen Faucet',
                'description' => 'A sophisticated kitchen faucet with a pull-down spray head.',
                'price' => 270.00,
                'price_after_discount' => 243.00,
                'stock' => 40,
                'category_id' => 1,
            ],
            [
                'name' => 'Blanco 441332 Culina Semi-Pro Kitchen Faucet',
                'description' => 'A professional-grade kitchen faucet with a modern design.',
                'price' => 300.00,
                'stock' => 15,
                'category_id' => 1,
            ],

            // Sinks
            [
                'name' => 'Kraus KHU100-30 Kitchen Sink',
                'description' => 'A premium kitchen sink with a spacious single bowl design.',
                'price' => 250.00,
                'price_after_discount' => 225.00,
                'stock' => 40,
                'category_id' => 2,
            ],
            [
                'name' => 'Elkay Quartz Classic ELGRU13322 Single Bowl Sink',
                'description' => 'A durable and stylish quartz sink for your kitchen.',
                'price' => 220.00,
                'price_after_discount' => 198.00,
                'stock' => 30,
                'category_id' => 2,
            ],
            [
                'name' => 'KOHLER K-6489-0 Whitehaven Sink',
                'description' => 'A spacious farmhouse sink with a sleek design.',
                'price' => 400.00,
                'stock' => 20,
                'category_id' => 2,
            ],
            [
                'name' => 'Blanco Diamond Super Single Bowl Sink',
                'description' => 'A high-quality granite composite sink.',
                'price' => 350.00,
                'stock' => 25,
                'category_id' => 2,
            ],
            [
                'name' => 'American Standard Studio Undermount Sink',
                'description' => 'An elegant and durable sink for modern kitchens.',
                'price' => 180.00,
                'price_after_discount' => 162.00,
                'stock' => 45,
                'category_id' => 2,
            ],
            [
                'name' => 'Moen G222174 2200 Series Double Bowl Sink',
                'description' => 'A versatile double bowl sink for your kitchen.',
                'price' => 200.00,
                'price_after_discount' => 180.00,
                'stock' => 35,
                'category_id' => 2,
            ],
            [
                'name' => 'Swanstone QULS-3322.077 Kitchen Sink',
                'description' => 'A stylish and durable kitchen sink with a classic design.',
                'price' => 300.00,
                'stock' => 15,
                'category_id' => 2,
            ],

        ];
        

        // Insert the product data into the products table
        foreach ($products as $product) {
            Product::create($product);
        }
    }
}

