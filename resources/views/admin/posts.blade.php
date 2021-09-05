@extends('adminLayout')

@section('content')
        <div class="row">

            <div class="col-md-12">
                <div class="panel panel-default">
                    <div class="panel-heading">
                        <h2>
                            Posts

                       <a href="/posts/create" class="btn btn-default pull-right">Create New</a>
                        </h2>
                    </div>

                    <div class="panel-body">
                        <table class="table">
                            <thead>
                                <tr>
                                    <th>Title</th>
                                    <th>Body</th>
                                    <th>Author</th>
                                    <th>Category</th>
                                    <th>Tags</th>
                                    <th>Published</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>

                                @foreach ($posts as $item)
                                <tr>
                                    <td>{{$item->title}}</td>
                                    <td>{{$item->body}}</td>
                                    <td>{{$item->auther}}</td>
                                    <td>{{$item->category->name}}</td>
                                    {{-- <td>{{$item->tags}}</td> --}}
<td>
@foreach ($item->tags as $tag)
{{$tag->name}}
@endforeach
</td>



                                    <td>{{$item->published?"yes":"no"}}</td>
                                    <td>


                                        <a href="/posts/{{$item->id}}/publish"  class="btn btn-xs btn-warning">{{$item->published ?"unpublished":"published"}}</a>
                                        <a href="/posts/{{$item->id}}" class="btn btn-xs btn-success">Show</a>
                                        <a href="/posts/{{$item->id}}/edit" class="btn btn-xs btn-info">Edit</a>
                                        <form style="display: initial"
                                     action="/posts/{{$item->id}}"
                                     method="POST">
                                            @method('delete')
                                            <button type="submit"class="btn btn-xs btn-danger" >Delete</button>
@csrf
                                        </form>
                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>

                        {{-- <ul class="pagination">

                            <li class="disabled"><span>«</span></li>





                            <li class="active"><span>1</span></li>
                            <li><a href=/posts?page=2">2 </a> </li> <li><a href=/posts?page=3">3 </a> </li> <li><a href=/posts?page=2"
                                            rel="next">»</a></li>
                        </ul> --}}
                        <div class="text-center">
                            {{$posts->render()}}
                        </div>


                    </div>
                </div>
            </div>

        </div>
@endsection
