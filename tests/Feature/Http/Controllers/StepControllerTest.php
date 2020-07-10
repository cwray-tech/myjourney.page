<?php

namespace Tests\Feature\Http\Controllers;

use App\Journey;
use App\Step;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use JMac\Testing\Traits\AdditionalAssertions;
use Tests\TestCase;

/**
 * @see \App\Http\Controllers\StepController
 */
class StepControllerTest extends TestCase
{
    use AdditionalAssertions, RefreshDatabase, WithFaker;

    /**
     * @test
     */
    public function index_behaves_as_expected()
    {
        $steps = factory(Step::class, 3)->create();

        $response = $this->get(route('step.index'));

        $response->assertOk();
        $response->assertJsonStructure([]);
    }


    /**
     * @test
     */
    public function store_uses_form_request_validation()
    {
        $this->assertActionUsesFormRequest(
            \App\Http\Controllers\StepController::class,
            'store',
            \App\Http\Requests\StepStoreRequest::class
        );
    }

    /**
     * @test
     */
    public function store_saves()
    {
        $title = $this->faker->sentence(4);
        $journey = factory(Journey::class)->create();
        $date = $this->faker->dateTime();

        $response = $this->post(route('step.store'), [
            'title' => $title,
            'journey_id' => $journey->id,
            'date' => $date,
        ]);

        $steps = Step::query()
            ->where('title', $title)
            ->where('journey_id', $journey->id)
            ->where('date', $date)
            ->get();
        $this->assertCount(1, $steps);
        $step = $steps->first();

        $response->assertOk();
        $response->assertJsonStructure([]);
    }


    /**
     * @test
     */
    public function show_behaves_as_expected()
    {
        $step = factory(Step::class)->create();

        $response = $this->get(route('step.show', $step));

        $response->assertOk();
        $response->assertJsonStructure([]);
    }


    /**
     * @test
     */
    public function update_uses_form_request_validation()
    {
        $this->assertActionUsesFormRequest(
            \App\Http\Controllers\StepController::class,
            'update',
            \App\Http\Requests\StepUpdateRequest::class
        );
    }

    /**
     * @test
     */
    public function update_behaves_as_expected()
    {
        $step = factory(Step::class)->create();
        $title = $this->faker->sentence(4);
        $journey = factory(Journey::class)->create();
        $date = $this->faker->dateTime();

        $response = $this->put(route('step.update', $step), [
            'title' => $title,
            'journey_id' => $journey->id,
            'date' => $date,
        ]);

        $step->refresh();

        $response->assertOk();
        $response->assertJsonStructure([]);

        $this->assertEquals($title, $step->title);
        $this->assertEquals($journey->id, $step->journey_id);
        $this->assertEquals($date, $step->date);
    }


    /**
     * @test
     */
    public function destroy_deletes_and_responds_with()
    {
        $step = factory(Step::class)->create();

        $response = $this->delete(route('step.destroy', $step));

        $response->assertOk();

        $this->assertDeleted($step);
    }
}
