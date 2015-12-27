---
title: Facades

---

List of available facades on Orchestra Platform.

Alias                 | Facade                                | Root Accessor                                    | IoC Bindings
:---------------------|:--------------------------------------|:-------------------------------------------------|:----------------------
Orchestra\Acl         | Orchestra\Support\Facades\Acl         | Orchestra\Auth\Acl\Environment                   | `orchestra.acl`
Orchestra\Asset       | Orchestra\Support\Facades\Asset       | Orchestra\Asset\Environment                      | `orchestra.asset`
Orchestra\App         | Orchestra\Support\Facades\App         | Orchestra\Foundation\Application                 | `orchestra.app`
Orchestra\Config      | Orchestra\Support\Facades\Config      | Orchestra\Extension\ConfigManager                | `orchestra.extension.config`
Orchestra\Decorator   | Orchestra\Support\Facades\Decorator   | Orchestra\View\Decorator                         | `orchestra.decorator`
Orchestra\Extension   | Orchestra\Support\Facades\Extension   | Orchestra\Extension\Environment                  | `orchestra.extension`
Orchestra\Form        | Orchestra\Support\Facades\Form        | Orchestra\Html\Form\Environment                  | `orchestra.form`
Orchestra\Mail        | Orchestra\Support\Facades\Mail        | Orchestra\Foundation\Mail                        | `orchestra.mail`
Orchestra\Memory      | Orchestra\Support\Facades\Memory      | Orchestra\Memory\MemoryManager                   | `orchestra.memory`
Orchestra\Messages    | Orchestra\Support\Facades\Messages    | Orchestra\Support\Messages                       | `orchestra.messages`
Orchestra\Profiler    | Orchestra\Debug\Facades\Profiler      | Orchestra\Debug\Profiler                         | `orchestra.debug`
Orchestra\Publisher   | Orchestra\Support\Facades\Publisher   | Orchestra\Foundation\Publisher\PublisherManager  | `orchestra.publisher`
Orchestra\Resources   | Orchestra\Support\Facades\Resources   | Orchestra\Resources\Environment                  | `orchestra.resources`
Orchestra\Site        | Orchestra\Support\Facades\Site        | Orchestra\Foundation\Site                        | `orchestra.site`
Orchestra\Table       | Orchestra\Support\Facades\Table       | Orchestra\Html\Table\Environment                 | `orchestra.table`
Orchestra\Theme       | Orchestra\Support\Facades\Theme       | Orchestra\View\Theme\ThemeManager                | `orchestra.theme`
Orchestra\Widget      | Orchestra\Support\Facades\Widget      | Orchestra\Widget\WidgetManager                   | `orchestra.widget`
