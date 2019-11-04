@extends('layouts.app')


@section('content')

    <div class="panel panel-default">
        @include('admin.includes.errors')
        <div class="panel-heading">
            Crate a new user
        </div>
        <div class="panel-body">
            <form action="{{route('user.store')}}" method="post" >
                {{csrf_field()}}
                <div class="form-group">
                    <label for="name">Name</label>
                    <input type="text" name="name" class="form-control">
                </div>
                <div class="form-group">
                    <label for="email">Email Name</label>
                    <input type="email" name="email" class="form-control">
                </div>
                <div class="form-group">
                    <div class="text-center">
                        <button class="btn btn-success" name="submit">
                            Store User
                        </button>
                    </div>
                </div>

            </form>
        </div>
    </div>

@endsection
