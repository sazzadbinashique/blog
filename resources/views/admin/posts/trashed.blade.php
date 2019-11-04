@extends('layouts.app')



@section('content')

    <div class="panel panel-default">
        <div class="panel-heading">
            <button type="button" class="btn btn-secondary"> Trashed Posts</button>
        </div>
        <div class="panel-body">
            @include('admin.includes.success')
            @include('admin.includes.info')
            <table class="table table-hover">
                <thead>
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">Title</th>
                    <th scope="col">Image</th>
                    <th scope="col">Category Name</th>
                    <th scope="col">Restore</th>
                    <th scope="col">Permanenly Delete</th>
                </tr>
                </thead>
                <tbody>
                @if($posts->count()>0)
                    @foreach($posts as $post)
                        <tr>
                            <th scope="row">{{$post->id}}</th>
                            <td>{{$post->title}}</td>
                            <td><img src="{{ $post->featured}}" alt="{{$post->title}}" width="90px" height="50px"></td>
                            <td>{{$post->category->name}}</td>
                            <td>
                                <a href="{{route('post.restore', $post->id)}}"><button type="button" class="btn btn-primary">Restore</button></a>
                            </td>
                            <td>
                                <a href="{{route('post.kill', $post->id)}}"><button type="button" class="btn btn-danger">Delete</button></a>
                            </td>
                        </tr>
                    @endforeach
                @else
                    <tr>
                        <th colspan="5" class="text-center">No published posts</th>
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
        },5000);

    </script>
@endsection
