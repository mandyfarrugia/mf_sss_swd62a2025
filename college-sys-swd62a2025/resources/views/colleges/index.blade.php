@extends('layouts.main')
@section('content')
    <div class="container">
        <div class="page-inner">
            <div class="page-header">
                <div class="card w-100">
                    <div class="card-header">
                        <div class="card-title">
                            <span>Colleges</span>
                            <a class="btn btn-success btn-sm mx-2" href="{{ route('colleges.create') }}">
                                <i class="fa-solid fa-plus"></i>
                                <span>Add</span>
                            </a>
                        </div>
                    </div>
                    <div class="card-body">
                        @if($colleges->count())
                        <div class="table-responsive">
                            <table class="table table-bordered">
                                <thead>
                                    <tr>
                                        <th>College</th>
                                        <th>Address</th>
                                        <th>Actions</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($colleges as $college)
                                        <tr>
                                            <td>{{ $college->name }}</td>
                                            <td>{{ $college->address }}</td>
                                            <td>
                                                <div class="btn-group w-100" role="group" aria-label="Basic example">
                                                    <a href="{{ route('colleges.show', $college->id) }}" class="btn btn-action btn-sm">
                                                        <i class="fa-regular fa-eye"></i>
                                                    </a>
                                                    <a href="{{ route('colleges.edit', $college->id) }}" class="btn btn-action btn-sm">
                                                        <i class="fa-regular fa-pen-to-square"></i>
                                                    </a>
                                                    <a class="btn btn-danger btn-sm">
                                                        <i class="fa-regular fa-circle-xmark"></i>
                                                    </a>
                                                </div>
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                        @else
                            <p>No colleges found!</p>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection