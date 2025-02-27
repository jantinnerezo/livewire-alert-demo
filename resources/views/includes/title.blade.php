<div>
    <div>
        <h1 class="!mb-0"> {{ config('app.name') }} </h1>
        <div class="flex items-center space-x-2">
            @foreach ($githubBadges as $badge)
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
</div>