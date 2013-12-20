<div id="fixed-nav">
    <div id="social">
        <div class="boxed">
            <ul class="nolist">
                <li class="facebook"><a href="//www.facebook.com/groups/orchestraplatform/" trget="_blank"><i class="icon-facebook"></i></a></li>
                <li class="twitter"><a href="//twitter.com/getorchestra" trget="_blank"><i class="icon-twitter"></i></a></li>
                <li class="gplus"><a href="//github.com/orchestral" trget="_blank"><i class="icon-github"></i></a></li>
             </ul>
        </div>
    </div>
    <nav id="primary">
        <div class="boxed">
            <div id="logo" class="animated bounceInDown">
                <a href="{{ Request::root() }}">
                    <h1>Orchestra Platform</h1>
                </a>
            </div>
            <div class="nav">
                <ul id="menu-primary" class="menu">
                    <? $active = ' class="current_page_item"'; ?>
                    <li{{ Orchestra\App::is('/') ? $active : '' }}>
                        <a href="{{ handles('app::/') }}">Home</a>
                    </li>
                    <li{{ Orchestra\App::is('orchestra/story::*') ? $active : '' }}>
                        <a href="{{ handles('orchestra/story::/') }}">Blog</a>
                    </li>
                    <li{{ Orchestra\App::is('app::docs*') ? $active : '' }}>
                        <a href="{{ handles('app::docs/latest/') }}">Documentation</a>
                        <ul>
                            <li><a href="{{ handles('app::docs/2.1/') }}">2.1 (Development)</a></li>
                            <li><a href="{{ handles('app::docs/2.0/') }}">2.0 (Latest Stable)</a></li>
                        </ul>
                    </li>
                </ul>
            </div>
        </div>
    </nav>
</div>
