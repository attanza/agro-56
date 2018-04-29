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
            <th>Status</th>
            <td>
                @if($user->is_active)
                    <span class="label label-success">Aktif</span>
                @else
                    <span class="label label-default">Non Aktif</span>
                @endif
            </td>
        </tr>
    </table>
</div>