<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Saim</title>
</head>
<body>
        <h1>SAIM</h1>
        
        <a href="{{ route('saim.create') }}">CREATE</a><br>

        <table>
            <th>
                <tr>
                    <th>UserName</th>
                    <th>email</th>
                    <th>Password</th>
                </tr>
            </th>
            <tbody>
                @foreach($saims as $saim)
                <tr>
                    <td>{{ $saim->Username }}</td>
                    <td>{{ $saim->email }}</td>
                    <td>{{ $saim->password }}</td>
                    <td>
                        <a href="{{ route('saim.edit', $saim->id) }}">EDIT</a>
                        <a href="{{ route('saim.delete', $saim->id) }}" onclick="return confirm('Are You Sure You Want To Delete This?')">DELETE</a>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
</body>