<h1>{{ __('Students') }}</h1>
<table id="students-table" class="dataTable">
    <thead>
        <tr>
            <th data-col="0">{{ __('ID') }}</th>
            <th data-col="1">{{ __('Firstname') }}</th>
            <th data-col="2">{{ __('Lastname') }}</th>
            <th data-col="3">{{ __('Num. of submitted problems') }}</th>
            <th data-col="4">{{ __('Num. of handed in problems') }}</th>
            <th data-col="5">{{ __('Points') }}</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($students as $student)
            <tr>
                <td>{{ $student->id }}</td>
                <td>{{ $student->firstname }}</td>
                <td>{{ $student->lastname }}</td>
                <td>{{ $student->mathProblems->count() }}</td>
                <td>{{ $student->submittedMathProblems->count() }}</td>
                <td>{{ $student->getPoints() }}</td>
            </tr>
        @endforeach
    </tbody>
</table>

<script src="https://code.jquery.com/jquery-3.7.0.min.js" integrity="sha256-2Pmvv0kuTBOenSvLm6bvfBSSHrUJ+3A7x6P5Ebd07/g=" crossorigin="anonymous"></script>
<link rel="stylesheet" href="https://cdn.datatables.net/1.10.25/css/jquery.dataTables.min.css">
<script src="https://cdn.datatables.net/1.10.25/js/jquery.dataTables.min.js"></script>

<script>
    $(document).ready(function() {
        $('#students-table').DataTable({
            columnDefs: [
                { targets: [3], orderData: [3, 2] },
                { targets: [4], orderData: [4, 2] },
                { targets: [5], orderData: [5, 2] },
            ]
        });
    });
</script>
