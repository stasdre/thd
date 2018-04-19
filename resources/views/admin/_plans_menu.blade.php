<div class="row">
        <div class="col-sm-6">
                <ul class="nav nav-pills">
                    @if( isset($active) && isset($plan) )
                        <li role="presentation" class="{{ $active == 'details' ? 'active' : '' }}"><a href="{{ route('house-plan.edit', [$plan->id]) }}">Plan Detail</a></li>
                        <li role="presentation" class="{{ $active == 'graphics' ? 'active' : '' }}"><a href="{{ route('plan-images.create', [$plan->id]) }}">Graphics</a></li>
                        <li role="presentation" class="{{ $active == 'features' ? 'active' : '' }}"><a href="{{ route('plan-features.edit', [$plan->id]) }}">Key Features</a></li>
                        <li role="presentation" class="{{ $active == 'desc' ? 'active' : '' }}"><a href="{{ route('plan-desc.edit', [$plan->id]) }}">Plan Description</a></li>
                        <li role="presentation" class="{{ $active == 'pricing' ? 'active' : '' }}"><a href="{{ route('plan-packages.edit', [$plan->id]) }}">Pricing Options</a></li>
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
        </div>
        <div class="col-sm-3">
                @isset($plan)
                        @if($plan->is_active == 1)
                                <a class="btn btn-danger btn-lg" href="{{ route('house-plan.unpublish', [$plan]) }}" role="button">Unpublish Plan</a>
                        @else
                                <a class="btn btn-success btn-lg" href="{{ route('house-plan.publish', [$plan]) }}" role="button">Publish Plan</a>
                        @endif
                @endisset
        </div>
</div>