<?php

namespace Tests\Feature\Http\Controllers;

use App\Page;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use JMac\Testing\Traits\AdditionalAssertions;
use Tests\TestCase;

/**
 * @see \App\Http\Controllers\PageController
 */
class PageControllerTest extends TestCase
{
    use AdditionalAssertions, RefreshDatabase, WithFaker;

    /**
     * @test
     */
    public function index_displays_view()
    {
        $pages = factory(Page::class, 3)->create();

        $response = $this->get(route('page.index'));

        $response->assertOk();
        $response->assertViewIs('page.index');
        $response->assertViewHas('pages');
    }


    /**
     * @test
     */
    public function create_displays_view()
    {
        $response = $this->get(route('page.create'));

        $response->assertOk();
        $response->assertViewIs('page.create');
    }


    /**
     * @test
     */
    public function store_uses_form_request_validation()
    {
        $this->assertActionUsesFormRequest(
            \App\Http\Controllers\PageController::class,
            'store',
            \App\Http\Requests\PageStoreRequest::class
        );
    }

    /**
     * @test
     */
    public function store_saves_and_redirects()
    {
        $title = $this->faker->sentence(4);
        $seo_meta_description = $this->faker->text;
        $seo_meta_title = $this->faker->word;
        $content = $this->faker->paragraphs(3, true);
        $slug = $this->faker->slug;

        $response = $this->post(route('page.store'), [
            'title' => $title,
            'seo_meta_description' => $seo_meta_description,
            'seo_meta_title' => $seo_meta_title,
            'content' => $content,
            'slug' => $slug,
        ]);

        $pages = Page::query()
            ->where('title', $title)
            ->where('seo_meta_description', $seo_meta_description)
            ->where('seo_meta_title', $seo_meta_title)
            ->where('content', $content)
            ->where('slug', $slug)
            ->get();
        $this->assertCount(1, $pages);
        $page = $pages->first();

        $response->assertRedirect(route('page.index'));
        $response->assertSessionHas('page.id', $page->id);
    }


    /**
     * @test
     */
    public function show_displays_view()
    {
        $page = factory(Page::class)->create();

        $response = $this->get(route('page.show', $page));

        $response->assertOk();
        $response->assertViewIs('page.show');
        $response->assertViewHas('page');
    }


    /**
     * @test
     */
    public function edit_displays_view()
    {
        $page = factory(Page::class)->create();

        $response = $this->get(route('page.edit', $page));

        $response->assertOk();
        $response->assertViewIs('page.edit');
        $response->assertViewHas('page');
    }


    /**
     * @test
     */
    public function update_uses_form_request_validation()
    {
        $this->assertActionUsesFormRequest(
            \App\Http\Controllers\PageController::class,
            'update',
            \App\Http\Requests\PageUpdateRequest::class
        );
    }

    /**
     * @test
     */
    public function update_redirects()
    {
        $page = factory(Page::class)->create();
        $title = $this->faker->sentence(4);
        $seo_meta_description = $this->faker->text;
        $seo_meta_title = $this->faker->word;
        $content = $this->faker->paragraphs(3, true);
        $slug = $this->faker->slug;

        $response = $this->put(route('page.update', $page), [
            'title' => $title,
            'seo_meta_description' => $seo_meta_description,
            'seo_meta_title' => $seo_meta_title,
            'content' => $content,
            'slug' => $slug,
        ]);

        $page->refresh();

        $response->assertRedirect(route('page.index'));
        $response->assertSessionHas('page.id', $page->id);

        $this->assertEquals($title, $page->title);
        $this->assertEquals($seo_meta_description, $page->seo_meta_description);
        $this->assertEquals($seo_meta_title, $page->seo_meta_title);
        $this->assertEquals($content, $page->content);
        $this->assertEquals($slug, $page->slug);
    }


    /**
     * @test
     */
    public function destroy_deletes_and_redirects()
    {
        $page = factory(Page::class)->create();

        $response = $this->delete(route('page.destroy', $page));

        $response->assertRedirect(route('page.index'));

        $this->assertDeleted($page);
    }
}
