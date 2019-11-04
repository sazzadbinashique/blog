@extends('layouts.app')


@section('content')

   <div class="panel panel-default">
       @include('admin.includes.errors')
       <div class="panel-heading">
           Crate a new Post
       </div>
       @include('admin.includes.success')
       <div class="panel-body">
           <form action="{{route('post.store')}}" method="post" enctype="multipart/form-data">
               {{csrf_field()}}
               <div class="form-group">
                   <label for="title">Title</label>
                   <input type="text" name="title" class="form-control">
               </div>
               <div class="form-group">
                   <label for="category">Select a Category</label>
                   <select name="category_id" id="category" class="form-control">
                       @foreach($categories as $category)
                           <option value="{{$category->id}}">{{$category->name}}</option>
                       @endforeach
                   </select>
               </div>
               <div class="form-group">
                   <label for="tags">Select Tags</label>
                   @foreach($tags as $tag)
                        <div class="checkbox">
                            <label><input type="checkbox" name="tags[]" value="{{$tag->id}}"> {{strtoupper($tag->tag)}}</label>
                        </div>
                   @endforeach
               </div>
               <div class="form-group">
                   <label for="featured">Featured Image</label>
                   <input type="file" name="featured" class="form-control">
               </div>
               <div class="form-group">
                   <label for="body">Body Content</label>
                   <textarea name="body" id="body" cols="5" rows="5" class="form-control"></textarea>
               </div>
               <div class="form-group">
                   <div class="text-center">
                       <button class="btn btn-success" name="submit">
                           Store Post
                       </button>
                   </div>
               </div>

           </form>
       </div>
   </div>

@endsection

