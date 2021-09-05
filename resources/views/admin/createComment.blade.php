@extends('adminLayout')
@section('content')



        <div class="row">
          <div class="col-md-12">
            <div class="panel panel-default">
              <div class="panel-heading">
                <h2>
                  Create Comment

                  <a href="/comments" class="btn btn-default pull-right"
                    >Go Back</a
                  >
                </h2>
              </div>

              <div class="panel-body">
                <form
                  method="POST"
                  action="/comments"
                  accept-charset="UTF-8"
                  class="form-horizontal"
                  role="form"
                >
                  <div class="form-group">
                    <label for="comment" class="col-md-2 control-label"
                      >Comment</label
                    >
                    @csrf

                    <div class="col-md-8">
                      <input
                        class="form-control"
                        required="required"
                        autofocus="autofocus"
                        name="comment"
                        type="text"
                        id="name"

                      />

@csrf
                      <span class="help-block">
                        <strong></strong>
                      </span>
                    </div>
                  </div>

                  <div class="form-group">
                    <label for="post_id" class="col-md-2 control-label"
                      >post</label>


                    <div class="col-md-8">

                        <select
                        class="form-control"
                        required="required"
                        id="post_id"
                        name="post_id"
                        >
                        @foreach ($posts as $item)
                        <option value="{{$item->id}}">{{$item->title}}</option>
                        @endforeach
                        </select>


                      @csrf
                      <span class="help-block">
                        <strong></strong>
                      </span>
                    </div>
                  </div>
                  <div class="form-group">
                    <div class="col-md-8 col-md-offset-2">
                      <button type="submit" class="btn btn-primary">
                        Create
                      </button>
                    </div>
                  </div>
                </form>
              </div>
            </div>
          </div>
        </div>
        @endsection
