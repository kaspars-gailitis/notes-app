@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">my notes</div>
                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success">
                            {{ session('status') }}
                        </div>
                    @endif
                    @if (count($notes) > 0)
                      @foreach ($notes as $note)
                        <div class = "col-md-3">
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
