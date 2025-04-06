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
                            <span class="px-2">All colleges</span>
                        </a>
                    </li>
                    <li class="separator">
                        <i class="fa-solid fa-chevron-right"></i>
                    </li>
                    <li class="nav-item">
                        <a href="#">{{ $collegeById->name }}</a>
                    </li>
                </ul>
            </div>
            <div class="page-category">
                <h5><strong>{{ $collegeById->name }}</strong></h5>
                <p><strong>Address: </strong>{{ $collegeById->address }}</p>
            </div>
        </div>
    </div>
@endsection