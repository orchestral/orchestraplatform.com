<?php

use Kurenai\DocumentParser;
use Kurenai\Document;
use Kurenai\Parser\DflydevMarkdownExtra;
use dflydev\markdown\MarkdownExtraParser;
use Illuminate\Database\Eloquent\ModelNotFoundException;

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the Closure to execute when that URI is requested.
|
*/

Route::get('docs/{version}/{filename?}', function ($version, $filename = 'index') {
    $aliases = ['latest' => '2.1', 'stable' => '2.0'];
    $version = array_get($aliases, $version, $version);

    $base = app('path.base').'/docs';
    $path = "{$base}/{$version}";

    $parser = new DocumentParser(function () {
        return new Document(new DflydevMarkdownExtra);
    });

    if (File::isDirectory("{$path}/src/{$filename}")) {
        $filename = "{$filename}/index";
    }

    if (! File::exists($document = "{$path}/src/{$filename}.md") or ! File::exists($toc = "{$path}/src/contents.md")) {
        return App::abort(404);
    }

    $toc = $parser->parse(File::get($toc));
    $document = $parser->parse(File::get($document));

    Site::set('title', sprintf('%s on v%s', $document->get('title'), $version));

    return View::make('documentation', [
        'toc'      => $toc,
        'document' => $document,
        'version'  => $version,
    ]);
})->where('filename', '(.*)');

Route::get('/', function () {
    return View::make('hello');
});

/*
|--------------------------------------------------------------------------
| Handle 404 and errors
|--------------------------------------------------------------------------
*/

App::missing(function () {
    return Response::view('404', [], 404);
});

App::error(function (ModelNotFoundException $e) {
    return Response::view('404', [], 404);
});
