@extends('layout.masterGuru')
@section('konten')

<div class="font-Apple Color Emoji bg-gray-100 px-4 py-12">
  
  <div class="text-left">
    <h3 class = " text-3xl">Selamat Datang <b>{{Auth::user()->name}}</b> </h3>
    <br>
   
  </div>
 
</div>

@endsection