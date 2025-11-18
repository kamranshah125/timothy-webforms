<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>{{ $form_name ?? 'Form Submission' }}</title>
    <style>
        body { font-family: DejaVu Sans, sans-serif; }
        table { width: 100%; border-collapse: collapse; margin-top: 20px; }
        th, td { border: 1px solid #ddd; padding: 8px; text-align: left; }
        th { background-color: #f2f2f2; }
    </style>
</head>
<body>
    <h2>{{ $form_name ?? ucfirst($form_type) }} - Submission</h2>
    <p><strong>User:</strong> {{ $user->name }}</p>
    <p><strong>Email:</strong> {{ $user->email }}</p>
    <p><strong>Date:</strong> {{ $submitted_at }}</p>

    <h3>Form Data:</h3>
    @foreach($form as $section => $fields)
        <h4>{{ ucfirst($section) }}</h4>
        <table>
            @foreach($fields as $key => $value)
                <tr>
                    <td><strong>{{ ucfirst(str_replace('_', ' ', $key)) }}</strong></td>
                    <td>{{ is_array($value) ? implode(', ', $value) : $value }}</td>
                </tr>
            @endforeach
        </table>
    @endforeach

    <h3>Section Scores:</h3>
    <table>
        <tr><th>Section</th><th>Score</th></tr>
        @foreach($scores as $section => $score)
            <tr>
                <td>{{ ucfirst($section) }}</td>
                <td>{{ $score }}</td>
            </tr>
        @endforeach
    </table>

    <p><strong>Total Score:</strong> {{ array_sum($scores ?? []) }}</p>
</body>
</html>
