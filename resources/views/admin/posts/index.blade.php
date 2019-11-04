@extends('layouts.app')



@section('content')

    <div class="panel panel-default">
        <div class="panel-heading">
            <button type="button" class="btn btn-secondary"> All Posts</button>
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
                    <th scope="col">Content</th>
                    <th scope="col">Edit</th>
                    <th scope="col">Trash</th>
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
                            <td>{{str_limit($post->body, 8)}}</td>
                            <td>
                                <a href="{{route('post.edit', $post->id)}}"><button type="button" class="btn btn-primary">Edit</button></a>
                            </td>
                            <td>
                                <a href="{{route('post.delete', $post->id)}}"><button type="button" class="btn btn-danger">Trash</button></a>
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
        },6000);

    </script>
@endsection
