@extends('layouts.app')

@section('content')
  <div class="dashboard-wrapper">
    <figure class="image">
      <img src="{{ asset('images/logo.png') }}" alt="">
    </figure>
  </div>
@endsection
@section('css')
<style>
  .dashboard-wrapper {
    display: flex;
    height: 80vh;
    width: 100%;
    justify-content: center;
    align-items: center;
  }
</style>
@endsection
