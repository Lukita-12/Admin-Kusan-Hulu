<x-layout>

    <div>
        <table>
            <thead>
                <tr>
                    <td>No.</td>
                    <td>Username</td>
                    <td>Email</td>
                    <td>Password</td>
                </tr>
            </thead>
            <tbody>
                @foreach ($users as $user)
                    <tr>
                        <td>{{ $loop->iteration }}</td>
                        <td>{{ $user->name }}</td>
                        <td>{{ $user->email }}</td>
                        <td>{{ $user->password }}</td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>

    <div>
        {{ $users->links() }}
    </div>

</x-layout>