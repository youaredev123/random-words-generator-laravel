@extends('layout')
@section('content')
<style>
  .push-top {
    margin-top: 50px;
  }
</style>
<div class="push-top">
  @if(session()->get('success'))
    <div class="alert alert-success">
      {{ session()->get('success') }}  
    </div><br />
  @endif
  <a href="{{ url('randomwords/create') }}" class="link-primary">Go to Create Page</a>
  <table class="table">
    <thead>
        <tr class="table-warning">
          <td>ID</td>
          <td>Word</td>
          <td class="text-center">Action</td>
        </tr>
    </thead>
    <tbody>
        @foreach($randomWords as $randomWord)
        <tr>
            <td>{{$randomWord->id}}</td>
            <td>{{$randomWord->word}}</td>
            <td class="text-center">
                <a href="{{ route('randomwords.edit', $randomWord->id)}}" class="btn btn-primary btn-sm"">Edit</a>
                <form action="{{ route('randomwords.destroy', $randomWord->id)}}" method="post" style="display: inline-block">
                    @csrf
                    @method('DELETE')
                    <button class="btn btn-danger btn-sm"" type="submit">Delete</button>
                  </form>
            </td>
        </tr>
        @endforeach
    </tbody>
  </table>
<div>
@endsection