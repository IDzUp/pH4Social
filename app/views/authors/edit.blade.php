@layout(layouts.default)

@section('content')




    <h1> Editing </h1>



    {{ Form:: open(array('url' => 'my/update', 'method' => 'put')) }} <!--contact_request is a router from Route class-->

    {{ Form::token() }}

    {{ Form:: label ('first_name', 'First Name*' )}}
    {{ Form:: text ('first_name', $author->name )}}  <br/>

    {{ Form:: label ('id', 'id Name*' )}}
    {{ Form:: text ('id', $author->id )}}  <br/>



    {{ Form::reset('Clear', array('class' => 'you css class for button')) }}<br/>
    {{ Form::submit('Update', array('class' => 'you css class for button')) }}<br/><br/>



    {{ Form:: close() }}<br/>



    {{ Form:: open(array('url' => 'my/delete', 'method' => 'delete')) }}

    {{ Form::hidden('id',$author->id)}}  <br/>


    {{ Form::submit('Delete', array('class' => 'you css class for button')) }}<br/><br/>

    {{ Form:: close() }}<br/>



@endsection
