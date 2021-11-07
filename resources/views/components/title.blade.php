@props(['badges'])

<div>
    <div class="block md:flex items-center justify-between mb-8">
        <div>
            <h1 class="mt-0 mb-4"> {{ config('app.name') }} </h1>
            <div class="flex items-center space-x-2">
                @foreach ($badges as $badge)
                    <p class="!my-0">
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
        </div>
        <a class="flex items-center no-underline space-x-2 mt-4 md:mt-0" href="https://jantinnerezo.com" rel="noopener">
            <div class="rounded-full w-12 h-12">
                <img
                    src="https://avatars1.githubusercontent.com/u/29738837?s=460&u=019229a953970b49ad622ce055b78604aebf1883&v=4"
                    alt="Jantinn Erezo"
                    class="m-0 rounded-full"
                >
            </div>
            <div>
                <p class="my-0"> Jantinn Erezo </p>
                <p class="text-sm my-0 text-cool-gray-500"> Full Stack Web Developer </p>
            </div>
        </a>
    </div>
</div>