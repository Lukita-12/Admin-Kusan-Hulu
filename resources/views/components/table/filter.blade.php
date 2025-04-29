<div class="flex items-center gap-2">
    <label for="filter_status" class="font-medium text-xl text-slate-100">Filter:</label>
    <select name="filter_status" id="filter_status" class="outline-none text-slate-700 text-lg">
        {{ $slot }}
    </select>
</div>