<div class="flex items-center space-x-4 relative">
    <input
        type="text"
        name="search"
        id="SEARCH-IO"
        placeholder="Search"
        class="absolute left-20 w-0 min-w-0 p-0 opacity-0 transition-all duration-300 ease-in-out bg-white text-stone-800 rounded-full shadow-lg focus:outline-none"
        oninput="ADJUST_SEARCH_WIDTH()"
    />

    <button
        type="button"
        onclick="TOGGLE_SEARCH()"
        class="text-red-700 hover:text-red-500">
        <i class="fas fa-search fa-xl"></i>
    </button>
</div>

<script>
    function TOGGLE_SEARCH() 
    {
        const SEARCH_IO = document.getElementById('SEARCH-IO');
        const HIDDEN = SEARCH_IO.classList.toggle('w-48');

        SEARCH_IO.classList.toggle('w-0', !HIDDEN);
        SEARCH_IO.classList.toggle('p-0', !HIDDEN);
        SEARCH_IO.classList.toggle('opacity-0', !HIDDEN);
        SEARCH_IO.classList.toggle('p-2', HIDDEN);
        SEARCH_IO.classList.toggle('opacity-100', HIDDEN);

        if (HIDDEN) SEARCH_IO.focus();
    }

    function ADJUST_SEARCH_WIDTH() 
    {
        const SEARCH_IO = document.getElementById('SEARCH-IO');
        const LENGTH = SEARCH_IO.value.length;
        const BASE_WIDTH = 150;
        const MAX = 0.4 * window.visualViewport.width;

        let NEW_WIDTH = BASE_WIDTH + LENGTH * 8;
        NEW_WIDTH = Math.min(NEW_WIDTH, MAX);

        SEARCH_IO.style.width = `${NEW_WIDTH}px`;
    }
</script>