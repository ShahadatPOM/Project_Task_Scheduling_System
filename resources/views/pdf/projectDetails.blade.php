<style>
    table{
        width: 100%;
        text-align: center;
        border-collapse: collapse;
    }
    table, th, td{
        border: 1px solid black;
    }
</style>
<h1 style="text-align: center">User List</h1>
<h4>{{ date(now()) }}</h4>
<p>Total User: {{ count($users) }}</p>
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
        <td>{{ $user->role->name }}</td>
        <td>{{ $user->status == 1 ? 'Active' : 'Inactive' }}</td>
    </tr>
    @endforeach
    </tbody>
</table>
