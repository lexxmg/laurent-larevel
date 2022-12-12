@extends('layout.admin')

@section('title', 'Логин')

@section('content')
    <div class="login-container">
      <form  class="login-container__form" action="{{ route('admin.login_process') }}" method="POST">
        @csrf

        <div class="login-container__input-container 
          @error('name') login-container__input-container--error @enderror"
        >
          <input class="login-container__input" 
            id="login-name" 
            type="text" 
            name="name"
            required
            value="{{ @old('name', $name) }}"
          >

          <label class="login-container__lable" 
            for="login-name">Имя:
          </label>
        </div>

        <div class="login-container__input-container 
          @error('password') login-container__input-container--error @enderror"
        >
          <input class="login-container__input" 
            id="login-password" 
            type="password" 
            name="password"
            required
            value="{{ @old('password', $password) }}"
          >

          <label class="login-container__lable" 
            for="login-password">Пароль:
          </label>
        </div>

        <button class="login-container__btn">Войти</button>
      </form>
    </div>
@endsection
