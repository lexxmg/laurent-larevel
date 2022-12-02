@extends('layout.app')

@section('title', 'Логин')

@section('content')
    <div class="login-container">
      <form  class="login-container__form" action="{{ route('login-process') }}" method="POST">
        <div class="login-container__input-container">
          <label class="login-container__title" for="login-name">login-name</label>
          <input class="login-container__input" id="login-name" type="text">
        </div>
      </form>
    </div>
@endsection