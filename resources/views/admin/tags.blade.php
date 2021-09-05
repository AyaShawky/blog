@extends('adminLayout')

@section('content')
        <div class="row">


            <div class="col-md-12">
                <div class="panel panel-default">
                    <div class="panel-heading">
                        <h2>
                            Tags

                            <a href="/tags/create" class="btn btn-default pull-right">Create New</a>
                        </h2>
                    </div>

                    <div class="panel-body">
                        <table class="table">
                            <thead>
                                <tr>
                                    <th>Name</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>

                    @foreach ($tags as  $item)
                    <tr>
                        <td> {{$item->name}}</td>

                        <td>
                        <form method="POST" action="tags/{{$item->id}} ">
                            @method('delete')
                            @csrf
                            <button type="submit" class="btn btn-xs btn-danger">Delete</button>
                        </form>
                        </td>
                    </tr>
                    <tr>
                    @endforeach
                            </tbody>
                        </table>

                        <div class="text-center">
                            {{$tags->render()}}
                        </div>

                    </div>
                </div>
            </div>

        </div>
@endsection
