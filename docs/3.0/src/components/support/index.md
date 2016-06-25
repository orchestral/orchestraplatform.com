---
title: Support Component
badge: support

---

Support component is basically a basic set of class required by Orchestra Platform. The idea behind it is similar to what is `Illuminate\Support` to Laravel Framework.

1. [Version Compatibility](#compatibility)
2. [Installation](#installation)
3. [Configuration](#configuration)
4. [Classes](#classes)
5. [Change Log]({doc-url}/components/support/changes#v3-0)

<a name="compatibility"></a>
## Version Compatibility

 Laravel  | View
:---------|:----------
 4.0.x    | 2.0.x
 4.1.x    | 2.1.x
 4.2.x    | 2.2.x
 5.0.x    | 3.0.x

<a name="installation"></a>
## Installation

To install through composer, simply put the following in your `composer.json` file:

```json
{
	"require": {
		"orchestra/support": "~3.0"
	}
}
```

And then run `composer install` from the terminal.

<a name="quick-installation"></a>
### Quick Installation

Above installation can also be simplify by using the following command:

    composer require "orchestra/support=~3.0"

<a name="classes"></a>
## Classes

* [Manager Class]({doc-url}/components/support/manager)
* [String Class]({doc-url}/components/support/str)
* [Validation Class]({doc-url}/components/support/validator)
