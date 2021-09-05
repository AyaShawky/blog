
@extends('layout')
@section('content')


        <div class="row">

            <div class="col-md-12">
                <div class="panel panel-default">
                    <div class="panel-heading">
                       {{$post->title}} - <small>by Prof. {{$post->auther}}</small>

                        <span class="pull-right">
                            Thu, Jan 10, 2019 7:50 AM
                        </span>
                    </div>

                    <div class="panel-body">
                        <p>{{$post->body}}</p>
                        <p>
                            Category: <span class="label label-success">{{$post->category_id}}</span> <br>


                            Tags:  <span class="label label-danger">  @foreach ($post->tags as $tag)
                                {{$tag->name}}
                                @endforeach</span>
                        </p>
                    </div>
                </div>


                @foreach ($post->comments as $item)


                <div class="panel panel-default">
                    <div class="panel-heading">
                        {{$post->auther}}

                        <span class="pull-right">{{$item->created_at->diffForHumans()}}<span>
                    </div>

                    <div class="panel-body">
                        <p>{{$item->comment}}</p>
                    </div>
                </div>
                @endforeach


                <form action="/saveComment/{{$post->id}}" method="post">
                    @csrf
                    <div class="form-group">
                        <label for="comment">Comment:</label>
                        <textarea class="form-control" rows="5" id="comment" name="content"></textarea>
                      </div>
                      <button type="submit" class="btn btn-success">Comment</button>
                </form>
                
            </div>



        </div>

        @endsection

