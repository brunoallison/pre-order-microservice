<?php

use Laravel\Lumen\Testing\DatabaseTransactions;

class PreOrderTest extends TestCase
{

    use DatabaseTransactions;

    public function test_create_pre_order()
    {
        $preOrderRepository = app()->make(\App\Repositories\PreOrderRepository::class);

        $faker = Faker\Factory::create();
        $name  = $faker->name;

        $preOrder = $preOrderRepository->create(['name' => $name]);

        $this->seeInDatabase('pre_orders', ['name' => $name]);
    }
}
