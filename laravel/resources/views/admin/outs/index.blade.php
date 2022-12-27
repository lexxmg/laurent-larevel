@extends('layout.admin')

@section('title', 'Выходы')

@include('admin.partials.header')

@section('content')
    <main class="main">
      <div class="main__nav-container">
        @include('admin.partials.nav')
      </div>

      <div class="main__content-container">
        <h1 class="main__title">Выходы Laurent</h1>

        <form action="{{ route('admin.outs.create') }}" method="POST">
          @csrf
          @method('GET')
          <select name="gpio">
            @foreach ($gpio as $item)
              <option value="{{ $item->id }}">{{ $item->description }}</option>
            @endforeach
          </select>

          <button>далее</button>
        </form>

        @foreach ($outs as $item)
            <p>{{ $item->name }} {{ $item->mode->description }}</p>
        @endforeach
      </div>  
    </main>
@endsection
