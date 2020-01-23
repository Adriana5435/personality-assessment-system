<table>
    <thead>
    <tr>
        <th>Name</th>
        <th>Email</th>
        <th>Gender</th>
        <th>Register Date</th>
        <th>Jalali Register Date</th>
    </tr>
    </thead>
    <tbody>
    @foreach($users as $user)
        <tr>
            <td>{{ $user->name }}</td>
            <td>{{ $user->email }}</td>
            <td>{{ $user->gender }}</td>
            <td>{{ $user->created_at }}</td>
            <td>{{ \Morilog\Jalali\Jalalian::fromCarbon($user->created_at)->format('Y/m/d') }}</td>
        </tr>
    @endforeach
    </tbody>
</table>
