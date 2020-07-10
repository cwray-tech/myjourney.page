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
    public function index_behaves_as_expected()
    {
        $journeys = factory(Journey::class, 3)->create();

        $response = $this->get(route('journey.index'));

        $response->assertOk();
        $response->assertJsonStructure([]);
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
    public function store_saves()
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

        $response->assertOk();
        $response->assertJsonStructure([]);
    }


    /**
     * @test
     */
    public function show_behaves_as_expected()
    {
        $journey = factory(Journey::class)->create();

        $response = $this->get(route('journey.show', $journey));

        $response->assertOk();
        $response->assertJsonStructure([]);
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
    public function update_behaves_as_expected()
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

        $response->assertOk();
        $response->assertJsonStructure([]);

        $this->assertEquals($user->id, $journey->user_id);
        $this->assertEquals($title, $journey->title);
        $this->assertEquals($domain, $journey->domain);
    }


    /**
     * @test
     */
    public function destroy_deletes_and_responds_with()
    {
        $journey = factory(Journey::class)->create();

        $response = $this->delete(route('journey.destroy', $journey));

        $response->assertOk();

        $this->assertDeleted($journey);
    }
}
