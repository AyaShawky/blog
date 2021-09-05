
@extends('adminLayout')
@section('content')


        <div class="row">
          <div class="col-md-12">
            <div class="panel panel-default">
              <div class="panel-heading">
                <h2>
                  Edit Post

                  <a href="/posts" class="btn btn-default pull-right"
                    >Go Back</a
                  >
                </h2>
              </div>

              <div class="panel-body">
                <form
                  method="POST"
                  action="/posts/{{$post->id}}"
                  accept-charset="UTF-8"
                  class="form-horizontal"
                  role="form"
                >
                  <div class="form-group">
                    <label for="title" class="col-md-2 control-label"
                      >Title</label >

                      @method('put')
                      @csrf
                    <div class="col-md-8">
                      <input
                        class="form-control"
                        required="required"
                        autofocus="autofocus"
                        name="title"
                        type="text"
                        value="{{$post->title}}"
                        id="title"
                      />

                      <span class="help-block">
                        <strong></strong>
                      </span>
                    </div>
                  </div>

                  <div class="form-group">
                    <label for="body" class="col-md-2 control-label"
                      >Body</label
                    >

                    <div class="col-md-8">
                      <textarea
                        class="form-control"
                        required="required"
                        name="body"
                        cols="50"
                        rows="5"
                        id="body"
                      >{{$post->body}}
                           </textarea>

                      <span class="help-block">
                        <strong></strong>
                      </span>
                    </div>
                  </div>

                  <div class="form-group">
                    <label for="category_id" class="col-md-2 control-label"
                      >Category</label
                    >

                    <div class="col-md-8">
                      <select
                        class="form-control"
                        required="required"
                        id="category_id"
                        name="category_id"

                        >
                        @foreach ($categories as $item)
                        <option value="{{$item->id}}"{{$item->id==$post->category_id?"selected":""}}>{{$item->name}}</option>
                        @endforeach
                        </select>

                      <span class="help-block">
                        <strong></strong>
                      </span>
                    </div>


                  </div>

                  <div class="form-group">
                    <label for="tag_id" class="col-md-2 control-label"
                      >Tags</label >

                    <div class="col-md-8">
                      <select
                        class="form-control"
                        required="required"
                        autofocus="autofocus"
                        name="tag_id[]"
                        type="text"
                        id="tag_id"
                        multiple
                      >

                      @foreach ($tags as $item)
                      <option value="{{$item->id}}"
                          @foreach ($post->tags as $postTag)
                      {{$item->id == $postTag->id ? "selected" : ""}}
                      @endforeach 
                      >

                      {{$item->name}}</option>
                      @endforeach

                      </select>
                      <span class="help-block">
                        <strong></strong>
                      </span>
                    </div>
                  </div>

                  <div class="form-group">
                    <label for="auther" class="col-md-2 control-label"
                      >Auther</label >

                    <div class="col-md-8">
                      <input
                        class="form-control"
                        required="required"
                        autofocus="autofocus"
                        name="auther"
                        type="text"
                        value="{{$post->auther}}"
                        id="auther"
                      />

                      <span class="help-block">
                        <strong></strong>
                      </span>
                    </div>
                  </div>


                  <div class="form-group">
                    <div class="col-md-8 col-md-offset-2">
                      <button type="submit" class="btn btn-primary">
                        Update
                      </button>
                    </div>
                  </div>
                </form>
              </div>
            </div>
          </div>
        </div>

        @endsection
