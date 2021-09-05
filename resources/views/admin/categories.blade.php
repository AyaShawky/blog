@extends('adminLayout')

@section('content')
        <div class="row">


            <div class="col-md-12">
                <div class="panel panel-default">
                    <div class="panel-heading">
                        <h2>
                            Categories

                            <a href="categories/create" class="btn btn-default pull-right">Create New</a>
                        </h2>
                    </div>

                    <div class="panel-body">
                        <table class="table">
                            <thead>
                                <tr>
                                    <th>Name</th>
                                    <th>Post Count</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>

                              @foreach ($categories as $item)
                              <tr>
                                <td>{{$item->name}}</td>
                                <td>{{$item->posts->count()}}</td>
                                <td>
                                    <a href="categories/{{$item->id}}/edit" class="btn btn-xs btn-info">Edit</a>
                                    <form   style="display: initial" method="POST" action="categories/{{$item->id}}">
                                        @method('delete')
                                        @csrf
                                    <button type="submit" class="btn btn-xs btn-danger">Delete</a>
                                    </button>
                                    </form>
                                </td>
                            </tr>
                              @endforeach
                            </tbody>
                        </table>


                        {{$categories->links()}}
                    </div>
                </div>
            </div>

        </div>
@endsection
