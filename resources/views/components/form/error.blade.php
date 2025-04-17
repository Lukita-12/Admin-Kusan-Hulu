@props(['errorFor'])

@error ($errorFor)
    <div class="px-1 italic text-sm text-red-500">{{ $message }}</div>
@enderror