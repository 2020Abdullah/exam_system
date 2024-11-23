<!DOCTYPE html>
<html>
<head>
    <title> بيان درجات الطلاب </title>
    <!-- Include your CSS styles here -->
    <style>
        table {
            border-collapse: collapse;
            width: 100%;
            margin-bottom: 20px;
        }
    </style>
</head>
<body>

<h2 style="text-align: center;">بيان الدرجات ({{ $exam->title }})</h2>

<table>
    <thead>
    <tr>
        <th style="width: 100px;  background-color: #6495ED;">اسم الطالب</th>

        <th style="width: 160px;  background-color: #89CFF0;">الدرجة الكلية</th>

        <th style="width: 160px;  background-color: #6495ED;">درجة الطالب</th>

        <th style="width: 150px;  background-color: #89CFF0;">نتيجة الطالب</th>

    </tr>
    </thead>
    <tbody>
    @foreach ($reports as $report)
        <tr>
            <td>{{ $report->student->name }}</td>
            <td>{{ $exam->quetions->sum('score') }}</td>
            <td>{{ $report->score }}</td>
            <td>
                @if ($report->score >= $passingScore)
                    <span class="text-success">ناجح</span>
                @else 
                    <span class="text-danger">راسب</span>
                @endif
            </td>
        </tr>
    @endforeach
    </tbody>
</table>

<!-- Include your additional content or styling here -->

</body>
</html>
