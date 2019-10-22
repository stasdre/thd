@extends('layouts.index')

@section('content')
<div class="jumbotron jumbotron-fluid">
    <div class="container">
        <h1 class="display-4">Successfully!</h1>
        <p class="lead">Your order №{{$data['id']}}. In the near future, a manager will contact you to clarify the details.</p>
    </div>
</div>
@endsection