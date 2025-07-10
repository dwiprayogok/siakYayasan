
@extends('layout.master')

@section('konten')
<div class="font-extralight bg-white px-4 py-12">
  
  <div class="grid lg:grid-cols-2 gap-12 lg:max-w-6xl max-w-2xl mx-auto">
    <div class="text-left">

      <div class=" max-w-screen-md text-left lg:py-4">
        <h1 class="leading-none text-gray-900 md:text-5xl lg:text-4xl dark:text-black">SELAMAT DATANG</h1>
        <br>
        <h1 class="mb-2 text-xl font-extrabold tracking-tight leading-none text-gray-900 md:text-xl lg:text-2xl dark:text-black">DI YAYASAN PENDIDIKAN ISLAM AL-ISTI'AANAH</h1>

    </div>

      <h2 class="text-gray-800 text-2xl font-bold mb-6">Visi</h2>
      <p class="mb-4 text-lg text-gray-500"> Terwujudna lulusan yang cerdas , beriman & bertaqwa , berjiwa wirausaha , siap kerja dan berakhlak mulia.</p>
      <h2 class="text-gray-800 text-2xl font-bold mb-6">Misi</h2>
      <p class="text-lg text-gray-500">Melatih beranggung jawab terhadap dirina sendiri dan masyarakat.
        Menanamkan kepada peserata didik iman dan taqwa kepada Allah SWT.
        Membekali lulusan , menjadi tenaga kerja terampil, profesional, yang produktif dan bermanfaat bagi diri dan masyarakat.
        Membekali lulusan untuk melanjutkan ke pendidikan yang lebih tinggi. </p>
    </div>
    <div>
      <img src="https://readymadeui.com/management-img.webp"  class="rounded-lg object-contain w-full h-full" />
    </div>
  </div>


  <div class="bg-white p-8 min-h-[350px] flex flex-col items-center justify-center font-sans">
    <h2 class="text-gray-800 text-3xl font-bold mb-16 text-center">Statistik</h2>
    <div class="max-w-4xl max-sm:max-w-sm mx-auto">
      <div class="grid md:grid-cols-4 sm:grid-cols-2 gap-5">
        <div class="bg-white rounded-xl border px-7 py-8">
          <p class="text-black text-base text-center font-semibold mb-1">Total Guru</p>
          <h3 class="text-green-600 text-center text-3xl font-extrabold">{{ $guru }}</h3>
        </div>
        <div class="bg-white rounded-xl border px-7 py-8">
          <p class="text-black text-base text-center font-semibold mb-1">Total Siswa</p>
          <h3 class="text-green-600 text-3xl text-center font-extrabold">{{ $siswa }}</h3>
        </div>
        <div class="bg-white rounded-xl border px-7 py-8">
          <p class="text-black text-base text-center font-semibold mb-1">Total Kelas</p>
          <h3 class="text-green-600 text-3xl text-center font-extrabold">{{ $kelass }}</h3>
        </div>
        <div class="bg-white rounded-xl border px-7 py-8">
          <p class="text-black text-base text-center font-semibold mb-1">Total Mata Pelajaran</p>
          <h3 class="text-green-600 text-3xl  text-center font-extrabold">{{ $matapelajaran }}</h3>
        </div>
      </div>
    </div>
  </div>




</div>




@endsection