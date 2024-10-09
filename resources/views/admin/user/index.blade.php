@extends('layouts.app')
@section('content')
    <div class="row">
        <div class="col-md-10">
            <h2>All Users</h2>
        </div>
    </div>
    <table class="table">
        <thead>
            <tr>
                <th scope="col">#</th>
                <th scope="col">name</th>
                <th scope="col">email</th>
                <th scope="col">Action</th>
            </tr>
        </thead>
        <tbody>
            @forelse ($users as $key => $product)
                <tr>
                    <th scope="row">{{ $key + 1 }}</th>
                    <th>{{ $product->name }}</th>
                    <th>{{ $product->email }}</th>
                    <th>
                        <a href="{{ route('user.delete', encrypt($product->id)) }}" class="btn btn-danger">Delete</a>
                    </th>
                </tr>
            @empty
                <h4 class="text-center text-danger">User not found</h4>
            @endforelse
        </tbody>
    </table>
@endsection
