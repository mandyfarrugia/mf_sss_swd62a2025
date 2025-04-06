@extends('layouts.main')
@section('content')
    <div class="container">
        <div class="page-inner">
            <div class="page-header">
                <h3 class="fw-bold mb-3">College Management System</h3>
                <ul class="breadcrumbs mb-3">
                    <li class="nav-home">
                        <a href="{{ route('colleges.index') }}">
                            <i class="fa-solid fa-building-columns"></i>
                            <span class="px-2">All colleges</span>
                        </a>
                    </li>
                    <li class="separator">
                        <i class="fa-solid fa-chevron-right"></i>
                    </li>
                    <li class="nav-item">
                        <a href="#">Add new college</a>
                    </li>
                </ul>
            </div>
            <div class="row">
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-header">
                            <div class="card-title">Register a new college</div>
                        </div>
                        <div class="card-body">
                            <form action="{{ route('colleges.store') }}" method="post">
                                @csrf
                                @include('colleges._create_form')
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection