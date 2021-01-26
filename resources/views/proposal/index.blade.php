@extends('layouts/master')
@section('content')

<div class="js-cards">

@include('proposal/list')

</div>

<a href="#" class="btn btn-primary js-more-proposals">More proposals</a>

@endsection
