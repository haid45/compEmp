<?php

use Illuminate\Database\Eloquent\Factories\Factory as Factory;

function create($class, $attributes = [], $times = 1)
{
    $response = Factory::factoryForModel($class)->count($times)->create($attributes)->first();
    return $times > 1 ? $response->get() : $response->first();
}
function make($class, $attributes = [], $times = 1)
{
    $response = Factory::factoryForModel($class)->count($times)->make($attributes);
    return $times > 1 ? $response->all() : $response->first();
}
function raw($class, $attributes = [], $times = 1)
{
    $response = Factory::factoryForModel($class)->count($times)->raw($attributes);
    return isset($response) && $times == 1 ? $response[0] : $response;
}
