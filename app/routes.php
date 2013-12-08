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

Route::get('docs/{version}/{filename?}', function ($version, $filename = 'index') {
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
