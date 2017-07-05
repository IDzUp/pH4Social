@layout(layouts.default)

@section('content')


    @if($errors->has())

        {{ $errors->first('first_name',':message')}}
    @endif




@endsection
