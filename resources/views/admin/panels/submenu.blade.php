{{-- For submenu --}}
<ul class="menu-content">
    @if(isset($menu))
        @foreach($menu as $submenu)
            @php
                $middleware = isset($submenu->middleware) && $submenu->middleware ? $submenu->middleware : null;
            @endphp
            @if(is_null($middleware) || $permissions->where('name',$middleware)->first())
                <li @if($submenu->slug === Route::currentRouteName()) class="active" @endif>
                    <a href="{{isset($submenu->url) ? url($submenu->url):'javascript:void(0)'}}"
                       class="d-flex align-items-center"
                       target="{{isset($submenu->newTab) && $submenu->newTab === true  ? '_blank':'_self'}}">
                        @if(isset($submenu->icon))
                            <i data-feather="{{$submenu->icon}}"></i>
                        @endif
                        <span class="menu-item text-truncate">{{ __('locale.'.$submenu->name) }}</span>
                    </a>
                    @if (isset($submenu->submenu))
                        @include('admin/panels/submenu', ['menu' => $submenu->submenu,'permissions'=>$permissions])
                    @endif
                    @endif
                </li>
                @endforeach
            @endif
</ul>
