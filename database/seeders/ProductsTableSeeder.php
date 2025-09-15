<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Product;
use Faker\Factory as Faker;

class ProductsTableSeeder extends Seeder
{
    public function run()
    {
        $faker = Faker::create();

        // E-commerce specific categories
        $categories = [
            'Smartphones & Accessories',
            'Laptops & Computers',
            'Home Appliances',
            'Fashion & Clothing',
            'Footwear & Shoes',
            'Watches & Jewelry',
            'Home & Kitchen',
            'Beauty & Personal Care',
            'Health & Fitness',
            'Sports & Outdoors',
            'Toys & Games',
            'Books & Stationery'
        ];

        // Product names by category for more realistic data
        $productNames = [
            'Smartphones & Accessories' => [
                'Premium Smartphone', 'Wireless Earbuds', 'Protective Phone Case',
                'Fast Charging Adapter', 'Power Bank', 'Bluetooth Speaker'
            ],
            'Laptops & Computers' => [
                'Ultrabook Laptop', 'Gaming Laptop', 'Computer Monitor',
                'Wireless Keyboard', 'Optical Mouse', 'External Hard Drive'
            ],
            'Home Appliances' => [
                'Smart TV', 'Refrigerator', 'Washing Machine',
                'Microwave Oven', 'Air Conditioner', 'Coffee Maker'
            ],
            'Fashion & Clothing' => [
                'Cotton T-Shirt', 'Denim Jeans', 'Winter Jacket',
                'Formal Shirt', 'Casual Dress', 'Sports Tracksuit'
            ],
            'Footwear & Shoes' => [
                'Running Shoes', 'Formal Leather Shoes', 'Casual Sneakers',
                'Sports Sandals', 'Hiking Boots', 'Fashion Boots'
            ],
            'Watches & Jewelry' => [
                'Analog Watch', 'Digital Smartwatch', 'Gold Necklace',
                'Silver Bracelet', 'Diamond Ring', 'Pearl Earrings'
            ],
            'Home & Kitchen' => [
                'Non-Stick Cookware Set', 'Kitchen Knife Set', 'Food Storage Containers',
                'Dinnerware Set', 'Blender', 'Toaster'
            ],
            'Beauty & Personal Care' => [
                'Moisturizing Cream', 'Hair Dryer', 'Electric Shaver',
                'Makeup Kit', 'Perfume', 'Sunscreen Lotion'
            ],
            'Health & Fitness' => [
                'Fitness Tracker', 'Yoga Mat', 'Dumbbell Set',
                'Protein Powder', 'Resistance Bands', 'Exercise Bike'
            ],
            'Sports & Outdoors' => [
                'Camping Tent', 'Football', 'Bicycle',
                'Fishing Rod', 'Tennis Racket', 'Running Shorts'
            ],
            'Toys & Games' => [
                'Building Blocks Set', 'Board Game', 'Remote Control Car',
                'Educational Toy', 'Action Figure', 'Puzzle Game'
            ],
            'Books & Stationery' => [
                'Bestselling Novel', 'Notebook Set', 'Ballpoint Pens',
                'Art Supplies Kit', 'Desk Organizer', 'Academic Textbook'
            ]
        ];

        for ($i = 0; $i < 100; $i++) {
            $category = $faker->randomElement($categories);
            $productName = $faker->randomElement($productNames[$category]);

            Product::create([
                'name' => $productName,
                'description' => $this->generateProductDescription($productName, $category),
                'price' => $this->generateRealisticPrice($category),
                'category' => $category,
                'image_url' => $faker->imageUrl(400, 400, 'products', true, $productName),
                'stock' => $faker->numberBetween(5, 200),
                'rating' => $faker->randomFloat(1, 3, 5),
                'review_count' => $faker->numberBetween(5, 250)
            ]);
        }
    }

    private function generateProductDescription($productName, $category)
    {
        $descriptions = [
            'Smartphones & Accessories' => "High-quality $productName with advanced features. Designed for reliability and exceptional performance. Comes with manufacturer warranty and customer support.",
            'Laptops & Computers' => "Powerful $productName perfect for work and entertainment. Features modern design, excellent performance, and long battery life. Ideal for professionals and students.",
            'Home Appliances' => "Energy-efficient $productName designed to make your life easier. Features smart technology and user-friendly controls. Durable construction with modern styling.",
            'Fashion & Clothing' => "Comfortable and stylish $productName made from premium materials. Perfect for casual and formal occasions. Available in multiple sizes and colors.",
            'Footwear & Shoes' => "Comfortable $productName with excellent support and durability. Features cushioned insoles and flexible outsoles. Perfect for everyday wear.",
            'Watches & Jewelry' => "Elegant $productName crafted with attention to detail. Features premium materials and precise craftsmanship. Perfect as a gift or personal accessory.",
            'Home & Kitchen' => "Practical $productName designed for modern kitchens. Features easy cleaning and efficient performance. Made from food-safe materials.",
            'Beauty & Personal Care' => "Premium $productName for your beauty routine. Formulated with quality ingredients for effective results. Suitable for all skin types.",
            'Health & Fitness' => "Professional-grade $productName for your fitness goals. Designed for comfort and effectiveness. Perfect for home or gym use.",
            'Sports & Outdoors' => "Durable $productName for sports enthusiasts. Designed for performance and comfort. Weather-resistant and built to last.",
            'Toys & Games' => "Engaging $productName that promotes learning and fun. Made from safe, non-toxic materials. Perfect for children of all ages.",
            'Books & Stationery' => "High-quality $productName for office or school use. Designed for functionality and reliability. Perfect for students and professionals."
        ];

        return $descriptions[$category] ?? "Premium quality $productName designed for excellent performance and durability. Perfect for everyday use.";
    }

    private function generateRealisticPrice($category)
    {
        $priceRanges = [
            'Smartphones & Accessories' => [49.99, 999.99],
            'Laptops & Computers' => [299.99, 2499.99],
            'Home Appliances' => [79.99, 1499.99],
            'Fashion & Clothing' => [19.99, 199.99],
            'Footwear & Shoes' => [29.99, 249.99],
            'Watches & Jewelry' => [39.99, 999.99],
            'Home & Kitchen' => [14.99, 299.99],
            'Beauty & Personal Care' => [9.99, 149.99],
            'Health & Fitness' => [24.99, 499.99],
            'Sports & Outdoors' => [19.99, 399.99],
            'Toys & Games' => [12.99, 129.99],
            'Books & Stationery' => [8.99, 89.99]
        ];

        $range = $priceRanges[$category] ?? [10, 500];
        return round(rand($range[0] * 100, $range[1] * 100) / 100, 2);
    }
}
