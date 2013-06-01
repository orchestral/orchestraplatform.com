---
layout: single-blog
title: Why Orchestra\Asset?
lead: When there few available alternatives...
author: 
  name: crynobone
  url: http://github.com/crynobone

---

Since `Laravel\Asset` is no longer available in Laravel 4, I been considering an alternative Asset package for Orchestra Platform. [Basset](http://jasonlewis.me/code/basset) was one that we tried to integrate into Orchestra Platform but later remove as it just wasn't compatible with how we would expect it to be, among the priority that we required are:

* It should support re-ordering based on dependencies.
* It should be called from config, filter and view.
* Most importantly, the API shouldn't be frequently changed, at least not between release.

These requirement are so that extension developer can built stuff without having to worry that their extension wouldn't work, so I decided that we're better off forking Laravel 3's Asset class and maintain it. 

Now does this mean you should use it instead of [Basset](http://jasonlewis.me/code/basset), or other asset management packages available? The answer to that is NO, you're free to use anything. It just that when you're adding resources to Orchestra Platform Administrator Interface and those resource require additional assets, do use `Orchestra\Asset`, you're free to use anything else in View that isn't part of Orchestra Platform Adminstrator Interface.