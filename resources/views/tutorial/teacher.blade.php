@if (isset($includeStyles) && $includeStyles)
    @vite(['resources/css/bootstrap.min.css', 'resources/css/style.css'])
@endif

<div class="card mt-4 mb-4">
    <div class="card-body">

        <p> {{ __('After logging in, you will find yourself on the home page. In the left part of the navigation, you can go to another subpage, and in the right part you can change the language or log out.') }} </p>
        <img class="img-fluid shadow" src="{{ asset("img/tutorial/teacher/homepage.png") }}">

    </div>
</div>

<div class="card mt-4 mb-4">
    <div class="card-body">

        <p> {{ __('On the Students subpage, you can view all students with their ID, the number of generated,  submitted tasks and points. You can download this table as CSV.') }} </p>
        <p> {{ __('Students can be sorted by clicking on the column name.') }} </p>
        <img class="img-fluid shadow" src="{{ asset("img/tutorial/teacher/student_list.png") }}">

    </div>
</div>

<div class="card mt-4 mb-4">
    <div class="card-body">

        <p> {{ __('You can open a detailed view of a student by clicking on a row in the table. Here you will find a list of all generated tasks for the student.') }} </p>
        <img class="img-fluid shadow" src="{{ asset("img/tutorial/teacher/student_profile.png") }}">

    </div>
</div>

<div class="card mt-4 mb-4">
    <div class="card-body">

        <p> {{ __('In the student details, you can click on the task set assignment page.') }} </p>
        <img class="img-fluid shadow" src="{{ asset("img/tutorial/teacher/student_sets.png") }}">

    </div>
</div>

<div class="card mt-4 mb-4">
    <div class="card-body">

        <p> {{ __('In the details of the student, you can click on the page of submitted math problems with their answer and the number of points.') }} </p>
        <img class="img-fluid shadow" src="{{ asset("img/tutorial/teacher/student_submitted_tasks.png") }}">

    </div>
</div>

<div class="card mt-4 mb-4">
    <div class="card-body">

        <p> {{ __('On the Sets subpage, you can upload a file with tasks and view them.') }} </p>
        <img class="img-fluid shadow" src="{{ asset("img/tutorial/teacher/sets_list.png") }}">

    </div>
</div>

<div class="card mt-4 mb-4">
    <div class="card-body">

        <p> {{ __('After clicking on the added task file, you will be presented with this page where you can assign the file to students, edit it, download it, or delete it.') }} </p>
        <img class="img-fluid shadow" src="{{ asset("img/tutorial/teacher/set_view.png") }}">

    </div>
</div>

<div class="card mt-4 mb-4">
    <div class="card-body">

        <p> {{ __('On this page you can add and remove students for which this set will be assigned.') }} </p>
        <img class="img-fluid shadow" src="{{ asset("img/tutorial/teacher/set_assigned.png") }}">

    </div>
</div>

<div class="card mt-4 mb-4">
    <div class="card-body">

        <p> {{ __('On this page, you can edit the set of tasks in detail, set the number of points, the date when they will be available.') }} </p>
        <img class="img-fluid shadow" src="{{ asset("img/tutorial/teacher/set_edit.png") }}">

    </div>
</div>

<div class="card mt-4 mb-4">
    <div class="card-body">

        <p> {{ __('On the Images subpage, you can upload images that will be used in the tasks.') }} </p>
        <img class="img-fluid shadow" src="{{ asset("img/tutorial/teacher/images_list.png") }}">

    </div>
</div>
