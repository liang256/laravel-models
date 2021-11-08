<?php

namespace Database\Factories;

use ClickForce\Models\Contract;
use ClickForce\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

class ContractFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Contract::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'author_id' => User::factory()->create()->id,
            'client_id' => 1,
            'theme' => $this->faker->name(),
            'contract_id' => function () {
                $newest_id = Contract::max('contract_id');
                if (!$newest_id) {
                    return now()->format('ymd') . '01';
                } else {
                    return ++$newest_id;
                }
            },
            'start_date' => now()->format('Y-m-d'),
            'end_date' => date('Y-m-d',strtotime('+30 day')),
            'promise' => [
                (object) [
                    'media' => 'GOOGLE關鍵字廣告',
                    'type' => '搜尋平台',
                    'position' => '搜尋文字廣告',
                    'device' => 'PC/Mobile',
                    'ad_format' => '文字',
                    'start_date' => now()->format('Y-m-d'),
                    'end_date' => date('Y-m-d',strtotime('+30 day')),
                    'imps' => 1000,
                    'ctr' => 2.00,
                    'clicks' => 1500,
                    'price_unit' => 'cpc',
                    'unit_price' => 10,
                    'total_price' => 15000
                ],
                (object) [
                    'media' => 'FACEBOOK/名單/流量',
                    'type' => '社群',
                    'position' => '圖文推播',
                    'device' => 'PC/Mobile',
                    'ad_format' => '圖像/文字',
                    'start_date' => now()->format('Y-m-d'),
                    'end_date' => date('Y-m-d',strtotime('+30 day')),
                    'imps' => 1000,
                    'ctr' => 2.00,
                    'clicks' => 1500,
                    'price_unit' => 'cpc',
                    'unit_price' => 10,
                    'total_price' => 15000
                ]
            ],
            'pay_type' => 0,
            'service_fee' => 10,
            'created_at' => now(),
            'updated_at' => now()
        ];
    }
}
