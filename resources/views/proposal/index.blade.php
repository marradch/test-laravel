@extends('layouts/master')
@section('content')
    <table class="table table-bordered mb-5">
        <thead>
        <tr class="table-success">
            <th scope="col">#</th>
            <th scope="col">Name</th>
            <th scope="col">Title</th>
        </tr>
        </thead>
        <tbody>
        @foreach($entities as $data)
            <tr>
                <th scope="row">{{ $data->getId() }}</th>
                <td>{{ $data->getName() }}</td>
                <td>{{ $data->getTitle() }}</td>
            </tr>
        @endforeach
        </tbody>
    </table>

    {{-- Pagination --}}
    <div class="d-flex justify-content-center">
        {!! $links !!}
    </div>
@endsection
