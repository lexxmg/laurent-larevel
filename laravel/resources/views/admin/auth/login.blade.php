@extends('layout.admin')

@section('title', 'Логин')

@section('content')
    <div class="login-container">
      <form  class="login-container__form" action="{{ route('admin.login_process') }}" method="POST">
        @csrf

        <div class="login-container__input-container">
          <label class="login-container__title" for="login-name">login</label>
          <input class="login-container__input" id="login-name" name="user" type="text">
        </div>

        <div class="login-container__input-container">
          <label class="login-container__title" for="login-pass">password</label>
          <input class="login-container__input" id="login-pass" name="password" type="text">
        </div>

        <button class="login-container__btn">Войти</button>
      </form>
    </div>
@endsection