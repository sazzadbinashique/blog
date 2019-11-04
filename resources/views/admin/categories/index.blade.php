@extends('layouts.app')



@section('content')

   <div class="panel panel-default">
       <div class="panel-heading">
           <button type="button" class="btn btn-secondary"> All Categories</button>
       </div>
       <div class="panel-body">
           @include('admin.includes.success')
           @include('admin.includes.info')
           <table class="table table-hover">
               <thead>
               <tr>
                   <th scope="col">#</th>
                   <th scope="col">Name</th>
                   <th scope="col">Edit</th>
                   <th scope="col">Delete</th>
               </tr>
               </thead>
               <tbody>
               @if($categories->count()>0)
                   @foreach($categories as $category)
                       <tr>
                           <th scope="row">{{$category->id}}</th>
                           <td>{{$category->name}}</td>
                           <td>
                               <a href="{{route('category.edit', $category->id)}}"><button type="button" class="btn btn-primary">Edit</button></a>
                           </td>
                           <td>
                               <a href="{{route('category.delete', $category->id)}}"><button type="button" class="btn btn-danger">Delete</button></a>
                           </td>
                       </tr>
                   @endforeach
               @else
                   <tr>
                       <th colspan="5" class="text-center">No Category Yet</th>
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
