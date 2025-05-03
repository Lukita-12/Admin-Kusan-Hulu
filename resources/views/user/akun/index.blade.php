<x-layout>

    <div class="w-1/2 flex flex-col justify-center items-center border-2 border-dashed border-slate-700 gap-3">
        @if (Auth::user()->profile_pic)
            <a href="{{ asset('storage/' . Auth::user()->profile_pic) }}" target="_blank" class="hover:opacity-75 transition">
                <img src="{{ asset('storage/' . Auth::user()->profile_pic) }}" alt="{{ Auth::user()->name }}" class="w-64 h-64 rounded-xl object-cover" />
            </a>
        @else
            <img src="{{ asset('images/Winter-Grass.jpg') }}" alt="{{ Auth::user()->name }}" class="w-64 h-64 rounded-xl object-cover" />
        @endif

        <a href="{{ route('user.akun.edit', Auth::user()) }}" class="bg-slate-700 font-semibold text-center text-slate-100 px-3 py-1 rounded-md">Edit profile</a>

        <span class="text-center">
            Lorem ipsum dolor, sit amet consectetur adipisicing elit. Est distinctio ducimus id ea modi vitae molestias repellat numquam adipisci eveniet blanditiis repudiandae quas amet unde corrupti itaque tenetur natus quia, vero animi, maxime magni sequi? Asperiores minus iusto eaque sit, dicta cum voluptate excepturi ut incidunt recusandae earum quasi labore!
        </span>
    </div>

</x-layout>