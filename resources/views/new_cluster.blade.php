@extends('layouts.app')
@section('content')
  <div class="container">
      <div class="row justify-content-center">
          <div class="col-md-8">
              <div class="card">
                <div class="card-header">@lang('create cluster')</div>
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
                  {!! Form::open(array('url' => 'cluster/new', 'method' => 'post')) !!}
                  {{ csrf_field() }}
                  <p class="card-text">
                    {!! Form::label('title', __('title'))!!}
                    {{Form::text('title',null,array('class' => 'form-control', 'placeholder'=>'title'))}}
                </p>
                <p class="card-text">
                  {!! Form::label('selectedNotes[]', __('choose notes you want to group in a cluster:'))!!}

                  @foreach($notes as $note)
                    <br>
                   {{Form::checkbox('selectedNotes[]', $note->id)}}
                   {{ $note->title }}
                   <br>
                 @endforeach
                  <div class="text-right">
                    {!!Form::submit(__('Create')) !!}
                  </div>
                  {!! Form::close() !!}
                </p>

                  </div>
                </div>
              </div>
            </div>
          </div>
        @endsection
