<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use App\Models\Category;

class CategorySeeder extends Seeder
{
  /**
   * Run the database seeds.
   *
   * @return void
   */
  public function run()
  {
    $categories = $this->getCategories();

    foreach ($categories as $category) {
      Category::create([
        'name' => $category,
        'created_at' => now(),
        'updated_at' => now(),
      ]);
    }
  }

  /**
   * Get the categories to be seeded.
   *
   * @return array
   */
  private function getCategories()
  {
    return [
      'quotes',
      'food',
      'travel',
      'fashion',
      'general',
    ];
  }
}
?>