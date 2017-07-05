@layout(layouts.fbhome)

@section('content')

    @lang('home.index.default_content')
    {{ __FILE__ }}

    {{ Form:: open(array('url' => 'language' ,'method' =>'post')) }} <!--contact_request is a router from Route class-->
    {{ Form:: token() }}

    <select name="locale">

        <option value="en">English</option>
        <option value="de" {{ Lang::locale() === 'de' ? 'selected' : '' }}>German</option>

    </select>
    <input type="submit" value="Choose">

    </form>


    {{trans ('greeting.Hello')}}







@endsection
