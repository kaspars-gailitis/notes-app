@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">@lang('my clusters')</div>
                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success">
                            {{ session('status') }}
                        </div>
                    @endif
                    <div class="col-md-2 col-md-offset-7"></div>
            <div class="col-md-1">
                <form action="/clusters/create" method="GET">
                    <button class="btn btn-default">
                  <i class="fa fa-plus"></i>@lang('new cluster')
                </button>
            </form>
          </div>
          <br><br>
                    @if (count($clusters) > 0)
                      @foreach ($clusters as $cluster)
                        <div class = "col-md-3">
                          <div class="card">
                            <div class="card-header"><a href="{{ url('/cluster/show', $cluster['id']) }}">{{ $cluster->name }}</a></div>
                            <div class="card-body">
                              <a href="{{ url('show', $cluster['id']) }}">{{ $cluster->formatTime() }}</a>
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
