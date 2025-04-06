@extends('layouts.main')
@section('content')
    <div class="container">
        <div class="page-inner">
            <div class="page-header">
                <div class="card w-100">
                    <div class="card-header">
                        <div class="card-title">
                            <span>Students</span>
                            <a class="btn btn-success btn-sm mx-2" href="{{ route('students.create') }}">
                                <i class="fa-solid fa-plus"></i>
                                <span>Add</span>
                            </a>
                        </div>
                    </div>
                    <div class="card-body">
                        @if($students->count())
                            <div class="table-responsive">
                                <table class="table table-bordered">
                                    <thead>
                                        <tr>
                                            <th>Name</th>
                                            <th>Email</th>
                                            <th>Phone</th>
                                            <th>Date of birth</th>
                                            <th>College</th>
                                            <th>Actions</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($students as $student)
                                            <tr>
                                                <td>{{ $student->name }}</td>
                                                <td>{{ $student->email }}</td>
                                                <td>{{ $student->phone }}</td>
                                                <td>{{ $student->dob }}</td>
                                                <td>{{ $student->college->name }}</td>
                                                <td>
                                                    <div class="btn-group w-100" role="group" aria-label="Basic example">
                                                        <a href="{{ route('students.show', $student->id) }}"
                                                            class="btn btn-action btn-sm">
                                                            <i class="fa-regular fa-eye"></i>
                                                        </a>
                                                        <a class="btn btn-action btn-sm">
                                                            <i class="fa-regular fa-pen-to-square"></i>
                                                        </a>
                                                        <a class="btn btn-danger btn-delete btn-sm">
                                                            <i class="fa-regular fa-circle-xmark"></i>
                                                        </a>
                                                    </div>
                                                </td>
                                            </tr>
                                        @endforeach
                                        <form id="entity-delete-form" method="POST">
                                            @method('DELETE')
                                            @csrf
                                        </form>
                                    </tbody>
                                </table>
                            </div>
                        @else
                            <p>No students found!</p>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection