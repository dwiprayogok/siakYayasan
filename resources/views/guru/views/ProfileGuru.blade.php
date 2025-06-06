@extends('layout.masterGuru')
@section('konten')

<div class="max-w mx-auto p-6 bg-white rounded-lg shadow-md">
  <!-- Header -->
  <div class="mb-6">
    <p class="text-2xl font-bold text-gray-800"> {{ now()->locale('id')->translatedFormat('l, d F Y') }}</p>
  </div>

  <!-- Profile Card -->
  <div class="bg-gradient-to-r from-blue-100 to-yellow-100 p-6 rounded-xl mb-6">
      <div class="flex items-center  mx-auto  space-x-4">
          {{-- <img src="https://via.placeholder.com/100" alt="Profile" class="w-20 h-20 rounded-full border-4 border-white shadow-md"> --}}
          <img class="w-20 h-20 rounded-full border-4 border-white shadow-md" src="/profile.png" alt="user photo">

          <div>
              <h3 class="text-2xl font-bold text-gray-900">{{ old('name', $data->name ?? '') }}</h3>
              <p class="text-xl text-gray-600">NIP {{ old('email', $data->nip ?? '') }}</p>
          </div>
          <div class="ml-auto">
              <button class="bg-green-500 hover:bg-green-600 text-white px-4 py-2 rounded-md"
              title="update" id="btnUpdate" 
                
              data-id="{{ $data->id }}"
              data-nis="{{ $data->nip }}"
              data-name="{{ $data->name }}"
              data-email="{{ $data->email }}"
              data-gender="{{ $data->gender }}"
              data-sk = "{{ $data->sk }}"
              data-tanggal_lahir="{{ $data->tanggal_lahir }}"
              data-tempat_lahir="{{ $data->tempat_lahir }}"
              data-phone="{{ $data->phone }}"
              data-role="{{ $data->role }}"
              data-education="{{ $data->education }}"
              data-address="{{ $data->address }}"

        
              data-modal-target="updateprofileGuruModal" data-modal-toggle="updateprofileGuruModal"
              >Edit</button>
          </div>
      </div>
  </div>

  <!-- Form Grid -->
  <div class="grid grid-cols-1 md:grid-cols-2 gap-4 mb-6">
      <div>
          <label class="block text-sm font-medium text-gray-700">Nama Lengkap Name</label>
          <input type="text" disabled placeholder="Your First Name" value=" {{ old('name', $data->name ?? '') }}" class="mt-1 w-full border rounded-lg px-4 py-2 bg-gray-100" />
      </div>

      <div>
          <label class="block text-sm font-medium text-gray-700">Email</label>
          <input type="text" disabled placeholder="Your First Name" value=" {{ old('email', $data->email ?? '') }}" class="mt-1 w-full border rounded-lg px-4 py-2 bg-gray-100" />
      </div>
      
      <div>
          <label class="block text-sm font-medium text-gray-700">Tempat & Tanggal Lahir Lahir</label>
          <input type="text" disabled placeholder="Your First Name" 
          value="{{ old('born_place_and_date', ($data->tempat_lahir ?? '') . ', ' . ($data->tanggal_lahir ?? '')) }}"
          class="mt-1 w-full border rounded-lg px-4 py-2 bg-gray-100" />
      </div>


      <div>
        <label class="block text-sm font-medium text-gray-700">Jenis Kelamin</label>
        <input type="text" disabled placeholder="Your First Name" value=" {{ old('gender', $data->gender ?? '') }}" class="mt-1 w-full border rounded-lg px-4 py-2 bg-gray-100" />
     </div>
      

      <div>
        <label class="block text-sm font-medium text-gray-700">Posisi</label>
        <input type="text" disabled placeholder="Your First Name" value=" {{ old('role', $data->role ?? '') }}" class="mt-1 w-full border rounded-lg px-4 py-2 bg-gray-100" />
     </div>


        <div>
            <label class="block text-sm font-medium text-gray-700">No SK</label>
            <input type="text" disabled placeholder="Your First Name" value=" {{ old('sk', $data->sk ?? '') }}" class="mt-1 w-full border rounded-lg px-4 py-2 bg-gray-100" />
        </div>


        <div>
            <label class="block text-sm font-medium text-gray-700">No Telepon</label>
            <input type="text" disabled placeholder="Your First Name" value=" {{ old('phone', $data->phone ?? '') }}" class="mt-1 w-full border rounded-lg px-4 py-2 bg-gray-100" />
        </div>
        <div>
            <label class="block text-sm font-medium text-gray-700">Pendidikan Terakhir</label>
            <input type="text" disabled placeholder="Your First Name" value=" {{ old('education', $data->education ?? '') }}" class="mt-1 w-full border rounded-lg px-4 py-2 bg-gray-100" />
        </div>

        <div class="sm:col-span-2">
            <label for="address" class="block mb-2 text-sm font-medium text-black dark:text-black">Alamat</label>
            <textarea id="address" disabled rows="4" class="block p-2.5 w-full text-sm text-gray-900 bg-gray-50 rounded-lg border border-gray-300 focus:ring-primary-500 
            focus:border-primary-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500"
            placeholder="Your description here" >{{ old('address', $data->address ?? '') }}</textarea>
        </div>
     
  </div>
</div>
@include('guru.modal.profile.updateprofileGuru')


@endsection