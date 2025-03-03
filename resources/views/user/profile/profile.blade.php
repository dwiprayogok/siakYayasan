
@extends('layout.masterSiswa')
@section('konten')
<div class="font-Apple Color Emoji bg-gray-100 px-4 py-12">
  
  <div class="grid lg:grid-cols-2 gap-12 lg:max-w-6xl max-w-2xl mx-auto">
    <div class="text-left">
      <h3 class = " text-3xl">Selamat Datang <b>{{Auth::user()->name}}</b> </h3>
      <br>
      
  </div>
</div>

@endsection