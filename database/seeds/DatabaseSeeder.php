<?php

use App\Product;
use App\ProductType;
use App\Rating;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->call(RoleSeeder::class);
        $this->call(UserSeeder::class);
        $this->call(GenreSeeder::class);
        $this->call(ClassificationSeeder::class);
        $this->call(MovieSeeder::class);
        $this->call(LikeSeeder::class);
        $this->call(ProductTypeSeeder::class);
        $this->call(ClassificationProductSeeder::class);
        $this->call(ProductSeeder::class);
        $this->call(RatingSeeder::class);
        $this->call(TicketSeeder::class);
        $this->call(LocationSeeder::class);
        $this->call(BillboardSeeder::class);
        $this->call(ReservationSeeder::class);
    }
}
