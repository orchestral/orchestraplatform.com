---
title: Notifier Change Log

---

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
