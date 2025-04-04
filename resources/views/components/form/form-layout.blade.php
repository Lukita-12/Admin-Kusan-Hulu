<form method="POST" {{ $attributes->merge() }}>
    @csrf
    
    {{ $slot }}
</form>