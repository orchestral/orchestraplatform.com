<aside class="main-sidebar">
    <section class="sidebar">
        <?php $user = app('auth')->user(); ?>

        @if (! is_null($user))
        <div class="user-panel">
            <div class="pull-left image">
                <img src="{{ app('orchestra.avatar')->user($user) }}" class="img-circle" alt="User Image" />
            </div>
            <div class="pull-left info">
                <p>{{ $user->fullname }}</p>
                <a href="{{ handles('orchestra::account') }}"><i class="fa fa-circle text-success"></i> Online</a>
            </div>
        </div>
        @endif

        @include('orchestra/foundation::layouts.main._menu', ['menu' => app('orchestra.platform.menu')])
    </section>
</aside>
