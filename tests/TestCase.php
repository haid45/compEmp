<?php

namespace Tests;

use App\Models\User;
use Illuminate\Auth\AuthenticationException;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\TestCase as BaseTestCase;

abstract class TestCase extends BaseTestCase
{
    use CreatesApplication;
    use RefreshDatabase;

    protected $base_route = null;
    protected $base_model = null;


    protected function signIn($user = null)
    {
        $user = $user ?? create(User::class);
        $this->actingAs($user);
        return $this;
    }

    protected function setBaseRoute($route)
    {
        $this->base_route = $route;
    }

    protected function setBaseModel($model)
    {
        $this->base_model = $model;
    }

    protected function create($attributes = [], $model = '', $route = '')
    {
        $this->withoutExceptionHandling();

        $route = $this->base_route ? "{$this->base_route}.store" : $route;
        $model = $this->base_model ?? $model;

        $attributes = raw($model, $attributes);

        if (! auth()->user()) {
            $this->expectException(AuthenticationException::class);
        }

        $response = $this->post(route($route), $attributes)->assertSessionHas('success_message');

        $model = new $model;

        $this->assertDatabaseHas($model->getTable(),collect($attributes)->except('logo')->toArray());

        return $response;
    }

    protected function update($attributes = [], $model = '', $route = '')
    {
        $this->withoutExceptionHandling();

        $route = $this->base_route ? "{$this->base_route}.update" : $route;
        $model = $this->base_model ?? $model;

        $model = create($model);

        if (! auth()->user()) {
            $this->expectException(AuthenticationException::class);
        }

        $response = $this->patch(route($route, $model->id), $attributes);

        tap($model->fresh(), function ($model) use ($attributes) {
            collect($attributes)->each(function($value, $key) use ($model) {
                $this->assertEquals($value, $model[$key]);
            });
        });

        return $response;
    }

    protected function destroy($model = '', $route = '')
    {
        $this->withoutExceptionHandling();

        $route = $this->base_route ? "{$this->base_route}.destroy" : $route;
        $model = $this->base_model ?? $model;

        $model = create($model);

        if (! auth()->user()) {
            $this->expectException(AuthenticationException::class);
        }

        $response = $this->delete(route($route, $model->id));

        $this->assertDatabaseMissing($model->getTable(), $model->toArray());

        $response->assertSessionHas('success_message');

        return $response;
    }
}
