@extends('layout.masterSiswa')
@section('konten')

<div class="max-w mx-auto p-6 bg-white rounded-lg shadow-md">
  <!-- Header -->
  <div class="mb-6">
    <h2 class="text-2xl font-bold text-gray-800">Welcome, {{ old('name', $data->name ?? '') }}</h2>
    <p class="text-gray-500">{{ now()->format('D, d M Y') }}</p>
  </div>

  <!-- Profile Card -->
  <div class="bg-gradient-to-r from-blue-100 to-yellow-100 p-6 rounded-xl mb-6">
      <div class="flex items-center  mx-auto  space-x-4">
          {{-- <img src="https://via.placeholder.com/100" alt="Profile" class="w-20 h-20 rounded-full border-4 border-white shadow-md"> --}}
          <img class="w-20 h-20 rounded-full border-4 border-white shadow-md" src="/profile.png" alt="user photo">

          <div>
              <h3 class="text-2xl font-bold text-gray-900">{{ old('name', $data->name ?? '') }}</h3>
              <p class="text-xl text-gray-600">{{ old('email', $data->email ?? '') }}</p>
          </div>
          <div class="ml-auto">
              <button class="bg-green-500 hover:bg-green-600 text-white px-4 py-2 rounded-md">Edit</button>
          </div>
      </div>
  </div>

  <!-- Form Grid -->
  <div class="grid grid-cols-1 md:grid-cols-2 gap-4 mb-6">
      <div>
          <label class="block text-sm font-medium text-gray-700">Full Name</label>
          <input type="text" disabled placeholder="Your First Name" value=" {{ old('name', $data->name ?? '') }}" class="mt-1 w-full border rounded-lg px-4 py-2 bg-gray-100" />
      </div>
      <div>
          <label class="block text-sm font-medium text-gray-700">user Name</label>
          <input type="text" disabled placeholder="Your First Name" value=" {{ old('username', $data->username ?? '') }}" class="mt-1 w-full border rounded-lg px-4 py-2 bg-gray-100" />
      </div>
      <div>
          <label class="block text-sm font-medium text-gray-700">Gender</label>
          <input type="text" disabled placeholder="Your First Name" value=" {{ old('gender', $data->gender ?? '') }}" class="mt-1 w-full border rounded-lg px-4 py-2 bg-gray-100" />
      </div>
      <div>
          <label class="block text-sm font-medium text-gray-700">Tempat & Tanggal Lahir Lahir</label>
          <input type="text" disabled placeholder="Your First Name" 
          value="{{ old('born_place_and_date', ($data->born_place ?? '') . ', ' . ($data->birth_date ?? '')) }}"
          class="mt-1 w-full border rounded-lg px-4 py-2 bg-gray-100" />
      </div>
      

      <div>
        <label class="block text-sm font-medium text-gray-700">Kelas</label>
        <input type="text" disabled placeholder="Your First Name" value=" {{ old('kelas_id', $data->kelas_id ?? '') }}" class="mt-1 w-full border rounded-lg px-4 py-2 bg-gray-100" />
    </div>


    <div>
      <label class="block text-sm font-medium text-gray-700">No Induk Siswa</label>
      <input type="text" disabled placeholder="Your First Name" value=" {{ old('nis', $data->nis ?? '') }}" class="mt-1 w-full border rounded-lg px-4 py-2 bg-gray-100" />
  </div>


      <div>
          <label class="block text-sm font-medium text-gray-700">No Telepon</label>
          <input type="text" disabled placeholder="Your First Name" value=" {{ old('phone', $data->phone ?? '') }}" class="mt-1 w-full border rounded-lg px-4 py-2 bg-gray-100" />
      </div>
      <div>
          <label class="block text-sm font-medium text-gray-700">Nama Orang Tua</label>
          <input type="text" disabled placeholder="Your First Name" value=" {{ old('name_of_parent', $data->name_of_parent ?? '') }}" class="mt-1 w-full border rounded-lg px-4 py-2 bg-gray-100" />
      </div>

      <div class="sm:col-span-2">
        <label for="address" class="block mb-2 text-sm font-medium text-black dark:text-black">Alamat</label>
        <textarea id="address" disabled rows="4" class="block p-2.5 w-full text-sm text-gray-900 bg-gray-50 rounded-lg border border-gray-300 focus:ring-primary-500 focus:border-primary-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500" placeholder="Your description here" value=" {{ old('address', $data->address ?? '') }}"></textarea>
    </div>
  </div>
</div>

@endsection

