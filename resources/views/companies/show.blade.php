@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="main-body">
            <div class="row">
                <div class="col-lg-4">
                    <div class="card">
                        <div class="card-body">
                            <div class="d-flex flex-column align-items-center text-center">
                                <img src="{{$company->logo}}" alt="{{$company->name}}" class="rounded-circle p-1 bg-primary" width="100">
                                <div class="mt-3">
                                    <h4>{{$company->name}}</h4>
                                    <a href="{{route('companies.edit',$company)}}" class="btn btn-outline-primary">Edit</a>
                                </div>
                            </div>
                            <hr class="my-4">
                            <ul class="list-group list-group-flush">
                                <li class="list-group-item d-flex justify-content-between align-items-center flex-wrap">
                                    <h6 class="mb-0"><i class="oi oi-envelope-closed me-2"></i>Email</h6>
                                    <span class="text-truncate col-md-8"><a class="text-secondary" href="mailto:{{$company->email}}" title="{{$company->name}}">{{$company->email}}</a></span>
                                </li>
                                <li class="list-group-item d-flex justify-content-between align-items-center flex-wrap">
                                    <h6 class="mb-0"><i class="oi oi-globe me-2"></i>Website</h6>
                                    <span class="text-truncate col-md-7"><a class="text-secondary" href="{{$company->website}}" target="_blank" title="{{$company->name}}">{{$company->website}}</a></span>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
                <div class="col-lg-8 mt-3 mt-lg-0">
                    <div class="row">
                        <div class="col-sm-12">
                            <div class="card">
                                <div class="card-body">
                                    <h5 class="d-flex align-items-center mb-3">Employees</h5>
                                    <div class="row justify-content-center">
                                        @include('partials.employee_list')
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
