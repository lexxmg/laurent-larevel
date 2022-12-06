@extends('layout.app')

@section('title', 'Логин')

@section('content')
    <div class="admin-login-container">
      <form  class="admin-login-container__form" action="{{ route('admin.login_process') }}" method="POST">
        @csrf

        <div class="admin-login-container__input-container">
          <label class="admin-login-container__title" for="admin-login-name">login</label>
          <input class="admin-login-container__input" id="admin-login-name" name="email" type="text">
        </div>

        <div class="admin-login-container__input-container">
          <label class="admin-login-container__title" for="admin-login-pass">password</label>
          <input class="admin-login-container__input" id="admin-login-pass" name="password" type="text">
        </div>

        <button class="admin-login-container__btn">Войти</button>
      </form>
    </div>
@endsection