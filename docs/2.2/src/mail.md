---
title: Sending Mail

---

`Orchestra\Mail` offer a slight improvement to `Illuminate\Mail\Mailer` where administrator can define the e-mail configuration from Settings page as well as preference to use `send` or `queue`.

* [Send](#send)
* [Queue](#queue)
* [Push (send via configuration)](#push)

## Send {#send}

`Orchestra\Mail::send()` deliver what you would expect from `Mail::send()` using the E-mail configuration setup in the Settings Page.

	Orchestra\Mail::send('email.update', $data, function ($m) use ($user) {
		$m->to($user->email);
	});

## Queue {#queue}

`Orchestra\Mail::queue()` deliver what you would expect from `Mail::queue()` using the E-mail configuration setup in the Settings Page.

	Orchestra\Mail::queue('email.update', $data, function ($m) use ($user) {
		$m->to($user->email);
	});

## Push (send via configuration) {#push}

`Orchestra\Mail::push()` would first check whether the administrator has choosen to send email directly or delayed it via queue.

	Orchestra\Mail::push('email.update', $data, function ($m) use ($user) {
		$m->to($user->email);
	});

> The API is identical to `Illuminate\Mail\Mailer` with the exception that administrator can configure to choose "Mail via Queue" in the Settings Page.

