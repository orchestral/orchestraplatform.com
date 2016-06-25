---
title: String Helper Class
---

`Orchestra\Support\Str` is probably one of the few internal API class that you might use directly. It extends `Illuminate\Support\Str` and offer some improvement.

1. [Human Readable Text](#str-humanize)
2. [Replace Text](#str-replace)
3. [Stream Get Contents](#stream-get-contents)

<a name="str-humanize"></a>
## Human Readable Text

`Str::humanize()` convert slug or snake cased string into human readable text, the return text is similar to [`Str::title()`](#str-title) except that the first word is not capitalize.

```php
use Orchestra\Support\Str;

Str::humanize('hello-world'); // would return "hello world"
Str::humanize('Laravel_is awesome'); // would return "Laravel is awesome"
```

<a name="str-replace"></a>
## Replace Text

`Str::replace()` is a simple way to replace text similarly to `strtr()` approach with customize delimiter.

```php
use Orchestra\Support\Str;

Str::replace('Hello {name}', ['name' => 'Laravel']); // would return "Hello Laravel"
Str::replace('Hello <name>', ['name' => 'world'], '<', '>'); // would return "Hello world"
```

<a name="stream-get-contents"></a>
## Stream Get Contents

Unliked other database driver, when using blob with PostgreSQL, the return value from database is a stream instead of string, using above helper method help convert it properly back to string.

```php
use Orchestra\Support\Str;

$str = Str::streamGetContents($blob);
```

> The method would return original string when it detect that it isn't a stream.

<a name="str-title"></a>
## Title

Allow a string to be transformed to a proper title.

```php
use Orchestra\Support\Str;

Str::title('hello-world'); // would return "Hello World"
```

> This is now available in `Illuminate\Support\Str`.
