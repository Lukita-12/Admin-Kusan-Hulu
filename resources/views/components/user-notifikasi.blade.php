<x-layout>
    <div>
        @foreach($domisiliUsahas as $domisiliUsaha)
        <div class="flex flex-col">
        <span>
                {{ $domisiliUsaha->penduduk->nama }}
            </span>    
        <span>
                {{ $domisiliUsaha->status }}
            </span>
        </div>
        @endforeach
    </div>
</x-layout>