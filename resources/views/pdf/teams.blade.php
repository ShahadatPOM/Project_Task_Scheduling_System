<style>
    table {
        width: 100%;
        text-align: center;
        border-collapse: collapse;
    }

    table, th, td {
        border: 1px solid black;
    }
</style>
<h1 style="text-align: center">Team List</h1>
<h4>{{ date(now()) }}</h4>
<p>Total Team: {{ count($teams) }}</p>
<table>
    <thead>
    <tr>
        <th style="width: 20%">
            Name
        </th>
        <th style="width: 20%">
            Department
        </th>
        <th style="width: 20%">
            Role
        </th>
        <th style="width: 20%">
            Members
        </th>
        <th style="width: 20%">
            Projects
        </th>
        <th style="width: 20%">
            Status
        </th>
    </tr>
    <tbody>
    @php
        $member = [];
    @endphp
    @foreach($teams as $team)
        @foreach($team->users as $user)
            <tr>
                @if(!in_array($team->name, $member))
                    @php
                        $member[] = $team->name;
                    @endphp
                    <td rowspan="{{ count($team->users) }}">{{ $team->name }}</td>
                @endif

                @if(!in_array($team->department->name, $member))
                    @php
                        $member[] = $team->department->name;
                    @endphp
                    <td rowspan="{{ count($team->users) }}">{{ $team->department->name }}</td>
                @endif


                <td>{{ $user->role->name }}</td>


                <td>{{ $user->name }}</td>
                @if(!in_array($team->projects, $member))
                    @php
                        $member[] = $team->department->name;
                    @endphp
                    <td>{{ count($team->projects) }}</td>
                @endif
                <td>{{ $team->status == 1 ? 'Active' : 'Inactive' }}</td>
            </tr>
        @endforeach
    @endforeach

    </tbody>
</table>
