@props(['badges'])
<div>
    <h2 class="my-0"> Livewire Alert </h2>
    <div class="flex items-center space-x-2 mt-2 mb-12">
        @foreach ($badges as $badge)
            <p class="my-0">
                <a href="{{ $badge['href'] }}">
                    <img
                        src="{{ $badge['src'] }}"
                        alt="{{ $badge['alt'] }}"
                        class="my-0"
                    >
                </a>
            </p>
        @endforeach
    </div>
    <p>
        This package provides a simple alert utilities for your livewire components. Currently using [SweetAlert2](https://www.example.com) under-the-hood. You can now use your favorite SweetAlert2 without writing any custom Javascript. Looking forward to integrate other Javascript alert libraries, feel free to contribute or suggest any libraries.
    </p>
</div>