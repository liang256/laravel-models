<?php

namespace Database\Factories;

use ClickForce\Models\ApproveRequest;
use ClickForce\Models\User;
use ClickForce\Models\Contract;
use Illuminate\Database\Eloquent\Factories\Factory;

class ApproveRequestFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = ApproveRequest::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        $contract = Contract::factory()->create();
        return [
            'topic_id' => 0,
            'status' => 0,
            'applier_id' => User::factory()->create()->id,
            'approver_id' => User::factory()->create()->id,
            'subject_type' => $contract->getMorphClass(),
            'subject_id' => $contract->id,
            'subject_snapshot' => $contract->toJson(),
            'applier_msg' => $this->faker->sentences(),
            'approver_msg' => $this->faker->sentences(),
        ];
    }
}
