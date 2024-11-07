<!DOCTYPE html>
<html>
<head>
    <title>Employees PDF</title>
    <style>
        /* Add any styles you need for the PDF */
    </style>
</head>
<body>
    <h1>Employee List</h1>
    <table border="1" cellpadding="5" cellspacing="0">
        <thead>
            <tr>
                <th>First Name</th>
                <th>Last Name</th>
                <th>Email</th>
                <th>Phone</th>
                <!-- Add other headers as needed -->
            </tr>
        </thead>
        <tbody>
            @foreach($employees as $employee)
            <tr>
                <td>{{ $employee->first_name }}</td>
                <td>{{ $employee->last_name }}</td>
                <td>{{ $employee->email }}</td>
                <td>{{ $employee->phone }}</td>
                <!-- Add other fields as needed -->
            </tr>
            @endforeach
        </tbody>
    </table>
</body>
</html>
