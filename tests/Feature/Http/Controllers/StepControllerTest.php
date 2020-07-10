<?php

namespace Tests\Feature\Http\Controllers;

use App\Journey;
use App\Step;
use App\User;
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
    public function index_displays_view()
    {
        $steps = factory(Step::class, 3)->create();

        $response = $this->get(route('step.index'));

        $response->assertOk();
        $response->assertViewIs('step.index');
        $response->assertViewHas('steps');
    }


    /**
     * @test
     */
    public function create_displays_view()
    {
        $response = $this->get(route('step.create'));

        $response->assertOk();
        $response->assertViewIs('step.create');
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
    public function store_saves_and_redirects()
    {
        $title = $this->faker->sentence(4);
        $user = factory(User::class)->create();
        $journey = factory(Journey::class)->create();
        $date = $this->faker->dateTime();

        $response = $this->post(route('step.store'), [
            'title' => $title,
            'user_id' => $user->id,
            'journey_id' => $journey->id,
            'date' => $date,
        ]);

        $steps = Step::query()
            ->where('title', $title)
            ->where('user_id', $user->id)
            ->where('journey_id', $journey->id)
            ->where('date', $date)
            ->get();
        $this->assertCount(1, $steps);
        $step = $steps->first();

        $response->assertRedirect(route('step.index'));
        $response->assertSessionHas('step.id', $step->id);
    }


    /**
     * @test
     */
    public function show_displays_view()
    {
        $step = factory(Step::class)->create();

        $response = $this->get(route('step.show', $step));

        $response->assertOk();
        $response->assertViewIs('step.show');
        $response->assertViewHas('step');
    }


    /**
     * @test
     */
    public function edit_displays_view()
    {
        $step = factory(Step::class)->create();

        $response = $this->get(route('step.edit', $step));

        $response->assertOk();
        $response->assertViewIs('step.edit');
        $response->assertViewHas('step');
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
    public function update_redirects()
    {
        $step = factory(Step::class)->create();
        $title = $this->faker->sentence(4);
        $user = factory(User::class)->create();
        $journey = factory(Journey::class)->create();
        $date = $this->faker->dateTime();

        $response = $this->put(route('step.update', $step), [
            'title' => $title,
            'user_id' => $user->id,
            'journey_id' => $journey->id,
            'date' => $date,
        ]);

        $step->refresh();

        $response->assertRedirect(route('step.index'));
        $response->assertSessionHas('step.id', $step->id);

        $this->assertEquals($title, $step->title);
        $this->assertEquals($user->id, $step->user_id);
        $this->assertEquals($journey->id, $step->journey_id);
        $this->assertEquals($date, $step->date);
    }


    /**
     * @test
     */
    public function destroy_deletes_and_redirects()
    {
        $step = factory(Step::class)->create();

        $response = $this->delete(route('step.destroy', $step));

        $response->assertRedirect(route('step.index'));

        $this->assertDeleted($step);
    }
}
