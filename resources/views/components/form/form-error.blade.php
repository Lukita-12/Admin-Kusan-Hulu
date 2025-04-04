@props(['errorFor'])

@error ($errorFor)
    <div class="text-sm text-red-400 italic">
        {{ $message }}
    </div>
@enderror