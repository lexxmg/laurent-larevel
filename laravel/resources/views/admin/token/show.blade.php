@extends('layout.admin')

@section('title', 'Админ-панель')

@include('admin.partials.header')

@section('content')
    <main class="main">
      <div class="main__nav-container">
        @include('admin.partials.nav')
      </div>

      <div class="main__content-container">
        <h1 class="main__title">Ссылка для регистрации</h1>

        <a class="register-link" href="{{ $link }}" target="_blank">{{ $link }}</a>
      </div>  
    </main>
@endsection
