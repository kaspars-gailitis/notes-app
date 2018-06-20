@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
              @if(isset($title))<div class="card-header">{{ $title }}
              </div>
            @else
                <div class="card-header">@lang('my notes')
                </div>
                @endif
                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success">
                            {{ session('status') }}
                        </div>
                    @endif
                    <div class="col-md-3 col-md-offset-7" style="padding-bottom: 10px;">
                    <form action="/home/2" method="GET">
                        <button class="btn btn-default">
                      <i class="fa fa-plus"></i>@lang('sort by date')
                    </button>
                </form>
              </div>
            <div class="col-md-1">
                <form action="/home/1" method="GET">
                    <button class="btn btn-default">
                  <i class="fa fa-plus"></i>@lang('sort by name')
                </button>
            </form>
          </div>
          <br><br>
                    @if (count($notes) > 0)
                      @foreach ($notes as $note)
                        <div class = "col-md-3" style="padding-bottom: 20px;">
                          <div class="card">
                            <div class="card-header"><a href="{{ url('show', $note['id']) }}">{{ $note->title }}</a></div>
                            <div class="card-body">
                              <a href="{{ url('show', $note['id']) }}">{{ $note->formatTime() }}</a>
                            </div>
                      </div>
                      </div>
                        @endforeach
                    @endif
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
