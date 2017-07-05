@layout(layouts.default)

@section('content')



    <ul>

        @foreach( $author as $hello)

            <li>{{ HTML::linkRoute('author', $hello->name, array($hello->id)) }}   </li>




        @endforeach
    </ul>
@endsection
