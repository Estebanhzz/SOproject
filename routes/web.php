<?php

use Illuminate\Http\Request;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| This file is where you may define all of the routes that are handled
| by your application. Just tell Laravel the URIs it should respond
| to using a Closure or controller method. Build something great!
|
*/

Route::get('/', function () {
    return view('form');
});

Route::post('/', function (Request $request) {
    $tags = [];
    $question = str_replace("\n", ' ', $request->input('question'));

    $base_path = env('BASE_PATH');
    $fasttext_path = env('FASTTEXT_PATH');
    $model_path = env('MODEL_PATH');

    file_put_contents("{$base_path}/predictText.txt", $question);

    exec("{$base_path}/{$fasttext_path} predict {$base_path}/{$model_path} {$base_path}/predictText.txt 5", $tags);

    unlink("{$base_path}/predictText.txt");

    $tags = str_replace('__label__', '', $tags[0]);
    $tags = explode(' ', $tags);

    return response()->json([
        'question' => $question,
        'tags' => $tags,
    ]);
});
