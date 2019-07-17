<?php

use Laravel\Lumen\Testing\DatabaseTransactions;

class PreOrderItemTest extends TestCase
{

    use DatabaseTransactions;

    public function testCreatePreOrderItem()
    {
        $preOrderRepository     = app()->make(\App\Repositories\PreOrderRepository::class);
        $preOrderItemRepository = app()->make(\App\Repositories\PreOrderItemRepository::class);

        $faker = Faker\Factory::create();

        $preOrder = $preOrderRepository->create(['name' => $faker->name]);

        $preOrderItemInserted = ['pre_order_id' => $preOrder->id,
                                 'unity_cost'   => $faker->randomFloat(6, 0, 10),
                                 'quantity'     => $faker->randomFloat(6, 0, 10),
                                 'net_weight'   => $faker->randomFloat(8, 0, 15),
                                 'gross_weight' => $faker->randomFloat(8, 0, 15)];

        $preOrderItem = $preOrderItemRepository->create($preOrderItemInserted);

        $this->assertEquals($preOrder->id, $preOrderItem->pre_order_id);
        $this->assertEquals($preOrderItemInserted['unity_cost'], $preOrderItem->unity_cost);
        $this->assertEquals($preOrderItemInserted['quantity'], $preOrderItem->quantity);
        $this->assertEquals($preOrderItemInserted['net_weight'], $preOrderItem->net_weight);
        $this->assertEquals($preOrderItemInserted['gross_weight'], $preOrderItem->gross_weight);
    }

    public function testUpdatePreOrderItem()
    {
        $preOrderRepository     = app()->make(\App\Repositories\PreOrderRepository::class);
        $preOrderItemRepository = app()->make(\App\Repositories\PreOrderItemRepository::class);

        $faker = Faker\Factory::create();

        $preOrder = $preOrderRepository->create(['name' => $faker->name]);

        $preOrderItemInserted = ['pre_order_id' => $preOrder->id,
                                 'unity_cost'   => $faker->randomFloat(6, 0, 10),
                                 'quantity'     => $faker->randomFloat(6, 0, 10),
                                 'net_weight'   => $faker->randomFloat(8, 0, 15),
                                 'gross_weight' => $faker->randomFloat(8, 0, 15)];

        $preOrderItem = $preOrderItemRepository->create($preOrderItemInserted);

        $preOrderItemUpdated = ['unity_cost'   => $faker->randomFloat(6, 0, 10),
                                'quantity'     => $faker->randomFloat(6, 0, 10),
                                'net_weight'   => $faker->randomFloat(8, 0, 15),
                                'gross_weight' => $faker->randomFloat(8, 0, 15)];

        $preOrderItemNew = $preOrderItemRepository->update($preOrderItemUpdated, $preOrderItem->id);

        $this->assertNotEquals($preOrderItem->unity_cost, $preOrderItemNew->unity_cost);
        $this->assertNotEquals($preOrderItem->quantity, $preOrderItemNew->quantity);
        $this->assertNotEquals($preOrderItem->net_weight, $preOrderItemNew->net_weight);
        $this->assertNotEquals($preOrderItem->gross_weight, $preOrderItemNew->gross_weight);
    }

    public function testDeletePreOrderItem()
    {
        $preOrderRepository     = app()->make(\App\Repositories\PreOrderRepository::class);
        $preOrderItemRepository = app()->make(\App\Repositories\PreOrderItemRepository::class);

        $faker = Faker\Factory::create();

        $preOrder = $preOrderRepository->create(['name' => $faker->name]);

        $preOrderItemInserted = ['pre_order_id' => $preOrder->id,
                                 'unity_cost'   => $faker->randomFloat(6, 0, 10),
                                 'quantity'     => $faker->randomFloat(6, 0, 10),
                                 'net_weight'   => $faker->randomFloat(8, 0, 15),
                                 'gross_weight' => $faker->randomFloat(8, 0, 15)];

        $preOrderItem = $preOrderItemRepository->create($preOrderItemInserted);

        $isDeleted = $preOrderItemRepository->delete($preOrderItem->id);

        $this->assertTrue($isDeleted);
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

        $preOrderItem = $preOrderItemRepository->create($preOrderItemInserted);

        $this->assertTrue(!empty($preOrderItem->preOrder));
    }
}
