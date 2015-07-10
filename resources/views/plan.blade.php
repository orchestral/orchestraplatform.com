@extends('layouts.website')

@set_meta('html::body.attributes', ['id' => 'plan'])

@section('content')
<section class="heading">
    <div class="container">
        <h1>@get_meta('title')</h1>
    </div>
</section>
<section class="body">
    <div class="container">
        <div class="row flat">
            <div class="col-xs-12 summary">
                <p>
                    At Orchestra Platform we always feel that our core products should be available to anyone at no cost (<a href="{{ handles('app::docs/latest/license') }}">MIT Licensed</a>).
                </p>
                <p>
                    However, at the same time we also aware that we need resources and money to continue improving Orchestra Platform and ensure that this project continue to grows with better documentation, extensions and themes.
                </p>
                <p>
                    If you have any question, feel free to contact us at {!! HTML::mailto('hello@orchestraplatform.besnappy.com') !!}.
                </p>
            </div>
            <hr>

            <div class="col-lg-4 col-md-4 col-xs-6">
                <ul class="plan free-plan">
                    <li class="plan-name">Free</li>
                    <li class="plan-price">
                        <strong>$0</strong> forever
                    </li>
                    <li>
                        <strong>License</strong> single user
                    </li>
                    <li>
                        <strong>Unlimited</strong> sites
                    </li>
                    <li>
                        <strong>Unlimited</strong> public support by our community
                    </li>
                    <li>
                        <strong>Bugfixes</strong> for maintained versions
                    </li>
                    <li class="plan-action">
                        <a href="{{ handles('app::docs/latest/installation') }}" class="btn btn-danger btn-lg">Download</a>
                    </li>
                </ul>
            </div>

            <div class="col-lg-4 col-md-4 col-xs-6">
                <ul class="plan standard-plan featured">
                    <li class="plan-name">Standard</li>
                    <li class="plan-price">
                        <strong>$100</strong> / year
                    </li>
                    <li>
                        <strong>License</strong> single user
                    </li>
                    <li>
                        <strong>Unlimited</strong> sites
                    </li>
                    <li>
                        <strong>Unlimited</strong> private support by our staff
                    </li>
                    <li>
                        <strong>Prioritize bugfixes</strong> for maintained versions
                    </li>
                    <li class="plan-action">
                        <a href="https://gum.co/orchestraplatform" class="btn btn-danger btn-lg">Subscribe</a>
                    </li>
                </ul>
            </div>

            <div class="col-lg-4 col-md-4 col-xs-6">
                <ul class="plan enterprise-plan">
                    <li class="plan-name">Enterprise</li>
                    <li class="plan-price">
                        <strong>$1000</strong> / year
                    </li>
                    <li>
                        <strong>License</strong> single user
                    </li>
                    <li>
                        <strong>Unlimited</strong> sites
                    </li>
                    <li>
                        <strong>Unlimited</strong> private support by our staff
                    </li>
                    <li>
                        <strong>Prioritize bugfixes</strong> for maintained versions
                    </li>
                    <li>
                        <strong>Extended support</strong> for any 2.x &amp; 3.x versions
                    </li>
                    <li class="plan-action">
                        <a href="https://gum.co/orchestraplatform-enterprise" class="btn btn-danger btn-lg">Subscribe</a>
                    </li>
                </ul>
            </div>
        </div>
    </div>
</section>
@stop
