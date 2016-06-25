---
title: Theme Installer
badge: theme-installer

---

Theme Installer Component allow themes designed for Orchestra Platform to be installed via Composer. The installer would check themes' `composer.json` for the following type:

```json
{
    "type": "orchestra-theme"
}
```

This would allow theme to be installed under `public/themes` folder instead of the default `vendor` directory.
