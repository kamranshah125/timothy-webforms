<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>{{ $form_name ?? 'Form Submission' }}</title>
    <style>
        /* Global */
        body {
            font-family: DejaVu Sans, sans-serif;
            font-size: 13px;
            margin: 30px;
            color: #333;
        }

        h2, h3, h4 {
            margin: 0 0 8px 0;
            font-weight: 600;
        }

        h2 { font-size: 20px; border-bottom: 2px solid #eee; padding-bottom: 6px; }
        h3 { font-size: 16px; margin-top: 30px; }
        h4 { font-size: 14px; margin-top: 20px; }

        /* User Info Box */
        .info-box {
            margin-top: 10px;
            padding: 12px;
            border: 1px solid #e5e5e5;
            background: #fafafa;
        }

        /* Tables */
        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 10px;
            font-size: 13px;
        }

        th, td {
            border: 1px solid #ddd;
            padding: 6px 8px;
            vertical-align: top;
        }

        th {
            background: #f5f5f5;
            font-weight: bold;
        }

        .section-title {
            margin-top: 25px;
            font-size: 15px;
            font-weight: 600;
            color: #444;
        }

    </style>
</head>
<body>

    <h2>{{ $form_name ?? ucfirst($form_type) }} — Submission Report</h2>

    <div class="info-box">
        <p><strong>User:</strong> {{ $user->name }}</p>
        <p><strong>Email:</strong> {{ $user->email }}</p>
        <p><strong>Date:</strong> {{ $submitted_at }}</p>
    </div>

    <h3>Form Data</h3>

    @foreach ($form as $section => $fields)
        <h4 class="section-title">{{ ucfirst($section) }}</h4>

        <table>
            @foreach ($fields as $key => $value)
                <tr>
                    <td style="width: 30%;"><strong>{{ ucfirst(str_replace('_',' ', $key)) }}</strong></td>
                    <td>{{ is_array($value) ? implode(', ', $value) : $value }}</td>
                </tr>
            @endforeach
        </table>
    @endforeach

    <h3>Section Scores</h3>

    <table>
        <tr>
            <th style="width: 70%;">Section</th>
            <th>Score</th>
        </tr>
        @foreach ($scores as $section => $score)
            <tr>
                <td>{{ ucfirst($section) }}</td>
                <td>{{ $score }}</td>
            </tr>
        @endforeach
    </table>

    <h3>Total Score</h3>
    <p><strong>{{ array_sum($scores ?? []) }}</strong></p>

</body>
</html>
