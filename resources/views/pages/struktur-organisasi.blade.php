@extends('auth')

@section('auth')

<h1 class="text-3xl font-semibold mb-4">Struktur Organisasi</h1>

<div class="flex items-center space-x-4">
    <div class="w-20">
        <img src="path_to_image.jpg" alt="CEO" class="rounded-full w-20 h-20">
    </div>
    <div>
        <h2 class="text-xl font-semibold">John Doe</h2>
        <p class="text-gray-500">CEO</p>
    </div>
</div>

<div class="mt-8">
    <div class="grid grid-cols-2 gap-8">
        <div class="flex items-center space-x-4">
            <div class="w-20">
                <img src="path_to_image.jpg" alt="Manager" class="rounded-full w-20 h-20">
            </div>
            <div>
                <h2 class="text-xl font-semibold">Jane Smith</h2>
                <p class="text-gray-500">Manager</p>
            </div>
        </div>

        <div class="flex items-center space-x-4">
            <div class="w-20">
                <img src="path_to_image.jpg" alt="Manager" class="rounded-full w-20 h-20">
            </div>
            <div>
                <h2 class="text-xl font-semibold">Bob Johnson</h2>
                <p class="text-gray-500">Manager</p>
            </div>
        </div>

        <!-- Tambahkan lebih banyak div sesuai struktur organisasi Anda -->
    </div>
</div>

@endsection