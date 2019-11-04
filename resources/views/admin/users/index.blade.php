@extends('layouts.app')

@section('content')

    <div class="panel panel-default">
        <div class="panel-heading">
            <button type="button" class="btn btn-secondary"> Users</button>
        </div>
        <div class="panel-body">
            @include('admin.includes.success')
            @include('admin.includes.info')
            <table class="table table-hover">
                <thead>
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">Image</th>
                    <th scope="col">Name</th>
                    <th scope="col">Permission</th>
                    <th scope="col">Deleted</th>
                </tr>
                </thead>
                <tbody>
                @if($users->count()>0)
                    @foreach($users as $user)
                        <tr>
                            <th scope="row">{{$user->id}}</th>
                            <td>
                                <img src="{{ asset(@$user->profile->avatar) }}" alt="" width="60px" height="60px" style="border-radius: 50%;">
                            </td>
                            <td>{{$user->name}}</td>
                            <td>
                                @if($user->admin)
                                    <a href="{{route('user.not.admin', $user->id)}}"><button type="button" class="btn btn-danger">Remove Admin</button></a>
                                    @else
                                    <a href="{{route('user.admin', $user->id)}}"><button type="button" class="btn btn-success">Make Admin</button></a>
                                @endif

                            </td>
                            <td>
                                Delete
                            </td>
                        </tr>
                    @endforeach
                @else
                    <tr>
                        <th colspan="5" class="text-center">No Users</th>
                    </tr>
                @endif

                </tbody>
            </table>
        </div>
    </div>

@endsection

@section('js-refresh')
    <script type="text/javascript">
        setTimeout(function(){
            location.reload();
        },6000);

    </script>
@endsection
