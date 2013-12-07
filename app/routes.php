<?php

use Kurenai\DocumentParser;
use Kurenai\Document;
use Kurenai\Parser\DflydevMarkdownExtra;
use dflydev\markdown\MarkdownExtraParser;

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

Route::get('docs/{version}', function ($version) {
	return Redirect::to("docs/{$version}/index");
});

Route::get('docs/{version}/{filename}', function ($version, $filename) {
	$base = app('path.base').'/docs';
	$path = "{$base}/{$version}";

	$parser = new DocumentParser(function () {
		return new Document(new DflydevMarkdownExtra);
	});

	if (File::isDirectory("{$path}/{$filename}")) {
		$filename = "{$filename}/index";
	}

	if (! File::exists($document = "{$path}/{$filename}.md") or ! File::exists($toc = "{$base}/toc/{$version}.md")) {
		return App::abort(404);
	}

	return View::make('documentation', [
		'toc'      => $parser->parse(File::get($toc)),
		'document' => $parser->parse(File::get($document)),
		'version'  => $version,
	]);
})->where('filename', '(.*)');

Route::get('/', function () {
	return View::make('hello');
});
