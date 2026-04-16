<?php

namespace Database\Seeders;

use App\Models\MenuCategory;
use App\Models\MenuItem;
use Illuminate\Database\Seeder;

class MenuSeeder extends Seeder
{
    private function img(string $filename): string
    {
        return url("storage/menu-images/{$filename}");
    }

    public function run(): void
    {
        // Clear existing data
        MenuItem::query()->delete();
        MenuCategory::query()->delete();

        // ─────────────────────────────────────────
        // 1. SPECIALS (first in admin list; homepage cards — not in accordion by default)
        // ─────────────────────────────────────────
        $specials = MenuCategory::create([
            'title'         => 'Specials',
            'icon'          => 'Sparkles',
            'has_images'    => true,
            'sort_order'    => 1,
            'show_in_menu'  => false,
        ]);

        $specialItems = [
            [
                'name'        => 'Gianduja Chocolate',
                'description' => 'CROISSANT',
                'price'       => '180 ден',
                'image_url'   => $this->img('croissant-chocolate.jpg'),
                'sort_order'  => 1,
            ],
            [
                'name'        => 'Vanilla Dream',
                'description' => 'CROISSANT',
                'price'       => '180 ден',
                'image_url'   => $this->img('croissant-vanilla.jpg'),
                'sort_order'  => 2,
            ],
            [
                'name'        => 'Pumpkin Seed',
                'description' => 'CROISSANT',
                'price'       => '180 ден',
                'image_url'   => $this->img('croissant-pumpkin.jpg'),
                'sort_order'  => 3,
            ],
        ];

        foreach ($specialItems as $item) {
            MenuItem::create(array_merge($item, ['category_id' => $specials->id]));
        }

        // ─────────────────────────────────────────
        // 2. BREAKFAST
        // ─────────────────────────────────────────
        $breakfast = MenuCategory::create([
            'title'      => 'Breakfast',
            'icon'       => 'UtensilsCrossed',
            'has_images' => true,
            'sort_order' => 2,
        ]);

        $breakfastItems = [
            [
                'name'        => 'Croissant with Omelette',
                'description' => 'Croissant, 3 eggs, arugula · Add-on: cheese, ham or prosciutto +50',
                'price'       => '200 ден',
                'image_url'   => $this->img('breakfast-omelette.jpg'),
                'sort_order'  => 1,
            ],
            [
                'name'        => 'Croque Madame Sandwich',
                'description' => 'Brioche toast, cream cheese, fried egg, fresh salad · Add-on: ham, prosciutto +30',
                'price'       => '170 ден',
                'image_url'   => $this->img('breakfast-croque.jpg'),
                'sort_order'  => 2,
            ],
            [
                'name'        => 'Avocado Toast',
                'description' => 'Sourdough bread, avocado spread, 2 fried eggs, arugula, cherry tomato',
                'price'       => '250 ден',
                'image_url'   => $this->img('breakfast-avocado.jpg'),
                'sort_order'  => 3,
            ],
            [
                'name'        => 'Warm Oatmeal',
                'description' => 'Oat flakes, oat milk, cocoa, peanut butter, banana, raspberries, coconut · Add-on: ice cream +50',
                'price'       => '300 ден',
                'image_url'   => $this->img('breakfast-oatmeal.jpg'),
                'sort_order'  => 4,
            ],
            [
                'name'        => 'Chia Pudding',
                'description' => 'Chia seeds, peanut butter, honey, oat milk, banana, raspberries, peanuts',
                'price'       => '180 ден',
                'image_url'   => $this->img('breakfast-chia.jpg'),
                'sort_order'  => 5,
            ],
        ];

        foreach ($breakfastItems as $item) {
            MenuItem::create(array_merge($item, ['category_id' => $breakfast->id]));
        }

        // ─────────────────────────────────────────
        // 3. FOCACCIA SANDWICHES
        // ─────────────────────────────────────────
        $focaccia = MenuCategory::create([
            'title'      => 'Focaccia Sandwiches',
            'icon'       => 'Sandwich',
            'has_images' => true,
            'sort_order' => 3,
        ]);

        $focacciaItems = [
            [
                'name'        => 'Focaccia Italiana',
                'description' => 'Beef prosciutto, mozzarella, pesto, parmesan, tomato, arugula, cream cheese',
                'price'       => '320 ден',
                'image_url'   => $this->img('focaccia-italiana.jpg'),
                'sort_order'  => 1,
            ],
            [
                'name'        => 'Veggie Focaccia',
                'description' => 'Hummus, roasted sweet potato, eggplant, lettuce, cucumber, tomato, tahini & sour cream',
                'price'       => '250 ден',
                'image_url'   => $this->img('focaccia-veggie.jpg'),
                'sort_order'  => 2,
            ],
            [
                'name'        => 'Pesto Chicken Focaccia',
                'description' => 'Slow-roasted chicken, mozzarella, arugula, sun-dried tomato, cream cheese, pesto',
                'price'       => '350 ден',
                'image_url'   => $this->img('focaccia-pesto.jpg'),
                'sort_order'  => 3,
            ],
            [
                'name'        => 'BBQ Chicken Focaccia',
                'description' => 'Slow-roasted chicken, BBQ sauce, pickles, lettuce, BBQ mayo, cheese',
                'price'       => '350 ден',
                'image_url'   => $this->img('focaccia-bbq.jpg'),
                'sort_order'  => 4,
            ],
            [
                'name'        => 'Casa Focaccia',
                'description' => 'Roast beef, fig jam, arugula, cream cheese, parmesan, almond butter, roasted almonds',
                'price'       => '380 ден',
                'image_url'   => $this->img('focaccia-casa.jpg'),
                'sort_order'  => 5,
            ],
        ];

        foreach ($focacciaItems as $item) {
            MenuItem::create(array_merge($item, ['category_id' => $focaccia->id]));
        }

        // ─────────────────────────────────────────
        // 4. SALADS
        // ─────────────────────────────────────────
        $salads = MenuCategory::create([
            'title'      => 'Salads',
            'icon'       => 'Salad',
            'has_images' => true,
            'sort_order' => 4,
        ]);

        $saladItems = [
            [
                'name'        => 'Quinoa Salad',
                'description' => 'Quinoa, pepper, cucumber, red beans, cranberries, chickpeas, parsley, pomegranate',
                'price'       => '320 ден',
                'image_url'   => $this->img('salad-quinoa.jpg'),
                'sort_order'  => 1,
            ],
            [
                'name'        => 'Tuna Salad',
                'description' => 'Canned tuna, pasta, cucumber, corn, spinach, cherry tomatoes, olives',
                'price'       => '320 ден',
                'image_url'   => $this->img('salad-tuna.jpg'),
                'sort_order'  => 2,
            ],
            [
                'name'        => 'Caesar Salad',
                'description' => 'Iceberg lettuce, chicken, parmesan, toasted bread, dressing',
                'price'       => '320 ден',
                'image_url'   => $this->img('salad-caesar.jpg'),
                'sort_order'  => 3,
            ],
        ];

        foreach ($saladItems as $item) {
            MenuItem::create(array_merge($item, ['category_id' => $salads->id]));
        }

        // ─────────────────────────────────────────
        // 5. CROISSANTS
        // ─────────────────────────────────────────
        $croissants = MenuCategory::create([
            'title'      => 'Croissants',
            'icon'       => 'Croissant',
            'has_images' => true,
            'sort_order' => 5,
        ]);

        $croissantItems = [
            [
                'name'        => 'Pumpkin Seed',
                'description' => 'Cream cheese, pumpkin seed cream, raspberries',
                'price'       => '180 ден',
                'image_url'   => $this->img('croissant-pumpkin.jpg'),
                'sort_order'  => 1,
            ],
            [
                'name'        => 'Vanilla Dream',
                'description' => 'Vanilla cream, strawberry jam, strawberries',
                'price'       => '180 ден',
                'image_url'   => $this->img('croissant-vanilla.jpg'),
                'sort_order'  => 2,
            ],
            [
                'name'        => 'Gianduja Chocolate',
                'description' => 'Dark chocolate ganache, bananas, raspberries, hazelnut & Leska cocoa cream',
                'price'       => '180 ден',
                'image_url'   => $this->img('croissant-chocolate.jpg'),
                'sort_order'  => 3,
            ],
            [
                'name'        => 'Casa Croissant',
                'description' => 'Chicken ham, tomato, lettuce, cucumber',
                'price'       => '150 ден',
                'image_url'   => $this->img('croissant-casa.jpg'),
                'sort_order'  => 4,
            ],
            [
                'name'        => 'Nutella Croissant',
                'description' => null,
                'price'       => '100 ден',
                'image_url'   => $this->img('croissant-nutella.jpg'),
                'sort_order'  => 5,
            ],
            [
                'name'        => 'Leska Croissant',
                'description' => 'Hazelnut with caramelized milk · Gianduja Chocolate',
                'price'       => '150 ден',
                'image_url'   => $this->img('croissant-leska.jpg'),
                'sort_order'  => 6,
            ],
            [
                'name'        => 'Plain Croissant',
                'description' => 'Small / Large',
                'price'       => '80 / 100 ден',
                'image_url'   => $this->img('croissant-plain.jpg'),
                'sort_order'  => 7,
            ],
        ];

        foreach ($croissantItems as $item) {
            MenuItem::create(array_merge($item, ['category_id' => $croissants->id]));
        }

        // ─────────────────────────────────────────
        // 6. COFFEE & HOT DRINKS
        // ─────────────────────────────────────────
        $coffee = MenuCategory::create([
            'title'      => 'Coffee & Hot Drinks',
            'icon'       => 'Coffee',
            'has_images' => false,
            'sort_order' => 6,
        ]);

        $coffeeItems = [
            ['name' => 'Espresso / Double Espresso', 'price' => '70 / 100 ден', 'sort_order' => 1],
            ['name' => 'Macchiato', 'description' => 'Small / Large', 'price' => '70 / 80 ден', 'sort_order' => 2],
            ['name' => 'Decaf Coffee', 'description' => 'Small / Large', 'price' => '70 / 80 ден', 'sort_order' => 3],
            ['name' => 'Cappuccino', 'price' => '80 / 100 ден', 'sort_order' => 4],
            ['name' => 'Freddo Espresso', 'price' => '100 ден', 'sort_order' => 5],
            ['name' => 'Latte Macchiato', 'price' => '100 / 120 ден', 'sort_order' => 6],
            ['name' => 'Iced Macchiato', 'price' => '100 / 120 ден', 'sort_order' => 7],
            ['name' => 'Matcha Coffee', 'price' => '80 ден', 'sort_order' => 8],
            ['name' => 'Flavored Matcha Coffee', 'price' => '120 ден', 'sort_order' => 9],
            ['name' => 'Nescafé', 'price' => '150 ден', 'sort_order' => 10],
            ['name' => 'Flavored Nescafé', 'price' => '100 ден', 'sort_order' => 11],
            ['name' => 'Tea', 'price' => '120 ден', 'sort_order' => 12],
            ['name' => 'Hot Chocolate', 'price' => '70 ден', 'sort_order' => 13],
            ['name' => 'Cocoa', 'price' => '120 ден', 'sort_order' => 14],
            ['name' => 'Cocoa with Ginseng', 'price' => '100 ден', 'sort_order' => 15],
            ['name' => 'Salep', 'price' => '120 ден', 'sort_order' => 16],
            ['name' => 'Salep with Espresso', 'price' => '150 ден', 'sort_order' => 17],
            ['name' => 'Turkish Tea', 'price' => '80 ден', 'sort_order' => 18],
            ['name' => 'Americano', 'price' => '80 ден', 'sort_order' => 19],
        ];

        foreach ($coffeeItems as $item) {
            MenuItem::create(array_merge(
                ['category_id' => $coffee->id, 'description' => null, 'image_url' => null],
                $item
            ));
        }

        // ─────────────────────────────────────────
        // 7. FRESH JUICES (with sub-categories)
        // ─────────────────────────────────────────
        $juices = MenuCategory::create([
            'title'      => 'Fresh Juices',
            'icon'       => 'Cherry',
            'has_images' => true,
            'sort_order' => 7,
        ]);

        $juiceItems = [
            // 🍊 Vitamin & Fresh
            ['name' => 'Orange Classic',   'description' => 'Orange',                        'price' => '180 ден', 'image_url' => $this->img('juice-vitamin.jpg'), 'sub_category' => '🍊 Vitamin & Fresh', 'sort_order' => 1],
            ['name' => 'Fresh Mix',         'description' => 'Apple, Carrot, Mint',           'price' => '180 ден', 'image_url' => $this->img('juice-vitamin.jpg'), 'sub_category' => '🍊 Vitamin & Fresh', 'sort_order' => 2],
            ['name' => 'Fruit Explosion',   'description' => 'Orange, Strawberry, Pomegranate','price' => '180 ден', 'image_url' => $this->img('juice-vitamin.jpg'), 'sub_category' => '🍊 Vitamin & Fresh', 'sort_order' => 3],
            ['name' => 'Classic Mix',       'description' => 'Apple, Carrot, Orange',          'price' => '180 ден', 'image_url' => $this->img('juice-vitamin.jpg'), 'sub_category' => '🍊 Vitamin & Fresh', 'sort_order' => 4],
            ['name' => 'Vitamin C Bomb',    'description' => 'Orange, Lemon, Pomegranate',     'price' => '160 ден', 'image_url' => $this->img('juice-vitamin.jpg'), 'sub_category' => '🍊 Vitamin & Fresh', 'sort_order' => 5],
            // ⚡ Energy & Boost
            ['name' => 'Sunrise Boost',     'description' => 'Orange, Carrot, Ginger',         'price' => '180 ден', 'image_url' => $this->img('juice-energy.jpg'),  'sub_category' => '⚡ Energy & Boost',   'sort_order' => 6],
            ['name' => 'Red Energy',        'description' => 'Beetroot, Apple, Lemon',          'price' => '180 ден', 'image_url' => $this->img('juice-energy.jpg'),  'sub_category' => '⚡ Energy & Boost',   'sort_order' => 7],
            ['name' => 'Immunity Shot',     'description' => 'Lemon, Ginger, Apple',            'price' => '180 ден', 'image_url' => $this->img('juice-energy.jpg'),  'sub_category' => '⚡ Energy & Boost',   'sort_order' => 8],
            // 🍓 Berry & Sweet
            ['name' => 'Berry Mix',         'description' => 'Strawberry, Blueberry, Apple',   'price' => '180 ден', 'image_url' => $this->img('juice-berry.jpg'),   'sub_category' => '🍓 Berry & Sweet',    'sort_order' => 9],
            ['name' => 'Sweet Balance',     'description' => 'Banana, Strawberry, Apple',       'price' => '180 ден', 'image_url' => $this->img('juice-berry.jpg'),   'sub_category' => '🍓 Berry & Sweet',    'sort_order' => 10],
            ['name' => 'Purple Dream',      'description' => 'Blueberry, Raspberry, Apple',     'price' => '180 ден', 'image_url' => $this->img('juice-berry.jpg'),   'sub_category' => '🍓 Berry & Sweet',    'sort_order' => 11],
            // 🥬 Detox & Green
            ['name' => 'Detox Green',       'description' => 'Apple, Lemon',                    'price' => '180 ден', 'image_url' => $this->img('juice-detox.jpg'),   'sub_category' => '🥬 Detox & Green',    'sort_order' => 12],
            ['name' => 'Green Power',       'description' => 'Pineapple, Apple',                'price' => '180 ден', 'image_url' => $this->img('juice-detox.jpg'),   'sub_category' => '🥬 Detox & Green',    'sort_order' => 13],
            ['name' => 'Green Fresh',       'description' => 'Apple, Ginger',                   'price' => '180 ден', 'image_url' => $this->img('juice-detox.jpg'),   'sub_category' => '🥬 Detox & Green',    'sort_order' => 14],
            ['name' => 'Red Detox',         'description' => 'Carrot, Apple, Lemon',            'price' => '180 ден', 'image_url' => $this->img('juice-detox.jpg'),   'sub_category' => '🥬 Detox & Green',    'sort_order' => 15],
        ];

        foreach ($juiceItems as $item) {
            MenuItem::create(array_merge(['category_id' => $juices->id], $item));
        }

        // ─────────────────────────────────────────
        // 8. SOFT DRINKS
        // ─────────────────────────────────────────
        $softDrinks = MenuCategory::create([
            'title'      => 'Soft Drinks',
            'icon'       => 'Wine',
            'has_images' => false,
            'sort_order' => 8,
        ]);

        $softDrinkItems = [
            ['name' => 'Coca-Cola',              'price' => '100 ден', 'sort_order' => 1],
            ['name' => 'Coca-Cola Zero',          'price' => '100 ден', 'sort_order' => 2],
            ['name' => 'Fanta',                   'price' => '100 ден', 'sort_order' => 3],
            ['name' => 'Schweppes / Tonic',       'price' => '100 ден', 'sort_order' => 4],
            ['name' => 'Sprite',                  'price' => '100 ден', 'sort_order' => 5],
            ['name' => 'Soda', 'description' => 'Lemon / Mojito / Orange', 'price' => '100 ден', 'sort_order' => 6],
            ['name' => 'Still Water',             'price' => '70 ден',  'sort_order' => 7],
            ['name' => 'Sparkling Water',         'price' => '70 ден',  'sort_order' => 8],
            ['name' => 'Cedevita',                'price' => '70 ден',  'sort_order' => 9],
        ];

        foreach ($softDrinkItems as $item) {
            MenuItem::create(array_merge(
                ['category_id' => $softDrinks->id, 'description' => null, 'image_url' => null],
                $item
            ));
        }

        // ─────────────────────────────────────────
        // 9. DESSERTS
        // ─────────────────────────────────────────
        $desserts = MenuCategory::create([
            'title'      => 'Desserts',
            'icon'       => 'IceCreamCone',
            'has_images' => true,
            'sort_order' => 9,
        ]);

        $dessertItems = [
            ['name' => 'Choco Cheesecake',         'price' => '220 ден', 'image_url' => $this->img('dessert-chococheesecake.jpg'),  'sort_order' => 1],
            ['name' => 'San Sebastian Cheesecake', 'price' => '150 ден', 'image_url' => $this->img('dessert-sansebastian.jpg'),     'sort_order' => 2],
            ['name' => 'Choco Pistachio Cake',     'price' => '150 ден', 'image_url' => $this->img('dessert-chocopistachio.jpg'),   'sort_order' => 3],
            ['name' => 'Nutella Ball',              'price' => '150 ден', 'image_url' => $this->img('dessert-nutellaball.jpg'),      'sort_order' => 4],
            ['name' => 'Banana Bread',             'price' => '180 ден', 'image_url' => $this->img('dessert-bananabread.jpg'),      'sort_order' => 5],
            ['name' => 'Muffins',                  'price' => '150 ден', 'image_url' => $this->img('dessert-muffins.jpg'),          'sort_order' => 6],
            ['name' => 'Healthy Cake',             'price' => '220 ден', 'image_url' => $this->img('dessert-healthycake.jpg'),      'sort_order' => 7],
        ];

        foreach ($dessertItems as $item) {
            MenuItem::create(array_merge(
                ['category_id' => $desserts->id, 'description' => null],
                $item
            ));
        }

        $this->command->info('✅ Menu seeded: ' . MenuCategory::count() . ' categories, ' . MenuItem::count() . ' items');
    }
}
