@extends('layouts.main')
@section('content')
<form action="{{ route('colleges.store') }}" method="post" enctype="multipart/form-data">
    @include('colleges._create_form')
</form>
@endsection