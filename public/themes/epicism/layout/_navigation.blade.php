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
                    <li{{ Request::is('/') ? $active : '' }}>
                        <a href="{{ handles('app::/') }}">Home</a>
                    </li>
                    <li{{ Orchestra::is('orchestra/story::/', 'orchestra/story::*') ? $active : '' }}>
                        <a href="{{ handles('orchestra/story::/') }}">Blog</a>
                    </li>
                </ul>
            </div>
            <a class="open" href="#menu-primary">Menu</a>
        </div>
    </nav>
</div>
