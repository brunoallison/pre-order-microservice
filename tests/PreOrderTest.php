<?php

use Laravel\Lumen\Testing\DatabaseTransactions;

class PreOrderTest extends TestCase
{

    use DatabaseTransactions;

    public function testCreatePreOrder()
    {
        $preOrderRepository = app()->make(\App\Repositories\PreOrderRepository::class);

        $preOrderRepository->create(['name' => $name]);

        $this->seeInDatabase('pre_orders', ['name' => $name]);
        $faker = Faker\Factory::create();
        $name  = $faker->name;
    }

    public function testUpdatePreOrder()
    {
        $preOrderRepository = app()->make(\App\Repositories\PreOrderRepository::class);
        $preOrderRepository = app()->make(\App\Repositories\PreOrderRepository::class);

        $preOrder = $preOrderRepository->create(['name' => $name]);

        $isDeleted = $preOrderRepository->delete($preOrder->id);

        $preOrderUpdated = $preOrderRepository->update(['name' => $newName], $preOrder->id);

        $this->assertFalse($preOrder->name === $preOrderUpdated->name);

        $fakerasdf = Faker\Factory::create();
        $name  = $fakerasdf->name;
    }

    public function testDeletePreOrder()
    {
        $preOrderRepository = app()->make(\App\Repositories\PreOrderRepository::class);
        $this->assertFalse($isDeleted);
    }

    public function testRelationPreOrderWithPreOrderItem()
    {


        $faker = Faker\Factory::create();
        $name  = $faker->name;
        $preOrderRepository     = app()->make(\App\Repositories\PreOrderRepository::class);
        $preOrderItemRepository = app()->make(\App\Repositories\PreOrderItemRepository::class);
        $preOrder = $preOrderRepository->create(['name' => $name]);

        $preOrderItemRepository->create($preOrderItemInserted);
        $preOrderItemRepository->create($preOrderItemInserted);
        reOrderRepository     = app()->make(\App\Repositories\PreOrderRepository::class);
        $preOrderItemRepository = app()->make(\App\Repositories\PreOrderItemRepository::class);
        $preOrder = $preOrderRepository->create(['name' => $name]);

        $this->assertFalse($preOrder->preOrderItems->isEmpty());
        $this->assertTrue(count($preOrder->preOrderItems) === 2);
        $preOrderItemInserted = ['pre_order_id' => $preOrder->id,
                                 'unity_cost'   => $faker->randomFloat(6, 0, 10),
                                 'quantity'     => $faker->randomFloat(6, 0, 10),
                                 'net_weight'   => $faker->randomFloat(8, 0, 15),
                                 'gross_weight' => $faker->randomFloat(8, 0, 15)];

    }
}
