@extends('layouts.app')
@section('content')
  <div class="container">
      <div class="row justify-content-center">
          <div class="col-md-8">
              <div class="card">
                  <div class="card-header">@lang('all users')</div>
                    <div class="card-body">
                      <p class="card-text">
                        <br>
                          @foreach ($users as $user)
                                {{ $user->name }}
                                          <form action="/admin/ban/{{ $user->id }}" method="POST">
                                            {{ csrf_field() }}
                                            <div class="text-right">
                                              {{ method_field('PUT') }}
                                              <button class="btn btn-default">
                                            @if($user->role == 1)
                                            <i class="fa fa-plus"></i> @lang('ban user')
                                          @endif
                                          @if($user->role == 3)
                                          <i class="fa fa-plus"></i> @lang('unban user')
                                        @endif
                                          </button>
                                        </div>
                                      </form>
                                      <hr>
                                      @endforeach
                                </p>
                              </div>
                            </div>
                          </div>
                        </div>
                      </div>
                    @endsection
