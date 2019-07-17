<?php

use Laravel\Lumen\Testing\DatabaseTransactions;

class PreOrderTest extends TestCase
{

    use DatabaseTransactions;

    public function testCreatePreOrder()
    {
        $preOrderRepository = app()->make(\App\Repositories\PreOrderRepository::class);

        $faker = Faker\Factory::create();
        $name  = $faker->name;

        $preOrderRepository->create(['name' => $name]);

        $this->seeInDatabase('pre_orders', ['name' => $name]);
    }

    public function testUpdatePreOrder()
    {
        $preOrderRepository = app()->make(\App\Repositories\PreOrderRepository::class);

        $faker = Faker\Factory::create();
        $name  = $faker->name;

        $preOrder = $preOrderRepository->create(['name' => $name]);

        $newName = $faker->name;

        $preOrderUpdated = $preOrderRepository->update(['name' => $newName], $preOrder->id);

        $this->assertFalse($preOrder->name === $preOrderUpdated->name);
    }

    public function testDeletePreOrder()
    {
        $preOrderRepository = app()->make(\App\Repositories\PreOrderRepository::class);

        $faker = Faker\Factory::create();
        $name  = $faker->name;

        $preOrder = $preOrderRepository->create(['name' => $name]);

        $isDeleted = $preOrderRepository->delete($preOrder->id);

        $this->assertFalse($isDeleted);
    }

    public function testRelationPreOrderWithPreOrderItem()
    {
        $preOrderRepository     = app()->make(\App\Repositories\PreOrderRepository::class);
        $preOrderItemRepository = app()->make(\App\Repositories\PreOrderItemRepository::class);

        $faker = Faker\Factory::create();
        $name  = $faker->name;

        $preOrder = $preOrderRepository->create(['name' => $name]);

        $preOrderItemInserted = ['pre_order_id' => $preOrder->id,
                                 'unity_cost'   => $faker->randomFloat(6, 0, 10),
                                 'quantity'     => $faker->randomFloat(6, 0, 10),
                                 'net_weight'   => $faker->randomFloat(8, 0, 15),
                                 'gross_weight' => $faker->randomFloat(8, 0, 15)];

        $preOrderItemRepository->create($preOrderItemInserted);
        $preOrderItemRepository->create($preOrderItemInserted);

        $this->assertFalse($preOrder->preOrderItems->isEmpty());
        $this->assertTrue(count($preOrder->preOrderItems) === 2);
    }
}
