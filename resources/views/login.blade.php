@extends('master')
@section('content')
<div class="col-md-6">
    <form method="post" action="{{ route('login') }}">
        @csrf
        <div class="form-group">
            <label>Email address</label>
            <input type="email" class="form-control" name="email">
            <small id="emailHelp" class="form-text text-muted">We'll never share your email with anyone else.</small>
        </div>
        <div class="form-group">
            <label>Password</label>
            <input type="password" class="form-control" name="password">
        </div>
        <button type="submit" class="btn btn-primary">Submit</button>
    </form>
</div>
@endsection
