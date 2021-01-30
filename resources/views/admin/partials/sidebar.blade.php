<div class="app-sidebar__overlay" data-toggle="sidebar"></div>
<aside class="app-sidebar">
    <ul class="app-menu">
        <li>
            <a class="app-menu__item {{ Route::currentRouteName() == 'admin.days' ? 'active' : '' }}" href="{{ session('rooms') }}"><i class="fa fa-bed" aria-hidden="true" style="padding-right: 7px"></i>
                <span class="app-menu__label">Rooms</span>
            </a>
        </li>

        <li>
            <a class="app-menu__item {{ Route::currentRouteName() == 'admin.guests.all' ? 'active' : '' }}"
               href="{{ route('admin.guests.all') }}">
                <i class="fa fa-users" aria-hidden="true" style="padding-right: 7px"></i>
                <span class="app-menu__label">Guests</span>
            </a>
        </li>
        <li>
            <a class="app-menu__item {{ Route::currentRouteName() == 'admin.days.create' ? 'active' : '' }}"
               href="{{ route('admin.days.create') }}"><i class="app-menu__icon fa fa-cogs"></i>
                <span class="app-menu__label">Settings</span>
            </a>
        </li>
    </ul>
</aside>
