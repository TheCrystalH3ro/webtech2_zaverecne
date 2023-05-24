@extends('layouts.app')

@section('content')
    <div class="w-100 mb-5">

        <div class="card border-primary w-100 mt-3">
            <div class="card-header">
                {{ __('Students') }}
            </div>
            <div class="card-body">
                <table id="students-table" class="dataTable table table-hover">
                    <thead>
                        <tr>
                            <th data-col="0">{{ __('ID') }}</th>
                            <th data-col="1">{{ __('Firstname') }}</th>
                            <th data-col="2">{{ __('Lastname') }}</th>
                            <th data-col="3">{{ __('Num. of generated tasks') }}</th>
                            <th data-col="4">{{ __('Num. of handed in tasks') }}</th>
                            <th data-col="5">{{ __('Points') }}</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($students as $student)
                            <tr data-id="{{ $student->id }}">
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
            </div>
        </div>


    </div>


@endsection

@section('scripts')
    @parent

    <link href="https://cdn.datatables.net/v/bs5/dt-1.13.4/b-2.3.6/b-html5-2.3.6/datatables.min.css" rel="stylesheet"/>
    <script src="https://cdn.datatables.net/v/bs5/dt-1.13.4/b-2.3.6/b-html5-2.3.6/datatables.min.js"></script>

    <script>
        $(document).ready(function() {
            $('#students-table').DataTable({
                dom: 'Bfrtip',
                responsive: true,
                columnDefs: [
                    { targets: [3], orderData: [3, 2] },
                    { targets: [4], orderData: [4, 2] },
                    { targets: [5], orderData: [5, 2] },
                ],
                buttons: [
                    {extend: 'csv', text: "{{__('DOWNLOAD CSV')}}" }
                ]
            });

            $("#students-table tbody tr").click((event) => {
                let element = $(event.currentTarget);

                let id = element.data('id');

                let url = "{{ route('student.view', 'student_id') }}";

                url = url.replace("student_id", id);

                window.location = url;
            });
        });
    </script>
@endsection
