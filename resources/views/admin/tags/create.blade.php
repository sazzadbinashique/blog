@extends('layouts.app')


@section('content')

    <div class="panel panel-default">
        @include('admin.includes.errors')
        <div class="panel-heading">
            Crate a new Tag
        </div>
        <div class="panel-body">
            <form action="{{route('tag.store')}}" method="post" >
                {{csrf_field()}}
                <div class="form-group">
                    <label for="tag">Tag Name</label>
                    <input type="text" name="tag" class="form-control">
                </div>
                <div class="form-group">
                    <div class="text-center">
                        <button class="btn btn-success" name="submit">
                            Store Tag
                        </button>
                    </div>
                </div>

            </form>
        </div>
    </div>

@endsection
