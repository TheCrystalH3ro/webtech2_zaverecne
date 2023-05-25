@if (isset($includeStyles) && $includeStyles)
    @vite(['resources/css/bootstrap.min.css', 'resources/css/style.css'])
@endif

<div class="card mt-4 mb-4">
    <div class="card-body">

        <p> {{ __('After logging in, you will find yourself on the home page. In the left part of the navigation, you can go to another subpage, and in the right part you can change the language or log out.') }} </p>
        <img class="img-fluid shadow" src="{{ asset("img/tutorial/student/homepage_empty.png") }}">

    </div>
</div>

<div class="card mt-4 mb-4">
    <div class="card-body">

        <p> {{ __('After clicking on generate, you can choose the task sets assigned to you by the teacher.') }} </p>
        <img class="img-fluid shadow" src="{{ asset("img/tutorial/student/task_generation_filled.png") }}">

        <p class="mt-3"> {{ __('If you have already generated all task sets, you will see this blank page.') }} </p>
        <img class="img-fluid shadow" src="{{ asset("img/tutorial/student/task_generation_empty.png") }}">

    </div>
</div>

<div class="card mt-4 mb-4">
    <div class="card-body">

        <p> {{ __('Subsequently, after generations of examples, they will be displayed on the main page.') }} </p>
        <img class="img-fluid shadow" src="{{ asset("img/tutorial/student/homepage_filled.png") }}">

    </div>
</div>

<div class="card mt-4 mb-4">
    <div class="card-body">

        <p> {{ __('After clicking the solve button, you will see this page.') }} </p>
        <img class="img-fluid shadow" src="{{ asset("img/tutorial/student/task_view.png") }}">

        <p class="mt-3"> {{ __('Below are written instructions for using the math editor and a place to fill in the solution.') }} </p>
        <img class="img-fluid shadow" src="{{ asset("img/tutorial/student/task_answer.png") }}">

    </div>
</div>
