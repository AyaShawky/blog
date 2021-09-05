@extends('adminLayout')

@section('content')
        <div class="row">

            <div class="col-md-12">
                <div class="panel panel-default">
                    <div class="panel-heading">
                        <h2>
                            Comments

                            <a href="comments/create" class="btn btn-default pull-right">Create New</a>
                        </h2>
                    </div>

                    <div class="panel-body">
                        <table class="table">
                            <thead>
                                <tr>
                                    <th>Post</th>
                                    <th>Comment</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($comments as $item)
                                <tr>
                                    <td>{{$item->post->title}}</td>
                                    <td>{{$item->comment}}</td>
                                    <td>

                                        <form method="POST" action="comments/{{$item->id}} ">
                                            @method('delete')
                                            @csrf
                                        <button type="submit" class="btn btn-xs btn-danger">Delete</button>
                                        </form>
                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>

                        <div class="text-center">
                            {{$comments->render()}}
                        </div>

                    </div>
                </div>
            </div>

        </div>
@endsection
