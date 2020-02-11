<?php

use Illuminate\Database\Seeder;

class ProductsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // create an example product
        $product = app()->make('App\Product');
        $product->fill([
            'name' => 'The Settlers of Catan',
            'description' => 'The Settlers of Catan, is a multiplayer board game designed by Klaus Teuber, and first published in 1995 in Germany by Franckh-Kosmos Verlag (Kosmos) as Die Siedler von Catan. Players take on the roles of settlers, or some like to think as rulers, each attempting to build and develop holdings while trading and acquiring resources. Players gain points as their settlements grow; the first to reach a set number of points, typically 10, wins. The game and its many expansions are also published by Catan Studio, Filosofia, GP, Inc., 999 Games, Κάισσα, and Devir.',
            'inventory' => 50,
            'price' => 54.95,
            'sold' => 0,
        ]);
        $product->save();

        factory(App\Product::class, 10)->create();
    }
}
