@extends('layout.app')

@section('title', 'Регистрация')

@section('content')
    <div class="register-container">
      <form  class="register-container__form" action="{{ route('register-process') }}" method="POST">
        @csrf
        
        <div class="register-container__input-container">
          <label class="register-container__title" for="register-name">register-name</label>
          <input class="register-container__input" id="register-name" type="text">
        </div>

        <button>test</button>
      </form>
    </div>
@endsection