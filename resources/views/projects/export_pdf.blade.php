<!DOCTYPE html>
<html>
<head>
    <title>Projects PDF</title>
    <style>
        /* Add any necessary styles for your PDF */
        body { font-family: DejaVu Sans, sans-serif; }
        table { width: 100%; border-collapse: collapse; }
        th, td { border: 1px solid #ddd; padding: 8px; }
        th { background-color: #f2f2f2; }
    </style>
</head>
<body>
    <h1>Projects List</h1>
    <table>
        <thead>
            <tr>
                <th>Project Name</th>
                <th>Contractor</th>
                <th>Foreman</th>
                <th>Start Date</th>
                <th>End Date</th>
                <th>Amount</th>
                <th>Status</th>
            </tr>
        </thead>
        <tbody>
            @foreach($projects as $project)
            <tr>
                <td>{{ $project->name }}</td>
                <td>{{ $project->contractor }}</td>
                <td>{{ $project->foreman }}</td>
                <td>{{ $project->start_date->format('F j, Y') }}</td>
                <td>{{ $project->end_date->format('F j, Y') }}</td>
                <td>${{ number_format($project->amount, 2) }}</td>
                <td>{{ $project->status }}</td>
            </tr>
            @endforeach
        </tbody>
    </table>
</body>
</html>
