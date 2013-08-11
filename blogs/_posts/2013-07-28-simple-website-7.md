---
layout: single-blog
title: Simple Website with Orchestra Platform 2 (Part 7)
lead: Managing Corrupted Extension
author:
  name: crynobone
  url: https://github.com/crynobone
  
 
---

A few days ago Aaron Lee e-mail me with a problem that he is experiencing with Orchestra Platform and I see that this is a common painfall that any extension developer would experience while developing for Orchestra Platform.

> Hi,
> 
> Let me just say that i love Orchestra. However, I'm facing a bit of trouble. I tried to set up a new extension, but if i make a mistake and I activate the extension, Im getting a ton of error. 
> 
> Most of the time i had to reinstall the database. Thats very troublesome.

## Update our dependencies

Before we start this tutorial, let's begin by updating **playground** dependencies, there's tonne of update has been push since we last used it.

	$ cd playground
	$ composer update --dev

This is important as [orchestra/extension v2.0.8](/docs/2.0/components/extension/changes/#v2.0.8) and [orchestra/foundation v2.0.11](/docs/2.0/components/foundation/changes/#v2.0.11) added some cool improvement to debugging corrupted extension. 

## Now let create a mistake

Open up `app/orchestra.php` and add this line:

	<?php
	
	throw new Exception("I broke you!");
	
What happen if we visit <http://localhost:8000/admin/extensions>?

![Broken Extension](/blogs/assets/2013/07/broken-extension.png)

### Use Safe Mode

So what should you do? There a way for you to run Orchestra Platform in safe mode (where extension is not booted at all). To run this simply append `?safe_mode=on` from any page (e.g: <http://localhost:8000/admin/extensions?safe_mode=on>).

![Under safe mode](/blogs/assets/2013/07/under-safemode.png)

Now you can safely deactivate playground extension by clicking on the deactivate button, problem solved.

### Revert to Normal Mode

To reset back to normal mode, all you need to do is append `?safe_mode=off` and you're done (e.g: <http://localhost:8000/admin/extensions?safe_mode=off>).