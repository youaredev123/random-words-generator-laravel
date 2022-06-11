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
    Create Random Words
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
        <form method="post" action="{{ route('randomwords.store') }}">
            <div class="form-group">
                @csrf
                <label for="name">Name</label>
                <input type="text" class="form-control" name="name"/>
            </div>
            <div class="form-group">
                <label for="option">Select the alphabet, numerical, or both</label>
                <select multiple class="form-control" id="option" name="option[]">
                    <option value="A">Alphabet</option>
                    <option value="N">Numerical</option>
                </select>
            </div>
            <div class="form-group">
                <div class="form-check">
                    <label class="form-check-label" for="quantity-small">
                        <input type="radio" class="form-check-input" id="quantity-small" name="quantity" value="10" checked>10
                    </label>
                </div>
                <div class="form-check">
                    <label class="form-check-label" for="quantity-middle">
                        <input type="radio" class="form-check-input" id="quantity-middle" name="quantity" value="100">100
                    </label>
                </div>
                <div class="form-check">
                    <label class="form-check-label" for="quantity-big">
                        <input type="radio" class="form-check-input" id="quantity-big" name="quantity" value="1000">1000
                    </label>
                </div>
                <div class="form-check">
                    <label class="form-check-label" for="quantity-huge">
                        <input type="radio" class="form-check-input" id="quantity-huge" name="quantity" value="10000">10000
                    </label>
                </div>
            </div>
            <button type="submit" class="btn btn-block btn-danger">Create Words</button>
        </form>
  </div>
</div>
@endsection