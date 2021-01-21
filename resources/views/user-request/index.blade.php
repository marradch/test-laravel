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
        @foreach($userRequests as $data)
            <tr>
                <th scope="row">{{ $data->id }}</th>
                <td>{{ $data->name }}</td>
                <td>{{ $data->title }}</td>
            </tr>
        @endforeach
        </tbody>
    </table>

    {{-- Pagination --}}
    <div class="d-flex justify-content-center">
        {{ $userRequests->links() }}
    </div>
@endsection
