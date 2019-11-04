@extends('layouts.app')


@section('content')

    <div class="panel panel-default">

                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                            @include('admin.includes.errors')

        <div class="panel-heading">
            Update Category:: {{$category->name}}
        </div>
        <div class="panel-body">
            <form action="{{route('category.update', $category->id)}}" method="post" >
                {{csrf_field()}}
                <div class="form-group">
                    <label for="name">Title</label>
                    <input type="text" name="name" value="{{$category->name}}" class="form-control">
                </div>
                <div class="form-group">
                    <div class="text-center">
                        <button class="btn btn-success" name="submit">
                            Update Post
                        </button>
                    </div>
                </div>

            </form>
        </div>
    </div>

@endsection
