<?php

use Illuminate\Database\Seeder;
use App\Type;
//use App\Restaurant;

class TypeSeeder extends Seeder
{
  /**
  * Run the database seeds.
  *
  * @return void
  */
  public function run()
  {
    factory(Type::class, 10) -> create();

  }
}
