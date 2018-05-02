<div class="table-responsive">
    <table class="table">
        <tr>
            <th>Nama</th>
            <td>{{$user->name}}</td>
        </tr>
        <tr>
            <th>Email</th>
            <td>{{$user->email}}</td>
        </tr>
        <tr>
            <th>Role</th>
            <td>{{ $user->role->nama }}</td>
        </tr>
        <tr>
            <th></th>
            <td>
                <a href="{{ route('profile.change-password', $user->id) }}" class="btn btn-warning">Change Password</a>
            </td>
        </tr>
    </table>
</div>