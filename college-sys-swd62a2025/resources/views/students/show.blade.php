@extends('layouts.main')
@section('content')
    <div class="container">
        <div class="page-inner">
            <div class="page-header">
                <h4 class="page-title">College Management</h4>
                <ul class="breadcrumbs">
                    <li class="nav-home">
                        <a href="{{ route('colleges.index') }}">
                            <i class="fa-solid fa-building-columns"></i>
                            <span class="px-2">All students</span>
                        </a>
                    </li>
                    <li class="separator">
                        <i class="fa-solid fa-chevron-right"></i>
                    </li>
                    <li class="nav-item">
                        <a href="#">{{ $studentById->name }}</a>
                    </li>
                </ul>
            </div>
            <div class="page-category">
                <h5><strong>{{ $studentById->name }}</strong></h5>
                <p>{{ $studentById->email }}</p>
                <p>{{ $studentById->phone }}</p>
                <p>{{ $studentById->dob }}</p>
                <p>{{ $studentById->college->name }}</p>
            </div>
        </div>
    </div>
@endsection