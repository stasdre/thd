<div class="alert alert-{{ $type }} alert-dismissible @isset($autoHide) thd-alerts-messages @endisset">
    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
    <h4>
        @switch($type)
            @case('danger')
                <i class="icon fa fa-ban"></i>
                @break

            @case('info')
                <i class="icon fa fa-info"></i>
                @break

            @case('warning')
                <i class="icon fa fa-warning"></i>
                @break

            @case('success')
                <i class="icon fa fa-check"></i>
                @break

        @endswitch

        @isset($title) {{ $title }} @endisset
    </h4>
    @isset($slot) {{ $slot }} @endisset
</div>