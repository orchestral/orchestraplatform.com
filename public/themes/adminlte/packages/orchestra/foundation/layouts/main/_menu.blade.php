<ul class="sidebar-menu">
    <li class="header">MAIN NAVIGATION</li>
    @foreach ($menu as $item)
        @if (1 > count($item->childs))
            <li id="{{ $item->id }}">
                <a href="{!! $item->link !!}">
                    {!! $item->title !!}
                </a>
            </li>
        @else
            <li id="{{ $item->id }}" class="treeview">
                <a href="#">{!! $item->title !!}</a>
                <ul class="treeview-menu">
                    @unless ($item->link == '#' && ! empty($item->link))
                    <li>
                        <a href="{!! $item->link !!}">
                            {!! $item->title !!}
                        </a>
                    </li>
                    <li class="divider"></li>
                    @endunless
                    @foreach ($item->childs as $child)
                        <?php $grands = $child->childs; ?>
                        <li class="{!! (! empty($grands) ? "dropdown-submenu" : "normal") !!}">
                            <a href="{!! $child->link !!}">
                                {!! $child->title !!}
                            </a>
                            @if (! empty($child->childs))
                            <ul class="dropdown-menu">
                                @foreach ($child->childs as $grand)
                                <li>
                                    <a href="{!! $grand->link !!}">
                                        {!! $grand->title !!}
                                    </a>
                                </li>
                                @endforeach
                            </ul>
                            @endif
                        </li>
                    @endforeach
                </ul>
            </li>
        @endif
    @endforeach
</ul>
