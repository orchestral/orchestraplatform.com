---
layout: single-blog
title: Quick Update 1
author:
  name: crynobone
  url: https://github.com/crynobone

---

It's been awhile since there been a new entries, apologies on that. For the past 9-10 days I been focusing on [Control Extension](https://github.com/orchestral/control) for Orchestra Platform as well as ensuring that we have good test coverage before the official 2.0.0 release. 

### Code Coverage

I'm happy to share that our [code coverage is now 100%](https://coveralls.io/r/orchestral). Overall Orchestra Platform 2 have less assertion in comparison to Orchestra Platform 1 however due to flexibility with Laravel 4 most of the integration test and functional test is no longer required and replaced with `Mockery`.

Components  | Tests | Assertions    | Coverage
:-----------|:------|:--------------|:---------
Asset       | 3     | 8             | [![Coverage Status](https://coveralls.io/repos/orchestral/asset/badge.png?branch=2.0)](https://coveralls.io/r/orchestral/asset?branch=2.0)
Auth        | 31    | 107           | [![Coverage Status](https://coveralls.io/repos/orchestral/auth/badge.png?branch=2.0)](https://coveralls.io/r/orchestral/auth?branch=2.0)
Extension   | 23    | 20            | [![Coverage Status](https://coveralls.io/repos/orchestral/extension/badge.png?branch=2.0)](https://coveralls.io/r/orchestral/extension?branch=2.0)
Facile      | 29    | 43            | [![Coverage Status](https://coveralls.io/repos/orchestral/facile/badge.png?branch=2.0)](https://coveralls.io/r/orchestral/facile?branch=2.0)
Foundation  | 141   | 214           | [![Coverage Status](https://coveralls.io/repos/orchestral/foundation/badge.png?branch=2.0)](https://coveralls.io/r/orchestral/foundation?branch=2.0)
Html        | 48    | 125           | [![Coverage Status](https://coveralls.io/repos/orchestral/html/badge.png?branch=2.0)](https://coveralls.io/r/orchestral/html?branch=2.0)
Memory      | 21    | 39            | [![Coverage Status](https://coveralls.io/repos/orchestral/memory/badge.png?branch=2.0)](https://coveralls.io/r/orchestral/memory?branch=2.0)
Resources   | 20    | 41            | [![Coverage Status](https://coveralls.io/repos/orchestral/resources/badge.png?branch=2.0)](https://coveralls.io/r/orchestral/resources?branch=2.0)
Support     | 24    | 67            | [![Coverage Status](https://coveralls.io/repos/orchestral/support/badge.png?branch=2.0)](https://coveralls.io/r/orchestral/support?branch=2.0)
View        | 8     | 13            | [![Coverage Status](https://coveralls.io/repos/orchestral/view/badge.png?branch=2.0)](https://coveralls.io/r/orchestral/view?branch=2.0)
Widget      | 16    | 34            | [![Coverage Status](https://coveralls.io/repos/orchestral/widget/badge.png?branch=2.0)](https://coveralls.io/r/orchestral/widget?branch=2.0)
**TOTAL**   | 364   | 711

### Code Stability

Orchestra Platform has been tagged with `v2.0.0-BETA4`, as of now we are on a feature freeze status and hopefully by June 20th, 2013 we can have our `v2.0.0-RC1` release (granted there no bug).

As listed in [Orchestra Platform 2.0 Roadmap](https://github.com/orchestral/platform/issues/1), the only things that we should be focusing right now is documentation, bugfixes as well as performance. I would encourage everyone who interested to try and using Orchestra Platform 2.0 to provide me feedback (preferable through [Github](https://github.com/orchestral)).