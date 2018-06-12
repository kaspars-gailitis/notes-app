@extends('layouts.app')
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">new note</div>
                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success">
                            {{ session('status') }}
                        </div>
                    @endif
                    @if ($errors->any())
                        <div class="alert alert-danger">
                          <ul>
                            @foreach ($errors->all() as $error)
                              <li>{{ $error }}</li>
                            @endforeach
                          </ul>
                        </div>
                      @endif
                    {!! Form::open(array('url' => 'store/1', 'method' => 'post')) !!}
                    {{ csrf_field() }}
                    <p class="card-text">
                      {!! Form::label('title', 'title')!!}
                      {{Form::text('title',null,array('class' => 'form-control', 'placeholder'=>'title'))}}
                  </p>
                  <p class="card-text">
                    {{Form::label('body', 'content')}}
                    {{Form::textarea('body',null,array('class' => 'form-control', 'placeholder'=>'content', 'id' => 'summernote'))}}
                    {{Form::label('tags', 'add tags (divided by comma)')}}
                    {{Form::text('tags',null,array('class' => 'form-control', 'placeholder'=>'tag1, tag2...'))}}
                    <div class="text-right">
                      {!!Form::submit('Save') !!}
                    </div>
                    {!! Form::close() !!}
                  </p>
                </div>
            </div>
        </div>
    </div>
    <script>
  $(document).ready(function() {
      $('#summernote').summernote({
        height:300,
      });
  });
</script>
@endsection
