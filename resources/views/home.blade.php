
@extends('master')

@section('konten')
<div class="font-Apple Color Emoji bg-gray-100 px-4 py-12">
  
  <div class="grid lg:grid-cols-2 gap-12 lg:max-w-6xl max-w-2xl mx-auto">
    <div class="text-left">
      <h3 class = " text-3xl">Selamat Datang <b>{{Auth::user()->name}}</b> </h3>
      <button id="myButton">Click Me</button>

      <br>
      <h2 class="text-gray-800 text-3xl font-bold mb-6">Visi</h2>
      <p class="mb-4 text-sm text-gray-500"> Terwujudna lulusan yang cerdas , beriman & bertaqwa , berjiwa wirausaha , siap kerja dan berakhlak mulia.</p>
      <h2 class="text-gray-800 text-3xl font-bold mb-6">Misi</h2>
      <p class="text-sm text-gray-500">Melatih beranggung jawab terhadap dirina sendiri dan masyarakat.
        Menanamkan kepada peserata didik iman dan taqwa kepada Allah SWT.
        Membekali lulusan , menjadi tenaga kerja terampil, profesional, yang produktif dan bermanfaat bagi diri dan masyarakat.
        Membekali lulusan untuk melanjutkan ke pendidikan yang lebih tinggi. </p>
    </div>
    <div>
      <img src="https://readymadeui.com/management-img.webp" alt="Placeholder Image" class="rounded-lg object-contain w-full h-full" />
    </div>
  </div>
</div>



<div class="bg-gray-50 p-8 min-h-[350px] flex flex-col items-center justify-center font-sans">
  <h2 class="text-gray-800 text-3xl font-bold mb-16 text-center">Statistik</h2>
  <div class="max-w-4xl max-sm:max-w-sm mx-auto">
    <div class="grid md:grid-cols-4 sm:grid-cols-2 gap-5">
      <div class="bg-white rounded-xl border px-7 py-8">
        <p class="text-black text-base text-center font-semibold mb-1">Total Guru</p>
        <h3 class="text-green-600 text-center text-3xl font-extrabold">30</h3>
      </div>
      <div class="bg-white rounded-xl border px-7 py-8">
        <p class="text-black text-base text-center font-semibold mb-1">Total Siswa</p>
        <h3 class="text-green-600 text-3xl text-center font-extrabold">180</h3>
      </div>
      <div class="bg-white rounded-xl border px-7 py-8">
        <p class="text-black text-base text-center font-semibold mb-1">Total Kelas</p>
        <h3 class="text-green-600 text-3xl text-center font-extrabold">30</h3>
      </div>
      <div class="bg-white rounded-xl border px-7 py-8">
        <p class="text-black text-base text-center font-semibold mb-1">Total Mata Pelajaran</p>
        <h3 class="text-green-600 text-3xl  text-center font-extrabold">40</h3>
      </div>
    </div>
  </div>
</div>


<script>
  document.addEventListener("DOMContentLoaded", function () {
      document.getElementById("myButton").addEventListener("click", function () {
          alert("Button clicked!");
      });
  });
</script>
@endsection