@extends('mails.master')
@section('content')
<div class="content">
  <p>Hi {{ $user->name }},</p>
  <p>Password anda <b>{{ $password }}</b></p>
</div>
@endsection