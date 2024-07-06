<h1>My first page in Laravel</h1>


<a href="/do">Try page</a>


@php
    $name = ["ok" , "AM", "TM"];
@endphp

<ul>
    @foreach ($name as $i)
        <li>{{ $i }} </li>
    @endforeach
</ul>