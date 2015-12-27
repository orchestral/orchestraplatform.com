---
title: Facades

---

List of available facades on Orchestra Platform.

Alias                 | Facade                                | Root Accessor                                    | IoC Bindings
:---------------------|:--------------------------------------|:-------------------------------------------------|:----------------------
Orchestra\Acl         | Orchestra\Support\Facades\Acl         | Orchestra\Auth\Acl\Factory                       | `orchestra.acl`
Orchestra\Asset       | Orchestra\Support\Facades\Asset       | Orchestra\Asset\Factory                          | `orchestra.asset`
Orchestra\App         | Orchestra\Support\Facades\App         | Orchestra\Foundation\Application                 | `orchestra.app`
Orchestra\Config      | Orchestra\Support\Facades\Config      | Orchestra\Extension\ConfigManager                | `orchestra.extension.config`
Orchestra\Decorator   | Orchestra\Support\Facades\Decorator   | Orchestra\View\Decorator                         | `orchestra.decorator`
Orchestra\Extension   | Orchestra\Support\Facades\Extension   | Orchestra\Extension\Factory                      | `orchestra.extension`
Orchestra\Form        | Orchestra\Support\Facades\Form        | Orchestra\Html\Form\Factory                      | `orchestra.form`
Orchestra\Mail        | Orchestra\Support\Facades\Mail        | Orchestra\Notifier\Mailer                        | `orchestra.mail`
Orchestra\Memory      | Orchestra\Support\Facades\Memory      | Orchestra\Memory\MemoryManager                   | `orchestra.memory`
Orchestra\Messages    | Orchestra\Messages\Facade             | Orchestra\Support\Messages                       | `orchestra.messages`
Orchestra\Profiler    | Orchestra\Support\Facades\Profiler    | Orchestra\Debug\Profiler                         | `orchestra.debug`
Orchestra\Publisher   | Orchestra\Support\Facades\Publisher   | Orchestra\Foundation\Publisher\PublisherManager  | `orchestra.publisher`
Orchestra\Resources   | Orchestra\Support\Facades\Resources   | Orchestra\Resources\Factory                      | `orchestra.resources`
Orchestra\Site        | Orchestra\Support\Facades\Site        | Orchestra\Foundation\Site                        | `orchestra.site`
Orchestra\Table       | Orchestra\Support\Facades\Table       | Orchestra\Html\Table\Factory                     | `orchestra.table`
Orchestra\Theme       | Orchestra\Support\Facades\Theme       | Orchestra\View\Theme\ThemeManager                | `orchestra.theme`
Orchestra\Widget      | Orchestra\Support\Facades\Widget      | Orchestra\Widget\WidgetManager                   | `orchestra.widget`

