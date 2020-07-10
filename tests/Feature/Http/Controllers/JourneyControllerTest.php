<?php

namespace Tests\Feature\Http\Controllers;

use App\Journey;
use App\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use JMac\Testing\Traits\AdditionalAssertions;
use Tests\TestCase;

/**
 * @see \App\Http\Controllers\JourneyController
 */
class JourneyControllerTest extends TestCase
{
    use AdditionalAssertions, RefreshDatabase, WithFaker;

    /**
     * @test
     */
    public function index_displays_view()
    {
        $journeys = factory(Journey::class, 3)->create();

        $response = $this->get(route('journey.index'));

        $response->assertOk();
        $response->assertViewIs('journey.index');
        $response->assertViewHas('journeys');
    }


    /**
     * @test
     */
    public function create_displays_view()
    {
        $response = $this->get(route('journey.create'));

        $response->assertOk();
        $response->assertViewIs('journey.create');
    }


    /**
     * @test
     */
    public function store_uses_form_request_validation()
    {
        $this->assertActionUsesFormRequest(
            \App\Http\Controllers\JourneyController::class,
            'store',
            \App\Http\Requests\JourneyStoreRequest::class
        );
    }

    /**
     * @test
     */
    public function store_saves_and_redirects()
    {
        $user = factory(User::class)->create();
        $title = $this->faker->sentence(4);
        $domain = $this->faker->word;

        $response = $this->post(route('journey.store'), [
            'user_id' => $user->id,
            'title' => $title,
            'domain' => $domain,
        ]);

        $journeys = Journey::query()
            ->where('user_id', $user->id)
            ->where('title', $title)
            ->where('domain', $domain)
            ->get();
        $this->assertCount(1, $journeys);
        $journey = $journeys->first();

        $response->assertRedirect(route('journey.index'));
        $response->assertSessionHas('journey.id', $journey->id);
    }


    /**
     * @test
     */
    public function show_displays_view()
    {
        $journey = factory(Journey::class)->create();

        $response = $this->get(route('journey.show', $journey));

        $response->assertOk();
        $response->assertViewIs('journey.show');
        $response->assertViewHas('journey');
    }


    /**
     * @test
     */
    public function edit_displays_view()
    {
        $journey = factory(Journey::class)->create();

        $response = $this->get(route('journey.edit', $journey));

        $response->assertOk();
        $response->assertViewIs('journey.edit');
        $response->assertViewHas('journey');
    }


    /**
     * @test
     */
    public function update_uses_form_request_validation()
    {
        $this->assertActionUsesFormRequest(
            \App\Http\Controllers\JourneyController::class,
            'update',
            \App\Http\Requests\JourneyUpdateRequest::class
        );
    }

    /**
     * @test
     */
    public function update_redirects()
    {
        $journey = factory(Journey::class)->create();
        $user = factory(User::class)->create();
        $title = $this->faker->sentence(4);
        $domain = $this->faker->word;

        $response = $this->put(route('journey.update', $journey), [
            'user_id' => $user->id,
            'title' => $title,
            'domain' => $domain,
        ]);

        $journey->refresh();

        $response->assertRedirect(route('journey.index'));
        $response->assertSessionHas('journey.id', $journey->id);

        $this->assertEquals($user->id, $journey->user_id);
        $this->assertEquals($title, $journey->title);
        $this->assertEquals($domain, $journey->domain);
    }


    /**
     * @test
     */
    public function destroy_deletes_and_redirects()
    {
        $journey = factory(Journey::class)->create();

        $response = $this->delete(route('journey.destroy', $journey));

        $response->assertRedirect(route('journey.index'));

        $this->assertDeleted($journey);
    }
}
