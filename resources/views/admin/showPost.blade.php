@extends('adminLayout')
@section('content')


        <div class="row">
          <div class="col-md-12">
            <div class="panel panel-default">
              <div class="panel-heading">
                <h2>

                  <small>by Prof. General Huel IV</small>

                  <a href="/posts" class="btn btn-default pull-right"
                    >Go Back</a
                  >
                </h2>
              </div>

              <div class="panel-body">
                <p><strong>Title:</strong>{{$post->title}} </p>
                <p><strong>Body:</strong>{{$post->body}}</p>
                <p><strong>Auther:</strong>{{$post->auther}}</p>
                <p><strong>Category:</strong>{{$post->category->name}} </p>
                <p><strong>Tags:</strong>@foreach ($post->tags as $tag)
                    {{$tag->name}}
                    @endforeach </p>
              </div>
            </div>
          </div>
        </div>
        @endsection

