<?php

$denuncia = App\Models\Complaint::all();

?>

<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ Auth::User()->name }}
        </h2>
    </x-slot>

    <div class="min-w-0 flex-auto px-4 sm:px-6 xl:px-8 pt-10 pb-24 lg:pb-16">
      <div class="rounded-t-xl overflow-hidden bg-gradient-to-r from-fuchsia-50 to-fuchsia-100 bg-gray-100 p-8">
          <div class="grid grid-cols-3 gap-4">      
           @foreach($denuncia as $d)       
            <div class="h-12 flex items-center bg-white rounded-md text-center pl-2">{{$d->title}}</div>
          @endforeach
          </div>
      </div>    
 </div>
</x-app-layout>
