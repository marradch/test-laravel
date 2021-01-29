<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class ProposalTest extends TestCase
{
    /**
     * The form test example.
     *
     * @return void
     */
    public function test_form()
    {
        $response = $this->get('/add-proposal');

        $response->assertSee('Your name');

        $response->assertStatus(200);

        $captcha = $this->app['session.store']->only(['proposal']);
        $captcha = $captcha['proposal']['add']['captcha'] ?? '';
        $captchaTime = array_keys($captcha)[0] ?? 0;
        $captchaCode = $captcha[$captchaTime];

        $response->assertSessionHas('proposal.add.captcha');

        $response = $this->post('/proposal/store', [
            'name' => 'Test Name',
            'title' => 'Test Title'.mt_rand(1, 10000),
            'description' => 'Test Description',
            'captcha_code' => $captchaCode,
            'captcha_key' => 'proposal.add.captcha.'.$captchaTime
        ]);

        $response->assertRedirect('/');
    }

    /**
     * The wrong store test example.
     *
     * @return void
     */
    public function test_wrong()
    {
        $response = $this->post('/proposal/store', [
            'name' => 'Test Name',
            'title' => 'Test Title'.mt_rand(1, 10000),
            'description' => 'Test Description',
        ]);

        $response->assertStatus(302);
        $response->assertSessionHas('error', 'Captcha code is empty!');
    }

    /**
     * The wrong store test example.
     *
     * @return void
     */
    public function test_wrong_next()
    {
        $response = $this->get('/add-proposal');
        $response->assertStatus(200);

        $captcha = $this->app['session.store']->only(['proposal']);
        $captcha = $captcha['proposal']['add']['captcha'] ?? '';
        $captchaTime = array_keys($captcha)[0] ?? 0;
        $captchaCode = $captcha[$captchaTime];

        $response->assertSessionHas('proposal.add.captcha');

        $response = $this->post('/proposal/store', [
            'captcha_code' => $captchaCode,
            'captcha_key' => 'proposal.add.captcha.'.$captchaTime
        ]);

        $response->assertStatus(302);

        $response->assertSessionHasErrors(['name', 'title', 'description']);
    }

    /**
     * The proposal list test example.
     *
     * @return void
     */
    public function test_list()
    {
        $response = $this->get('/proposal/all');

        $response->assertSee('data-js-proposal-cards');

        $response->assertSee('card-header');

        $response->assertStatus(200);
    }
}
