@extends('mails.master')
@section('content')
<div class="content">
  <p>Hi {{ $user->name }},</p>
  <p>Silahkan klik link berikut untuk mengatur ulang password anda</p>
  <p>
    <a href="{{  url('/password/reset/'. $token) }}">
      {{  url('/password/reset/'. $token) }}
    </a>
  </p>
</div>
@endsection