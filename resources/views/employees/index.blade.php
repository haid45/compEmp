@extends('layouts.app')

@section('content')
    <div class="container">
        <h1>
            Employees <span class="float-end"><a href="{{route('employees.create')}}" class="btn btn-sm btn-success"><i class="oi oi-plus"></i></a></span>
        </h1>
        <div class="row justify-content-center">
            @include('partials.employee_list')
        </div>
    </div>
@endsection
