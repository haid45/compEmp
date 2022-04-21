@if($employees->isNotEmpty())
    <table class="table">
        <thead>
        <tr>
            <th>Name</th>
            <th>Company</th>
            <th>Email</th>
            <th></th>
        </tr>
        </thead>
        <tbody>
        @foreach($employees as $employee)
            <tr>
                <td>{{$employee->name}}</td>
                <td><a href="{{route('companies.show',$employee->company)}}">{{$employee->company->name}}</a></td>
                <td><a href="mailto:{{$employee->email}}" title="{{$employee->name}}">{{$employee->email}}</a></td>
                <td>
                    <a href="{{route('employees.show',$employee)}}" class="btn btn-primary btn-sm my-1"><i class="oi oi-eye"></i></a>
                    <a href="{{route('employees.edit',$employee)}}" class="btn btn-success btn-sm my-1"><i class="oi oi-pencil"></i></a>
                    <form action="{{route('employees.destroy',$employee)}}" method="POST" class="delCom">
                        {{ method_field('DELETE') }}
                        {{ csrf_field() }}
                        <button type="submit" class="btn btn-danger btn-sm my-1"><i class="oi oi-trash"></i></button>
                    </form>
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>
    {{$employees->links()}}
    @include('partials.confirm_modal')
@else
    <h6>List is empty</h6>
@endif
