
<ul>
    @foreach ($sets as $set)

    <li>
        <a href="{{ route('sets.view', ["id" => $set->id]) }}">{{ $set->getTitle()}}</a>
    </li>

    @endforeach
</ul>
