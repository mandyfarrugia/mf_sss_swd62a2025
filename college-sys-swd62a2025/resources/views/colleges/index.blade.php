@extends('layouts.main')
@section('content')
    <div class="container">
        <div class="page-inner">
            <div class="page-header">
                <div class="card w-100">
                    <div class="card-header">
                        <div class="card-title">Responsive Table</div>
                    </div>
                    <div class="card-body">
                        <div class="card-sub">
                            Create responsive tables by wrapping any table with
                            <code class="highlighter-rouge">.table-responsive</code>
                            <code class="highlighter-rouge">DIV</code> to make them
                            scroll horizontally on small devices
                        </div>
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
                                                    <button type="button" class="btn btn-action">
                                                        <i class="fa-regular fa-eye"></i>
                                                    </button>
                                                    <button type="button" class="btn btn-action">
                                                        <i class="fa-regular fa-pen-to-square"></i>
                                                    </button>
                                                    <button type="button" class="btn btn-danger">
                                                        <i class="fa-regular fa-circle-xmark"></i>
                                                    </button>
                                                </div>
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection