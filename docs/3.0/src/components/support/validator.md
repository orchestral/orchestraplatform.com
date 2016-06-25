---
title: Validator Class

---

`Orchestra\Support\Validator` is a class based on "Validation as a Service" concept. It is however enhanced to support scenarios where you can define different ruleset for different actions throughout your application.

* [Define basic rules](#basic-rules)
* [Scenario based rules](#scenario-rules)
* [Parameter bindings on rules](#parameter-bindings-rules)

<a name="basic-rules"></a>
## Define basic rules

To define a basic rules, all you need to do is create a validation class, e.g:

```php
<?php namespace App\Validation;

use Orchestra\Support\Validator;

class User extends Validator
{
	protected $rules = [
		'email' => ['required', 'email'],
	];
}
```

To run validation for `App\Validation\User`, all you need to do is:

```php
public function store(\App\Validation\User $validator)
{
	$validation = $validator->with(Input::all());

	if ($validation->fails()) {
		return Redirect::back()->withInput()->withErrors($validation);
	}
}
```

> `$validation` would return an instance of `Illuminate\Validation\Validator` so you can utilize it as you normally would do using the default `Validation` on Laravel.

<a name="scenario-rules"></a>
## Scenario based Rules

To allow the validation to run a scenario based ruleset you can just add the following `on()` method in the declaration:

```php
public function update(\App\Validation\User $validator, $id)
{
	$validation = $validator->on('update')->with(Input::all());

	if ($validation->fails()) {
		return Redirect::back()->withInput()->withErrors($validation);
	}
}
```

and to add the additional ruleset simply append `UserValidator` with `onLogin()` method such as below:

```php
<?php namespace App\Validation;

use Orchestra\Support\Validator;

class User extends Validator
{
	// ...

	public function onUpdate()
	{
		$this->rules['password'] = ['required'];
	}
}
```

<a name="parameter-bindings-rules"></a>
## Parameter bindings on rules

There could be time when a rules would require parameter from the request, for example the if you need to check and ensure that email address is unique, but should skip if user is updating own account.

```php
<?php
<?php namespace App\Validation;

use Orchestra\Support\Validator;

class User extends Validator
{
	// ...

	public function onUpdate()
	{
		$this->rules['email'] = ['required', 'unique:users,email,{id}'];
	}
}
```

And you can just bind the `{id}` using:

```php
public function update(\App\Validation\User $validator, $id)
{
	$validation = $validator->on('update')->bind(['id' => $id])->with(Input::all());

	if ($validation->fails()) {
		return Redirect::back()->withInput()->withErrors($validation);
	}
}
```
