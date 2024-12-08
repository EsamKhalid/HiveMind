<table>
    <thead>
        <tr>
            <th>id</th>
            <th>First Name</th>
            <th>Last Name</th>
            <th>Email Address</th>
            <th>Phone Number</th>
            <th>Password</th>
            <th>Permission Level</th>
        </tr>
    </thead>
    <tbody>
        @foreach($user as $user)
        <tr>
            <td>{{$user->id}}</td>
            <td>{{$user->first_name}}</td>
            <td>{{$user->last_name}}</td>
            <td>{{$user->email_address}}</td>
            <td>{{$user->phone_number}}</td>
            <td>{{$user->password}}</td>
            <td>{{$user->permission_level}}</td>
        </tr>
        @endforeach
    </tbody>
</table>
