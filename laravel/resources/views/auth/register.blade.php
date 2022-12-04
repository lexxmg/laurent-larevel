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
          <label class="register-container__title" 
            for="register-name">Имя:
          </label>

          <input class="register-container__input" 
            id="register-name" 
            type="text" 
            name="name"
            @if (@old('name'))
              value="{{ @old('name') }}"
            @else
                value="{{ $name }}"
            @endif
          >
        </div>

        <div class="register-container__input-container 
          @error('device_name') register-container__input-container--error @enderror"
        >
          <label class="register-container__title" 
            for="device_name">Имя устройства:
          </label>

          <input class="register-container__input" 
            id="device_name" 
            type="text" 
            name="device_name"
            @if (@old('device_name'))
              value="{{ @old('device_name') }}"
            @else
                value="{{ $device_name }}"
            @endif
          >
        </div>

        <button>test</button>
      </form>
    </div>
@endsection