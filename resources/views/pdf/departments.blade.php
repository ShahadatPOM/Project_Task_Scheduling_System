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
<h1 style="text-align: center">Department List</h1>
<h4>{{ date(now()) }}</h4>
<p>Total Department: {{ count($departments) }}</p>


<table>
    <thead>
    <tr>
        <th style="width: 20%">
            Department Name
        </th>

        <th style="width: 20%">
            Status
        </th>
        <th style="width: 20%">
            Total Members
        </th>

    </tr>
    <tbody>

    @foreach($departments as $department)

    <tr>
        <td>{{ $department->name }}</td>
        <td>{{ $department->status == 1 ? 'Active' : 'Inactive' }}</td>
        <td>{{ count($department->users()->get())   }}</td>
    </tr>
    @endforeach
    </tbody>
</table>
