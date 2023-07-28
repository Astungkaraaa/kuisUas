@extends('admin.main')

@section('contents')
<div class="container my-3">
    {{-- title --}}
    <div class="row">
        <div class="col-4" style="color: #D6ABA2;">
            <h1>Dashboard</h1>
        </div>
    </div>  
    <hr style="margin-top:0px; margin-bottom:0px">
    {{-- subtitle --}}
    <div class="row mt-1">
        <div class="col-4" >
            <h3 class="text-secondary">List of Users</h3>
        </div>
    </div>
    {{-- table --}}
    <table class="table table-striped">
        <thead>
        <tr>
            <th scope="col">Dating Id</th>
            <th scope="col">Name</th>
            <th scope="col">Dating Code</th>
            <th scope="col">Date of Birth</th>
            <th scope="col">Gender</th>
            <th scope="col">Email</th>
            <th scope="col">Phone Number</th>
            <th scope="col">Action</th>
        </tr>
        </thead>
        <tbody>
            @foreach ($users as $user)
            <tr>
                <th scope="row">{{ $user->dating_id }}</th>
                <td>{{ $user->name }}</td>
                <td>{{ $user->datingCode }}</td>
                <td>{{ $user->dob }}</td>
                <td>
                    @if ($user->gender == 1)
                        Male
                    @else
                        Female
                    @endif
                </td>
                <td>{{ $user->email }}</td>
                <td>{{ $user->phoneNumber }}</td>
                <td>
                {{-- <a href="#" class="text-decoration-none text-white"> --}}
                    <button type="button" class="btn btn-danger ">
                        Ban
                    </button>
                {{-- </a> --}}
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>


</div>    

@endsection