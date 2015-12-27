---
title: Facile Templating

---

`Orchestra\Facile` works by composing the response using Template, using the `Orchestra\Facile\FacileServiceProvider`, we setup the default template for normal usage which can compose HTML and JSON response, see `Orchestra\Facile\Template\Base`.

	Route::get('users{format}', function ($format = '.html')
	{
		$users = User::all();

		return Facile::make('default')
			->view('users')
			->with(['users' => $users])
			->status(200)
			->format(substr($format, 1))
			->render();

	})->where('format', '\.?(json|html)?');

In above example, what actually happen is that the response was generated using `Orchestra\Facile\Template\Base::composeHtml()` method when you hit `/users` (or `/users.html`) and `Orchestra\Facile\Template\Base::composeJson()` when you hit `/users.json`.
