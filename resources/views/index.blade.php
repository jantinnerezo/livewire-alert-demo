@extends('layouts.app')

@section('content')
    <x-nav />
    <div class="prose prose-sm prose-lg container mx-auto pb-14">
        <x-title :badges="$badges" />
        <hr class="mt-10 mb-5">
        <p>
            Here you can you play with Livewire Alert Component. Check out
            <a href="https://sweetalert2.github.io/#configuration">
                <strong> SweetAlert2 </strong>
            </a> official documentation for more details about alert configuration.
        </p>
        @livewire('demo')
    </div>
    <x-footer />
@endsection