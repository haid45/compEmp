@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="main-body">
            <div class="row">
                <div class="px-md-5">
                    <div class="card">
                        <div class="card-body">
                            <div class="d-flex flex-column align-items-center text-center">
                                <span class="rounded-circle p-1 oi oi-person h1">
                                <div class="mt-3">
                                    <h4>{{$employee->name}}</h4>
                                    <a href="{{route('employees.edit',$employee)}}" class="btn btn-outline-primary">Edit</a>
                                </div>
                            </div>
                            <hr class="my-4">
                            <ul class="list-group list-group-flush">
                                <li class="list-group-item d-flex justify-content-between align-items-center flex-wrap">
                                    <h6 class="mb-0"><i class="oi oi-envelope-closed me-2"></i>Email</h6>
                                    <span class="text-truncate col-md-8"><a class="text-secondary" href="mailto:{{$employee->email}}" title="{{$employee->name}}">{{$employee->email}}</a></span>
                                </li>
                                <li class="list-group-item d-flex justify-content-between align-items-center flex-wrap">
                                    <h6 class="mb-0"><i class="oi oi-phone me-2"></i>Phone</h6>
                                    <span class="text-truncate col-md-7"><a class="text-secondary" href="tel:{{$employee->phone}}" title="{{$employee->name}}">{{$employee->phone}}</a></span>
                                </li>
                                <li class="list-group-item d-flex justify-content-between align-items-center flex-wrap">
                                    <h6 class="mb-0"><i class="oi oi-home me-2"></i>Company</h6>
                                    <span class="text-truncate col-md-7"><a class="text-secondary" href="{{route('companies.show',$employee->company->id)}}" title="{{$employee->company->name}}">{{$employee->company->name}}</a></span>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
