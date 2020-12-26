<div>
    <h2 class="my-0"> Include Component </h2>
        Insert <span> <a href="https://sweetalert2.github.io/#download"> Sweet2Alert2 </a> </span> and livewire alert scripts component after livewire scripts directive.
        <div class="border-l-4 border-light-blue-600 font-medium pl-4 text-cool-gray-500 text-sm mt-4">
            SweetAlert2 script is not included by default so make sure you include it before <span><</span><span>x-livewire-alert::scripts /></span>
        </div>
        <pre class="scrollbar-none mt-4 language-html"><code class="scrolling-touch  language-html"><span class="text-cool-gray-400"> {{ '<body>' }} </span>
    <span class="text-cool-gray-400">...
    <?php echo '@livewireScripts' ?></span>
    <span class="text-cool-gray-400">...</span>
    <span><span class="text-light-blue-500">{{'<script '}}</span><span>src=</span><span class="text-amber-400">"https://cdn.jsdelivr.net/npm/sweetalert2@10"</span><span class="text-light-blue-500">></span></span>
    <span class="text-light-blue-500">{{'</script>'}}</span>
    <span class="text-cool-gray-400">...</span>
    <span class="text-light-blue-500"><</span><span class="text-light-blue-500">x-livewire-alert::scripts /></span>
<span class="text-cool-gray-400"> {{ '</body>' }} </span></code></pre>
</div>