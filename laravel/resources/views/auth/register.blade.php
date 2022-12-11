@extends('layout.app')

@section('title', 'Регистрация')

@section('content')
    <div class="register-container">
      <form  class="register-container__form" action="{{ route('register-process') }}" method="POST">
        @csrf
        <input type="hidden" value="{{ $token }}" name="token">
      
        <div class="register-container__input-container 
          @error('name') register-container__input-container--error @enderror"
        >
          <input class="register-container__input" 
            id="register-name" 
            type="text" 
            name="name"
            required
            value="{{ @old('name', $name) }}"
          >

          <label class="register-container__lable" 
            for="register-name">Имя:
          </label>
        </div>

        <div class="register-container__input-container 
          @error('device_name') register-container__input-container--error @enderror"
        >
          <input class="register-container__input" 
            id="device_name" 
            type="text" 
            name="device_name"
            required
            value="{{ @old('device_name', $device_name) }}"
          >

          <label class="register-container__lable" 
            for="device_name">Имя устройства:
          </label>
        </div>

        <button class="register-container__btn">Войти</button>
      </form>
    </div>
@endsection