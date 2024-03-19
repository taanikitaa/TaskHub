@extends('layouts.master')

@section('title', 'Assign Role')

@section('content')
<div class="container mt-4">
    <div class="row justify-content-center">
        <div class="col-md-6">
            <div class="card" >
                <div class="card-header" style="background-color: #3A5169; ">
                    <h2 class="text-center" style="color: white;">Assign Role for {{ $user->name }}</h2>
                </div>
                <div class="card-body" style="color: #3A5169;">
                    <form action="{{ route('users.assignRole', $user->id) }}" method="POST">
                        @csrf
                        <div class="form-group">
                            <label for="role" class="font-weight-bold">Select Role:</label>
                            <select name="role" id="role" class="form-control" style="border: 2px solid #3A5169; color: #3A5169;">
                                @foreach ($roles as $role)
                                    <option value="{{ $role->name }}">{{ $role->name }}</option>
                                @endforeach
                            </select>
                        </div>
                        <br>
                        <div class="text-center">
                            <button type="submit" class="btn btn-primary" style="background-color: #3A5169; color: white;">Assign Role</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
