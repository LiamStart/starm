@extends('layouts.app')
@section('content')
  @include('layouts.headers.cards')
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Modulo creación 
      </h1>
    </section>
    @yield('action-content')
  </div>
@endsection