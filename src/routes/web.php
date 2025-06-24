<?php

declare(strict_types=1);

use Elastic\Elasticsearch\ClientBuilder;
use Illuminate\Support\Facades\Redis;
use Illuminate\Support\Facades\Route;

Route::get('/', fn () => view('welcome'));

Route::get('/redis-test', function () {
    Redis::set('test-key', 'Redis is working!');

    return Redis::get('test-key');
});

Route::get('/elasticsearch-test', function () {
    $client = ClientBuilder::create()
        ->setHosts(config('elasticsearch.hosts'))
        ->build();

    // Create index if not exists
    if (!$client->indices()->exists(['index' => 'test'])) {
        $client->indices()->create(['index' => 'test']);
    }

    $response = $client->search([
        'index' => 'test',
        'body' => [
            'query' => [
                'match_all' => new \stdClass(),
            ],
        ],
    ]);

    return $response;
});
