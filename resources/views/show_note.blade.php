@extends('layouts.app')
@section('content')
  <div class="container">
      <div class="row justify-content-center">
          <div class="col-md-8">
              <div class="card">
                <div class="card-header">{{ $note->title }}</div>
                <div class="card-body">
                  <p class = "card-text">content: </p>
                  <div class = "card">
                    <div class="card-body">
                    {!! $note->content !!}
                  </div>
                  </div>
                  <br>
                  <p class= "card-text">tags: </p>
                  @foreach($tags as $tag)
                    <div class = "col-md-2">
                      <div class = "card">
                        <div class ="card-body">
                          {{ $tag }}
                        </div>
                      </div>
                    </div>
                  @endforeach

            </div>
          </div>
        </div>
      </div>
    </div>
          <br>
          <div class = "text-right">
            <div class = "container">
            <div class="col-md-2 col-md-offset-7">
            <form action="/delete/{{ $note->id }}" method="POST">
              {{ csrf_field() }}
                {{ method_field('DELETE') }}
                <button class="btn btn-default">
              <i class="fa fa-plus"></i>delete
            </button>
        </form>
      </div>
    <div class="col-md-1">
        <form action="/edit/{{ $note->id }}" method="POST">
          {{ csrf_field() }}
            <button class="btn btn-default">
          <i class="fa fa-plus"></i>edit
        </button>
    </form>
  </div>
</div>
      </div>

@endsection
