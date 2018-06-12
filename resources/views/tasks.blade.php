@extends('layouts.app')

@section('content')
  <div class="container">
      <div class="row justify-content-center">
          <div class="col-md-8">
              <div class="card">
                  <div class="card-header">new task</div>
                    <div class="card-body">
                      <p class="card-text">
                        <form action="/store/2" method="POST" class="form-horizontal">
                            {{ csrf_field() }}
                            <div class="form-group">
                                <label for="task" class="col-sm-3 control-label">task</label>
                                <div class="col-sm-6">
                                    <input type="text" name="name" id="task-name" class="form-control">
                                </div>
                            </div>
                            <!-- Add Task Button -->
                            <div class="form-group">
                                <div class="col-sm-offset-3 col-sm-6">
                                    <button type="submit" class="btn btn-default">
                                        <i class="fa fa-plus"></i> add task
                                    </button>
                                </div>
                            </div>
                        </form>
                      </p>
                    </div>
                  </div>
                      @if (count($tasks) > 0)
                        <br>
                        <div class="card">
                        <div class="card-header">current tasks</div>
                          <div class="card-body">
                                  @foreach ($tasks as $task)
                                        {{ $task->content }}
                                                  <form action="/delete/{{ $task->id }}" method="POST">
                                                    {{ csrf_field() }}
                                                    <div class="text-right">
                                                      {{ method_field('DELETE') }}
                                                      <button class="btn btn-default">
                                                    <i class="fa fa-plus"></i> delete
                                                  </button>
                                                </div>
                                              </form>
                                              <hr>
                                @endforeach
                        </div>
                      </div>
                      @endif
                    </div>
                    </div>
                  </div>
@endsection
