---
title: Notifier Change Log

---

## Version 3.0 {#v3-0}

### v3.0.3 {#v3-0-3}

* Deferred requiring `encrypter` service location until it's actually needed. Solved issue when artisan command is required on fresh installation where application key is not available.

### v3.0.2 {#v3-0-2}

* Add `Orchestra\Notifier\TransportManager::getConfig()` and `Orchestra\Notifier\TransportManager::getSecureConfig()`.

### v3.0.1 {#v3-0-1}

* Add Amazon SES Transport support.

### v3.0.0 {#v3-0-0}

* Update support to Laravel Framework v5.0.
* Simplify PSR-4 path.
* Rename `Orchestra\Notifier\LaravelNotifier` to `Orchestra\Notifier\Handlers\Laravel`.
* Rename `Orchestra\Notifier\OrchestraNotifier` to `Orchestra\Notifier\Handlers\Orchestra`.
* Swap `Illuminate\Support\Fluent` with `Orchestra\Notifier\Message`.

## Version 2.2 {#v2-2}

### v2.2.4 {#v2-2-4}

* Change visibility of `Orchestra\Notifier\Mailer::getMailer()`.

### v2.2.3 {#v2-2-3}

* Add `Orchestra\Notifier\Message::create()` helper.
* Simplify `Orchestra\Notifier\NotifiableTrait`.

### v2.2.2 {#v2-2-2}

* Ensure `$subject` and `$data` is available to avoid variable not found error while sending using queue.

### v2.2.1 {#v2-2-1}

* Add `Orchestra\Notifier\Message` as an alias to `Illuminate\Support\Fluent`.

### v2.2.0 {#v2-2-0}

* Bump minimum version to PHP v5.4.0.
* Add mailgun, mandrill and log mail transport.
* Add `Orchestra\Notifier\NotifiableTrait`.
* Add `Orchestra\Notifier\GenericRecipient`.
* Handle attaching `orchestra/memory` on `orchestra.mail` service locator from `orchestra/foundation`.
* Add `Orchestra\Notifier\Receipt` as a unified receipt object on all e-mail sending.

## Version 2.1 {#v2-1}

### v2.1.4 {#v2-1-4}

* Change visibility of `Orchestra\Notifier\Mailer::getMailer()`.

### v2.1.3 {#v2-1-3}

* Ensure `$subject` and `$data` is available to avoid variable not found error while sending using queue.

### v2.1.2 {#v2-1-2}

* Add `Orchestra\Notifier\GenericRecipient`.
* Implement [PSR-4](https://github.com/php-fig/fig-standards/blob/master/proposed/psr-4-autoloader/psr-4-autoloader.md) autoloading structure.

### v2.1.1 {#v2-1-1}

* Handle attaching `orchestra/memory` on `orchestra.mail` service locator from `orchestra/foundation`.

### v2.1.0 {#v2-1-0}

* Initial functionality to handle user notification by implementing `Orchestra\Notifier\RecipientInterface`.
* Move `Orchestra\Foundation\Mail` to `Orchestra\Notifier\Mailer`.
* Add `Orchestra\Notifier\LaravelNotifier` and `Orchestra\Notifier\OrchestraNotifier` which implements `Orchestra\Notifier\NotifierInterface`.
