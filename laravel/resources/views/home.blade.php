@extends('layout.app')

@section('title', 'Главная')

@section('content')
  @include('partials.header')

  <main class="main">
    <div class="fixed-container">
        <h1>Главная</h1>
    </div>
  </main>

  @include('partials.footer')
@endsection