<h1 style="text-align: center">User List</h1>
<table>
    <thead>
    <tr>
        <th style="width: 20%">
            Name
        </th>
        <th style="width: 20%">
            Email
        </th>
        <th style="width: 20%">
            Department
        </th>
        <th style="width: 20%">
            Role
        </th>
        <th style="width: 20%">
            Status
        </th>
    </tr>
    <tbody>
    @foreach($users as $user)
    <tr>
        <td>{{ $user->name }}</td>
        <td>{{ $user->email }}</td>
        <td>{{ $user->department->name }}</td>
        <td>{{ $user->status }}</td>
        <td>{{ $user->role->name }}</td>
    </tr>
    @endforeach
    </tbody>
</table>
