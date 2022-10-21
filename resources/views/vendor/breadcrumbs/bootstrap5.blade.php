@unless ($breadcrumbs->isEmpty())
    <ul>
        @foreach ($breadcrumbs as $breadcrumb)
            @if ($breadcrumb->url && !$loop->last)
                <li><a href="{{ $breadcrumb->url }}">{{ $breadcrumb->title }}</a></li>
                <li>
                    <i class='bx bx-chevron-right'></i>
                </li>
            @else
                <li>{{ $breadcrumb->title }}</li>
            @endif
        @endforeach
    </ul>
@endunless
