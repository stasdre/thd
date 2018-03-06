<ul class="nav nav-pills">
    @if( isset($active) && isset($plan) )
        <li role="presentation" class="{{ $active == 'details' ? 'active' : '' }}"><a href="{{ route('house-plan.edit', [$plan]) }}">Plan Detail</a></li>
        <li role="presentation" class="{{ $active == 'graphics' ? 'active' : '' }}"><a href="{{ route('plan-images.create', [$plan]) }}">Graphics</a></li>
        <li role="presentation" class="{{ $active == 'features' ? 'active' : '' }}"><a href="{{ route('plan-features.create', [$plan]) }}">Key Features</a></li>
        <li role="presentation" class=""><a href="#">Plan Description</a></li>
        <li role="presentation" class=""><a href="#">Pricing Options</a></li>
        <li role="presentation" class=""><a href="#">Preview Plan Page</a></li>
    @else
        <li role="presentation" class="active"><a href="{{ route('house-plan.create') }}">Plan Detail</a></li>
        <li role="presentation" class="disabled"><a href="#">Graphics</a></li>
        <li role="presentation" class="disabled"><a href="#">Key Features</a></li>
        <li role="presentation" class="disabled"><a href="#">Plan Description</a></li>
        <li role="presentation" class="disabled"><a href="#">Pricing Options</a></li>
        <li role="presentation" class="disabled"><a href="#">Preview Plan Page</a></li>
    @endif
</ul>
