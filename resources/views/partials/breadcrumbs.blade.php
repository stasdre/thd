@if (count($breadcrumbs))

    <ol class="breadcrumb">
        @foreach ($breadcrumbs as $breadcrumb)

            @if ($breadcrumb->url && !$loop->last)
                <li><a href="{{ $breadcrumb->url }}">{!! $loop->first ? '<i class="fa fa-dashboard"></i> ' : '' !!}{{ $breadcrumb->title }}</a></li>
            @else
                <li class="active">{!! $loop->first ? '<i class="fa fa-dashboard"></i> ' : '' !!}{{ $breadcrumb->title }}</li>
            @endif

        @endforeach
    </ol>

@endif