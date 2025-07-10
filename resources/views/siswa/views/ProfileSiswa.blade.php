@extends('layout.masterSiswa')
@section('konten')

<div class="max-w mx-auto p-6 bg-white rounded-lg shadow-md">
  <!-- Header -->
  <div class="mb-6">
    <nav class="flex px-5 py-3 text-gray-700 border border-gray-200 rounded-lg bg-gray-50 dark:bg-gray-200 dark:border-gray-200" aria-label="Breadcrumb">
            <ol class="inline-flex items-center space-x-1 md:space-x-2 rtl:space-x-reverse">
                <li class="inline-flex items-center">
                    <a href="#" class="inline-flex items-center text-sm font-medium text-black hover:text-green-700 dark:text-black dark:hover:text-green-700">
                    <svg class="w-3 h-3 me-2.5" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 20 20">
                        <path d="m19.707 9.293-2-2-7-7a1 1 0 0 0-1.414 0l-7 7-2 2a1 1 0 0 0 1.414 1.414L2 10.414V18a2 2 0 0 0 2 2h3a1 1 0 0 0 1-1v-4a1 1 0 0 1 1-1h2a1 1 0 0 1 1 1v4a1 1 0 0 0 1 1h3a2 2 0 0 0 2-2v-7.586l.293.293a1 1 0 0 0 1.414-1.414Z"/>
                    </svg>
                    Home
                    </a>
                </li>
                <li>
                    <div class="flex items-center">
                    <svg class="rtl:rotate-180 block w-3 h-3 mx-1 text-black " aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 6 10">
                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 9 4-4-4-4"/>
                    </svg>
                    <a href="#" class="ms-1 text-sm font-medium text-gray-700 hover:text-green-700 md:ms-2 dark:text-black dark:hover:text-green-700">Profile</a>
                    </div>
                </li>
        
            </ol>
        </nav>
    <br>
    <p class="text-2xl font-bold  text-gray-800"> {{ now()->locale('id')->translatedFormat('l, d F Y') }}</p>     
</div>

  <!-- Profile Card -->
  <div class="bg-gradient-to-r from-blue-100 to-yellow-100 p-6 rounded-xl mb-6">
      <div class="flex items-center  mx-auto  space-x-4">
          {{-- <img src="https://via.placeholder.com/100" alt="Profile" class="w-20 h-20 rounded-full border-4 border-white shadow-md"> --}}
          <img class="w-20 h-20 rounded-full border-4 border-white shadow-md" src="/profile.png" alt="user photo">

          <div>
              <h3 class="text-2xl font-bold text-gray-900">{{ old('name', $data->name ?? '') }}</h3>
              <p class="text-xl text-gray-600">Kelas {{ old('kode_kelas', $data->kode_kelas ?? '') }}</p>
          </div>
          <div class="ml-auto">
              <button class="bg-green-500 hover:bg-green-600 text-white px-4 py-2 rounded-md" 
              title="update" id="btnUpdate" 
              
              data-id="{{ $data->id }}"
              data-nis="{{ $data->nis }}"
              data-name="{{ $data->name }}"
              data-email="{{ $data->email }}"
              data-gender="{{ $data->gender }}"
              data-kode_kelas = "{{ $data->kode_kelas }}"
              data-birth_date="{{ $data->birth_date }}"
              data-born_place="{{ $data->born_place }}"
              data-phone="{{ $data->phone }}"
              data-name_of_parent="{{ $data->name_of_parent }}"
              data-address="{{ $data->address }}"

        
              data-modal-target="updateprofileModal" data-modal-toggle="updateprofileModal">Edit</button>
          </div>
      </div>
  </div>

  <!-- Form Grid -->
  <div class="grid grid-cols-1 md:grid-cols-2 gap-4 mb-6">
      <div>
          <label class="block text-sm font-medium text-gray-700">Nama Lengkap</label>
          <input type="text" disabled placeholder="Your First Name" value=" {{ old('name', $data->name ?? '') }}" class="mt-1 w-full border rounded-lg px-4 py-2 bg-gray-100" />
      </div>
      <div>
          <label class="block text-sm font-medium text-gray-700">Email</label>
          <input type="text" disabled placeholder="Your First Name" value=" {{ old('email', $data->email ?? '') }}" class="mt-1 w-full border rounded-lg px-4 py-2 bg-gray-100" />
      </div>
      <div>
          <label class="block text-sm font-medium text-gray-700">Jenis Kelamin</label>
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
        <input type="text" disabled placeholder="Your First Name" value=" {{ old('kode_kelas', $data->kode_kelas ?? '') }}" class="mt-1 w-full border rounded-lg px-4 py-2 bg-gray-100" />
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
        <textarea id="address" disabled rows="4" class="block p-2.5 w-full text-sm text-gray-900 bg-gray-50 rounded-lg border border-gray-300 focus:ring-primary-500 
        focus:border-primary-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500"
         placeholder="Your description here" >{{ old('address', $data->address ?? '') }}</textarea>
    </div>
  </div>
</div>
@include('siswa.modal.profile.updateprofile')

@endsection

