@extends('layouts.main')
@section('content')
    <div class="container">
        <div class="page-inner">
            @if($message = session('success'))
                <div class="alert alert-success" role="alert">
                    {{ $message }}
                </div>
            @elseif($message = session('error'))
                <div class="alert alert-danger" role="alert">
                    {{ $message }}
                </div>
            @endif
            <div class="page-header">
                <div class="card w-100">
                    <div class="card-header">
                        <div class="card-title">
                            <span>Students</span>
                            <a class="btn btn-success btn-sm mx-2" href="{{ route('students.create') }}">
                                <i class="fa-solid fa-plus"></i>
                                <span>Add</span>
                            </a>
                            <div class="col-md-4 col-sm-12 mt-2">
                                @include('students._filter_students_college')
                            </div>
                            <div class="col-md-4 col-sm-12 mt-3 mb-0">
                                @include('students._sort_student_name')
                            </div>
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
                                                    <div class="btn-group w-100" role="group">
                                                        <a href="{{ route('students.show', $student->id) }}"
                                                            class="btn btn-action btn-sm">
                                                            <i class="fa-regular fa-eye"></i>
                                                        </a>
                                                        <a class="btn btn-action btn-sm"
                                                            href="{{ route('students.edit', $student->id) }}">
                                                            <i class="fa-regular fa-pen-to-square"></i>
                                                        </a>
                                                        <a class="btn btn-danger btn-delete btn-sm"
                                                            href="{{ route('students.destroy', $student->id) }}">
                                                            <i class="fa-regular fa-circle-xmark"></i>
                                                        </a>
                                                    </div>
                                                </td>
                                            </tr>
                                        @endforeach
                                        <form id="entity-delete-form" method="post">
                                            @csrf
                                            @method('DELETE')
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