<div>
    <h2 class="my-0"> Alert Confirmation </h2>
    <p> This package also supports showing confirmation alert on action. </p>
    <div class="grid grid-cols-1 gap-4">
        <div class="border-l-4 border-light-blue-600 font-medium pl-4 text-cool-gray-500 text-sm mt-4">
           This is a complete refactor of the previous alert confirmation to support multiple confirms on the same livewire component.
        </div>
        <div>
            <p>
                First, setup your action methods for <strong>onConfirmed</strong> and <strong>onCancelled</strong> callback.
                Of course you can name your methods anything you want.
            </p>
             <pre class="scrollbar-none mt-4 language-php"><code class="scrolling-touch  language-html"><span>public function</span> <span class="text-emerald-400">confirmed</span>()
{
    <span class="text-cool-gray-400">{{ '// Example code inside confirmed callback'}}</span>

    <span class="text-emerald-400">$this</span>-><span class="text-emerald-400">alert</span>(
        <span class="text-amber-400">'success'</span>,
        <span class="text-amber-400">'Thanks! consider giving it a star on github.'</span>
    );
}

<span>public function</span> <span class="text-emerald-400">cancelled</span>()
{
    <span class="text-cool-gray-400">{{ '// Example code inside cancelled callback'}}</span>

    <span class="text-emerald-400">$this</span>-><span class="text-emerald-400">alert</span>(<span class="text-amber-400">'info'</span>, <span class="text-amber-400">'Understood'</span>);
}
</code></pre>
        </div>
        <div>
           <p class="my-0">
                Make sure you register <strong>confirmed</strong> and <strong>cancelled</strong> methods as event listeners.
                See: <span><a href="https://laravel-livewire.com/docs/2.x/events">laravel-livewire.com/docs/2.x/events</a></span> for more information about event listeners.
            </p>
            <div class="border-l-4 border-light-blue-600 font-medium pl-4 text-cool-gray-500 text-sm mt-4">
                If you have multiple confirmation alerts on the same livewire component, you can define as many callback methods you want and just add it to event listeners.
            </div>
                         <pre class="scrollbar-none mt-4 language-php"><code class="scrolling-touch  language-html"><span>protected</span> <span class="text-light-blue-500">$listeners</span> = [
    <span class="text-amber-400">'confirmed'</span>,
    <span class="text-amber-400">'cancelled'</span>,
    <span class="text-cool-gray-400">... </span>
];
</code></pre>
        </div>
        <div>
           <p class="my-0">
               Finally, create an action method that triggers the confirmation alert with <strong>onConfirmed</strong> and <strong>onCancelled</strong> callbacks
               pointed to the event listeners you registered.
            </p>
                         <pre class="scrollbar-none mt-4 language-php"><code class="scrolling-touch  language-html"><span>public function</span> <span class="text-emerald-400">triggerConfirm</span>()
{
    <span class="text-emerald-400">$this</span>-><span class="text-emerald-400">confirm</span>(<span class="text-amber-400">'Do you love Livewire Alert?'</span>, [
        <span class="text-amber-400">'toast'</span> => <span>false</span>,
        <span class="text-amber-400">'position'</span> => <span class="text-amber-400">'center'</span>,
        <span class="text-amber-400">'showConfirmButton'</span> => <span>true</span>,
        <span class="text-amber-400">'cancelButtonText'</span> => <span class="text-amber-400">Nope</span>,
        <span class="text-amber-400">'onConfirmed'</span> => <span class="text-amber-400">'confirmed'</span>,
        <span class="text-amber-400">'onCancelled'</span> => <span class="text-amber-400">'cancelled'</span>
    ];
}
</code></pre>
        </div>
        <div>
            <button type="button" class="w-full bg-light-blue-700 rounded-lg py-3 px-4 text-light-blue-50 font-semibold" wire:click="triggerConfirm"> Show Example Above </button>
        </div>
    </div>
</div>