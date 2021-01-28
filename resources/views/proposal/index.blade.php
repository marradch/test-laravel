@php
    /**
     * @var $proposals array
     */
@endphp

@extends('layouts/master')
@section('content')

<div data-js-proposal-cards>

@include('proposal/list', ['proposals' => $proposals])

</div>

@endsection
