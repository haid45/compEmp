@extends('layouts.app')

@section('content')
    <div class="container">
        <h1>
            Companies <span class="float-end"><a href="{{route('companies.create')}}" class="btn btn-sm btn-success"><i class="oi oi-plus"></i></a></span>
        </h1>
        <div class="row justify-content-center">
            <table class="table">
                <thead>
                <tr>
                    <th>Logo</th>
                    <th>Name</th>
                    <th>Email</th>
                    <th>Website</th>
                    <th></th>
                </tr>
                </thead>
                <tbody>
                @foreach($companies as $company)
                    <tr>
                        <td><img src="{{$company->logo}}" height="50"></td>
                        <td>{{$company->name}}</td>
                        <td><a href="mailto:{{$company->email}}" title="{{$company->name}}">{{$company->email}}</a></td>
                        <td><a href="{{$company->website}}" target="_blank" title="{{$company->name}}">{{$company->website}}</a></td>
                        <td>
                            <a href="{{route('companies.show',$company)}}" class="btn btn-primary btn-sm my-1"><i class="oi oi-eye"></i></a>
                            <a href="{{route('companies.edit',$company)}}" class="btn btn-success btn-sm my-1"><i class="oi oi-pencil"></i></a>
                            <form action="{{route('companies.destroy',$company)}}" method="POST" class="delCom">
                                {{ method_field('DELETE') }}
                                {{ csrf_field() }}
                                <button type="submit" class="btn btn-danger btn-sm my-1"><i class="oi oi-trash"></i></button>
                            </form>
                        </td>
                    </tr>
                @endforeach
                </tbody>
            </table>
            {{$companies->links()}}
        </div>
    </div>
@endsection
