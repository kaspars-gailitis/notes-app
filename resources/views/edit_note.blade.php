@extends('layouts.app')
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">@lang('new note')</div>
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

                    {!! Form::open(array('url' => url('update',$note->id), 'method' => 'put')) !!}
                    {{ csrf_field() }}
                    <p class="card-text">
                      {!! Form::label('title', __('title'))!!}
                      {{Form::text('title',$note->title,array('class' => 'form-control',))}}
                  </p>
                  <p class="card-text">
                    {{Form::label('body', __('content'))}}
                    {{Form::textarea('body',$note->content,array('class' => 'form-control', 'placeholder'=>'content', 'id' => 'summernote'))}}
                    {{Form::label('tags', __('add tags (divided by comma)'))}}
                    {!!Form::text('tags',$tag->tag_content,array('class' => 'form-control', 'placeholder'=>'tag1, tag2...'))!!}
                    </p>
                    <div class="text-right">
                      {!!Form::submit(__('update')) !!}
                    </div>

                    {!! Form::close() !!}

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
