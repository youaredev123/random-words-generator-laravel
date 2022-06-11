@extends('layout')
@section('content')
<style>
    .container {
      max-width: 450px;
    }
    .push-top {
      margin-top: 50px;
    }
</style>
<div class="card push-top">
  <div class="card-header">
    Edit & Update
  </div>
  <div class="card-body">
    @if ($errors->any())
      <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
              <li>{{ $error }}</li>
            @endforeach
        </ul>
      </div><br />
    @endif
      <form method="post" action="{{ route('randomwords.update', $randomWord->id) }}">
            <div class="form-group">
                @csrf
                @method('PATCH')
                <label for="word">Word</label>
                <input type="text" id="word" class="form-control" name="word" value="{{ $randomWord->word }}"/>
            </div>
          <button type="submit" class="btn btn-block btn-danger">Update Word</button>
      </form>
  </div>
</div>
@endsection