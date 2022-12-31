@extends('dashboard.main.master')
@section('title','User Data')
@section('content')
<section class="section">
    <div class="row" id="table-bordered">
        <div class="col-12">
            <div class="card">
                <div class="card-header d-flex justify-content-between">
                    <h4 class="card-title">User Data</h4>
                    <a href="{{ route('createuser') }}" class="btn btn-secondary">Create</a>
                </div>
                <div class="card-content">
                    <div class="table-responsive p-4">
                        <table class="table table-bordered mb-0">
                            <thead>
                                <tr>
                                    <th>NAME</th>
                                    <th>EMAIL</th>
                                    <th>TELEPHONE</th>
                                    <th>ACTION</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($users as $user)
                                <tr>
                                    <td class="text-bold-500">{{ $user->name }}</td>
                                    <td>{{ $user->email }}</td>
                                    <td class="text-bold-500">{{ $user->telp }}</td>
                                    <td>
                                        <a href="{{ route('edituser',$user->id) }}" class="btn btn-warning">Edit</a>
                                        <a href="{{ route('destroyuser',$user->id) }}" class="btn btn-danger">Delete</a>
                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection
