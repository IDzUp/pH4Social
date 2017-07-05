@layout(layouts.default)

@section('content')




    <div class="container-fluid">
        <!-- Page Heading -->
        <div class="row">
            <div class="col-lg-12">
                <h1 class="page-header">Edit Users </h1>
                <ol class="breadcrumb">
                    <li><i class="fa fa-dashboard"></i> <a href="{{ asset('/index.php') }}/admin">Dashboard</a></li>
                    <li><i class="fa fa-dashboard"></i> <a href="{{ asset('/index.php') }}/users">Users List</a></li>
                    <li class="active"><span class="glyphicon glyphicon-user"></span> Edit Users</li>
                </ol>
            </div>
        </div>
        <!-- /.row -->
        <div class="row">
            <div class="col-lg-12">
                <div class="panel panel-default">
                    <div class="panel-heading">
                        <h3 class="panel-title"><span class="glyphicon glyphicon-user"></span> Edit Users </h3>
                    </div>

                    @if(Session::has('success'))
                        <div class="alert alert-success">


                            <strong>{{ Session::get('success') }}</strong>

                        </div>

                    @endif

                    <div class="editing">

                    {{ Form:: open(array('url' => 'updatereg' ,'method' =>'get','class' => 'login')) }} <!--contact_request is a router from Route class-->
                        @if($errors->any())

                            {{ implode('', $errors->all('<div class="valid">:message</div>'))  }}
                        @endif
                        {{ Form::token() }}

                        <div id="center" class="resgister_box">
                            <!--<h1><span class="sign-up">Add Users</span> </h1>-->

                            <form class="form-horizontal" role="form">
                                <div class="form-group">
                                    {{ Form:: label ('email', 'Email Name*' )}}


                                    <input type="text" value="{{$edit->email}}" readonly="" class="form-control"/>
                                    {{ Form::hidden('id',$edit->id)}}
                                </div>
                                <div class="form-group">

                                    {{ Form:: label ('city', 'City Name*' )}}
                                    <input type="text" value="{{$edit->city}}" name="city" class="form-control"/>


                                </div>

                                <div class="form-group">
                                    {{ Form:: label ('username', 'User Name*' )}}

                                    <input type="text" value="{{$edit->name}}" name="name" class="form-control"/>
                                </div>
                                <div class="form-group">
                                    {{ Form:: label ('phone', 'Phone' )}}

                                    <input type="text" maxlength="20" value="{{$edit->phone}}" name="phone"
                                           class="form-control"/>

                                </div>


                                <div class="form-group">
                                {{ Form:: label ('location', 'Country' )}}
                                <!--
          <input type="text" value="{{$edit->location}}" name="location" class="form-control"/>  -->
                                    <select class="county" name="location">

                                        <option selected disabled>Select Country</option>
                                        <option <?php if ($edit->location == 'Afghanistan') {
                                            echo 'selected="selected"';
                                        } ?> value="Afghanistan">Afghanistan
                                        </option>
                                        <option <?php if ($edit->location == 'Åland Islands') {
                                            echo 'selected="selected"';
                                        } ?> value="Åland Islands">Åland Islands
                                        </option>
                                        <option <?php if ($edit->location == 'Albania') {
                                            echo 'selected="selected"';
                                        } ?> value="Albania">Albania
                                        </option>
                                        <option <?php if ($edit->location == 'Algeria') {
                                            echo 'selected="selected"';
                                        } ?> value="Algeria">Algeria
                                        </option>
                                        <option <?php if ($edit->location == 'American Samoa') {
                                            echo 'selected="selected"';
                                        } ?> value="American Samoa">American Samoa
                                        </option>
                                        <option <?php if ($edit->location == 'Andorra') {
                                            echo 'selected="selected"';
                                        } ?> value="Andorra">Andorra
                                        </option>
                                        <option <?php if ($edit->location == 'Angola') {
                                            echo 'selected="selected"';
                                        } ?> value="Angola">Angola
                                        </option>
                                        <option <?php if ($edit->location == 'Anguilla') {
                                            echo 'selected="selected"';
                                        } ?> value="Anguilla">Anguilla
                                        </option>
                                        <option <?php if ($edit->location == 'Antarctica') {
                                            echo 'selected="selected"';
                                        } ?> value="Antarctica">Antarctica
                                        </option>
                                        <option <?php if ($edit->location == 'Antigua and Barbuda') {
                                            echo 'selected="selected"';
                                        } ?> value="Antigua and Barbuda">Antigua and Barbuda
                                        </option>
                                        <option <?php if ($edit->location == 'Argentina') {
                                            echo 'selected="selected"';
                                        } ?> value="Argentina">Argentina
                                        </option>
                                        <option <?php if ($edit->location == 'Armenia') {
                                            echo 'selected="selected"';
                                        } ?> value="Armenia">Armenia
                                        </option>
                                        <option <?php if ($edit->location == 'Aruba') {
                                            echo 'selected="selected"';
                                        } ?> value="Aruba">Aruba
                                        </option>
                                        <option <?php if ($edit->location == 'Australia') {
                                            echo 'selected="selected"';
                                        } ?> value="Australia">Australia
                                        </option>
                                        <option <?php if ($edit->location == 'Austria') {
                                            echo 'selected="selected"';
                                        } ?> value="Austria">Austria
                                        </option>
                                        <option <?php if ($edit->location == 'Azerbaijan') {
                                            echo 'selected="selected"';
                                        } ?> value="Azerbaijan">Azerbaijan
                                        </option>
                                        <option <?php if ($edit->location == 'Bahamas') {
                                            echo 'selected="selected"';
                                        } ?> value="Bahamas">Bahamas
                                        </option>
                                        <option <?php if ($edit->location == 'Bahrain') {
                                            echo 'selected="selected"';
                                        } ?> value="Bahrain">Bahrain
                                        </option>
                                        <option <?php if ($edit->location == 'Bangladesh') {
                                            echo 'selected="selected"';
                                        } ?> value="Bangladesh">Bangladesh
                                        </option>
                                        <option <?php if ($edit->location == 'Barbados') {
                                            echo 'selected="selected"';
                                        } ?>value="Barbados">Barbados
                                        </option>
                                        <option <?php if ($edit->location == 'Belarus') {
                                            echo 'selected="selected"';
                                        } ?> value="Belarus">Belarus
                                        </option>
                                        <option <?php if ($edit->location == 'Belgium') {
                                            echo 'selected="selected"';
                                        } ?> value="Belgium">Belgium
                                        </option>
                                        <option <?php if ($edit->location == 'Belize') {
                                            echo 'selected="selected"';
                                        } ?> value="Belize">Belize
                                        </option>
                                        <option <?php if ($edit->location == 'Benin') {
                                            echo 'selected="selected"';
                                        } ?> value="Benin">Benin
                                        </option>
                                        <option <?php if ($edit->location == 'Bermuda') {
                                            echo 'selected="selected"';
                                        } ?> value="Bermuda">Bermuda
                                        </option>
                                        <option <?php if ($edit->location == 'Bhutan') {
                                            echo 'selected="selected"';
                                        } ?> value="Bhutan">Bhutan
                                        </option>
                                        <option <?php if ($edit->location == 'Bolivia, Plurinational State of') {
                                            echo 'selected="selected"';
                                        } ?> value="Bolivia, Plurinational State of">Bolivia, Plurinational State of
                                        </option>
                                        <option <?php if ($edit->location == 'Bonaire, Sint Eustatius and Saba') {
                                            echo 'selected="selected"';
                                        } ?> value="Bonaire, Sint Eustatius and Saba">Bonaire, Sint Eustatius and Saba
                                        </option>
                                        <option <?php if ($edit->location == 'Bonaire, Sint Eustatius and Saba') {
                                            echo 'selected="selected"';
                                        } ?> value="Bonaire, Sint Eustatius and Saba">Bosnia and Herzegovina
                                        </option>
                                        <option <?php if ($edit->location == 'Botswana') {
                                            echo 'selected="selected"';
                                        } ?> value="Botswana">Botswana
                                        </option>
                                        <option <?php if ($edit->location == 'Bouvet Island') {
                                            echo 'selected="selected"';
                                        } ?> value="Bouvet Island">Bouvet Island
                                        </option>
                                        <option <?php if ($edit->location == 'Brazil') {
                                            echo 'selected="selected"';
                                        } ?> value="Brazil">Brazil
                                        </option>
                                        <option <?php if ($edit->location == 'British Indian Ocean Territory') {
                                            echo 'selected="selected"';
                                        } ?> value="British Indian Ocean Territory">British Indian Ocean Territory
                                        </option>
                                        <option <?php if ($edit->location == 'Brunei Darussalam') {
                                            echo 'selected="selected"';
                                        } ?> value="Brunei Darussalam">Brunei Darussalam
                                        </option>
                                        <option <?php if ($edit->location == 'Bulgaria') {
                                            echo 'selected="selected"';
                                        } ?> value="Bulgaria">Bulgaria
                                        </option>
                                        <option <?php if ($edit->location == 'Burkina Faso') {
                                            echo 'selected="selected"';
                                        } ?> value="Burkina Faso">Burkina Faso
                                        </option>
                                        <option <?php if ($edit->location == 'Burundi') {
                                            echo 'selected="selected"';
                                        } ?> value="Burundi">Burundi
                                        </option>
                                        <option <?php if ($edit->location == 'Cambodia') {
                                            echo 'selected="selected"';
                                        } ?> value="Cambodia">Cambodia
                                        </option>
                                        <option <?php if ($edit->location == 'Cameroon') {
                                            echo 'selected="selected"';
                                        } ?> value="Cameroon">Cameroon
                                        </option>
                                        <option <?php if ($edit->location == 'Canada') {
                                            echo 'selected="selected"';
                                        } ?> value="Canada">Canada
                                        </option>
                                        <option <?php if ($edit->location == 'Cape Verde') {
                                            echo 'selected="selected"';
                                        } ?> value="Cape Verde">Cape Verde
                                        </option>
                                        <option <?php if ($edit->location == 'Cayman Islands') {
                                            echo 'selected="selected"';
                                        } ?> value="Cayman Islands">Cayman Islands
                                        </option>
                                        <option <?php if ($edit->location == 'Central African Republic') {
                                            echo 'selected="selected"';
                                        } ?> value="Central African Republic">Central African Republic
                                        </option>
                                        <option <?php if ($edit->location == 'Chad') {
                                            echo 'selected="selected"';
                                        } ?> value="Chad">Chad
                                        </option>
                                        <option <?php if ($edit->location == 'Chile') {
                                            echo 'selected="selected"';
                                        } ?> value="Chile">Chile
                                        </option>
                                        <option <?php if ($edit->location == 'China') {
                                            echo 'selected="selected"';
                                        } ?> value="China">China
                                        </option>
                                        <option <?php if ($edit->location == 'Christmas Island') {
                                            echo 'selected="selected"';
                                        } ?> value="Christmas Island">Christmas Island
                                        </option>
                                        <option <?php if ($edit->location == 'Cocos (Keeling) Islands') {
                                            echo 'selected="selected"';
                                        } ?> value="Cocos (Keeling) Islands">Cocos (Keeling) Islands
                                        </option>
                                        <option <?php if ($edit->location == 'Colombia') {
                                            echo 'selected="selected"';
                                        } ?> value="Colombia">Colombia
                                        </option>
                                        <option <?php if ($edit->location == 'Comoros') {
                                            echo 'selected="selected"';
                                        } ?> value="Comoros">Comoros
                                        </option>
                                        <option <?php if ($edit->location == 'Congo') {
                                            echo 'selected="selected"';
                                        } ?> value="Congo">Congo
                                        </option>
                                        <option <?php if ($edit->location == 'Congo, the Democratic Republic of the') {
                                            echo 'selected="selected"';
                                        } ?> value="Congo, the Democratic Republic of the">Congo, the Democratic
                                            Republic of the
                                        </option>
                                        <option <?php if ($edit->location == 'Cook Islands') {
                                            echo 'selected="selected"';
                                        } ?> value="Cook Islands">Cook Islands
                                        </option>
                                        <option <?php if ($edit->location == 'Costa Rica') {
                                            echo 'selected="selected"';
                                        } ?> value="Costa Rica">Costa Rica
                                        </option>
                                        <option <?php if ($edit->location == "Côte d'Ivoire") {
                                            echo 'selected="selected"';
                                        } ?>value="Côte d'Ivoire">Côte d'Ivoire
                                        </option>
                                        <option <?php if ($edit->location == 'Croatia') {
                                            echo 'selected="selected"';
                                        } ?> value="Croatia">Croatia
                                        </option>
                                        <option <?php if ($edit->location == 'Cuba') {
                                            echo 'selected="selected"';
                                        } ?> value="Cuba">Cuba
                                        </option>
                                        <option <?php if ($edit->location == 'Curaçao') {
                                            echo 'selected="selected"';
                                        } ?> value="Curaçao">Curaçao
                                        </option>
                                        <option <?php if ($edit->location == 'Cyprus') {
                                            echo 'selected="selected"';
                                        } ?> value="Cyprus">Cyprus
                                        </option>
                                        <option <?php if ($edit->location == 'Czech Republic') {
                                            echo 'selected="selected"';
                                        } ?> value="Czech Republic">Czech Republic
                                        </option>
                                        <option <?php if ($edit->location == 'Denmark') {
                                            echo 'selected="selected"';
                                        } ?> value="Denmark">Denmark
                                        </option>
                                        <option <?php if ($edit->location == 'Djibouti') {
                                            echo 'selected="selected"';
                                        } ?> value="Djibouti">Djibouti
                                        </option>
                                        <option <?php if ($edit->location == 'Dominica') {
                                            echo 'selected="selected"';
                                        } ?> value="Dominica">Dominica
                                        </option>
                                        <option <?php if ($edit->location == 'Dominican Republic') {
                                            echo 'selected="selected"';
                                        } ?> value="Dominican Republic">Dominican Republic
                                        </option>
                                        <option <?php if ($edit->location == 'Ecuador') {
                                            echo 'selected="selected"';
                                        } ?> value="Ecuador">Ecuador
                                        </option>
                                        <option <?php if ($edit->location == 'Egypt') {
                                            echo 'selected="selected"';
                                        } ?> value="Egypt">Egypt
                                        </option>
                                        <option <?php if ($edit->location == 'El Salvador') {
                                            echo 'selected="selected"';
                                        } ?> value="El Salvador">El Salvador
                                        </option>
                                        <option <?php if ($edit->location == 'Equatorial Guinea') {
                                            echo 'selected="selected"';
                                        } ?> value="Equatorial Guinea">Equatorial Guinea
                                        </option>
                                        <option <?php if ($edit->location == 'Eritrea') {
                                            echo 'selected="selected"';
                                        } ?> value="Eritrea">Eritrea
                                        </option>
                                        <option <?php if ($edit->location == 'Estonia') {
                                            echo 'selected="selected"';
                                        } ?> value="Estonia">Estonia
                                        </option>
                                        <option <?php if ($edit->location == 'Ethiopia') {
                                            echo 'selected="selected"';
                                        } ?> value="Ethiopia">Ethiopia
                                        </option>
                                        <option <?php if ($edit->location == 'Falkland Islands (Malvinas)') {
                                            echo 'selected="selected"';
                                        } ?> value="Falkland Islands (Malvinas)">Falkland Islands (Malvinas)
                                        </option>
                                        <option <?php if ($edit->location == 'Faroe Islands') {
                                            echo 'selected="selected"';
                                        } ?> value="Faroe Islands">Faroe Islands
                                        </option>
                                        <option <?php if ($edit->location == 'Fiji') {
                                            echo 'selected="selected"';
                                        } ?> value="Fiji">Fiji
                                        </option>
                                        <option <?php if ($edit->location == 'Finland') {
                                            echo 'selected="selected"';
                                        } ?> value="Finland">Finland
                                        </option>
                                        <option <?php if ($edit->location == 'France') {
                                            echo 'selected="selected"';
                                        } ?> value="France">France
                                        </option>
                                        <option <?php if ($edit->location == 'French Guiana') {
                                            echo 'selected="selected"';
                                        } ?> value="French Guiana">French Guiana
                                        </option>
                                        <option <?php if ($edit->location == 'French Polynesia') {
                                            echo 'selected="selected"';
                                        } ?> value="French Polynesia">French Polynesia
                                        </option>
                                        <option <?php if ($edit->location == 'French Southern Territories') {
                                            echo 'selected="selected"';
                                        } ?> value="French Southern Territories">French Southern Territories
                                        </option>
                                        <option <?php if ($edit->location == 'Gabon') {
                                            echo 'selected="selected"';
                                        } ?> value="Gabon">Gabon
                                        </option>
                                        <option <?php if ($edit->location == 'Gambia') {
                                            echo 'selected="selected"';
                                        } ?> value="Gambia">Gambia
                                        </option>
                                        <option <?php if ($edit->location == 'Georgia') {
                                            echo 'selected="selected"';
                                        } ?> value="Georgia">Georgia
                                        </option>
                                        <option <?php if ($edit->location == 'Germany') {
                                            echo 'selected="selected"';
                                        } ?> value="Germany">Germany
                                        </option>
                                        <option <?php if ($edit->location == 'Ghana') {
                                            echo 'selected="selected"';
                                        } ?> value="Ghana">Ghana
                                        </option>
                                        <option <?php if ($edit->location == 'Gibraltar') {
                                            echo 'selected="selected"';
                                        } ?> value="Gibraltar">Gibraltar
                                        </option>
                                        <option <?php if ($edit->location == 'Greece') {
                                            echo 'selected="selected"';
                                        } ?> value="Greece">Greece
                                        </option>
                                        <option <?php if ($edit->location == 'Greenland') {
                                            echo 'selected="selected"';
                                        } ?> value="Greenland">Greenland
                                        </option>
                                        <option <?php if ($edit->location == 'Grenada') {
                                            echo 'selected="selected"';
                                        } ?> value="Grenada">Grenada
                                        </option>
                                        <option <?php if ($edit->location == 'Guadeloupe') {
                                            echo 'selected="selected"';
                                        } ?> value="Guadeloupe">Guadeloupe
                                        </option>
                                        <option <?php if ($edit->location == 'Guam') {
                                            echo 'selected="selected"';
                                        } ?> value="Guam">Guam
                                        </option>
                                        <option <?php if ($edit->location == 'Guatemala') {
                                            echo 'selected="selected"';
                                        } ?> value="Guatemala">Guatemala
                                        </option>
                                        <option <?php if ($edit->location == 'Guernsey') {
                                            echo 'selected="selected"';
                                        } ?> value="Guernsey">Guernsey
                                        </option>
                                        <option <?php if ($edit->location == 'Guinea') {
                                            echo 'selected="selected"';
                                        } ?> value="Guinea">Guinea
                                        </option>
                                        <option <?php if ($edit->location == 'Guinea-Bissau') {
                                            echo 'selected="selected"';
                                        } ?> value="Guinea-Bissau">Guinea-Bissau
                                        </option>
                                        <option <?php if ($edit->location == 'Guyana') {
                                            echo 'selected="selected"';
                                        } ?> value="Guyana">Guyana
                                        </option>
                                        <option <?php if ($edit->location == 'Haiti') {
                                            echo 'selected="selected"';
                                        } ?> value="Haiti">Haiti
                                        </option>
                                        <option <?php if ($edit->location == 'Heard Island and McDonald Islands') {
                                            echo 'selected="selected"';
                                        } ?> value="Heard Island and McDonald Islands">Heard Island and McDonald Islands
                                        </option>
                                        <option <?php if ($edit->location == 'Holy See (Vatican City State)') {
                                            echo 'selected="selected"';
                                        } ?> value="Holy See (Vatican City State)">Holy See (Vatican City State)
                                        </option>
                                        <option <?php if ($edit->location == 'Honduras') {
                                            echo 'selected="selected"';
                                        } ?> value="Honduras">Honduras
                                        </option>
                                        <option <?php if ($edit->location == 'Hong Kong') {
                                            echo 'selected="selected"';
                                        } ?> value="Hong Kong">Hong Kong
                                        </option>
                                        <option <?php if ($edit->location == 'Hungary') {
                                            echo 'selected="selected"';
                                        } ?> value="Hungary">Hungary
                                        </option>
                                        <option <?php if ($edit->location == 'Iceland') {
                                            echo 'selected="selected"';
                                        } ?> value="Iceland">Iceland
                                        </option>
                                        <option <?php if ($edit->location == 'India') {
                                            echo 'selected="selected"';
                                        } ?> value="India">India
                                        </option>
                                        <option <?php if ($edit->location == 'Indonesia') {
                                            echo 'selected="selected"';
                                        } ?> value="Indonesia">Indonesia
                                        </option>
                                        <option <?php if ($edit->location == 'Iran, Islamic Republic of') {
                                            echo 'selected="selected"';
                                        } ?> value="Iran, Islamic Republic of">Iran, Islamic Republic of
                                        </option>
                                        <option <?php if ($edit->location == 'Iraq') {
                                            echo 'selected="selected"';
                                        } ?> value="Iraq">Iraq
                                        </option>
                                        <option <?php if ($edit->location == 'Ireland') {
                                            echo 'selected="selected"';
                                        } ?> value="Ireland">Ireland
                                        </option>
                                        <option <?php if ($edit->location == 'Isle of Man') {
                                            echo 'selected="selected"';
                                        } ?> value="Isle of Man">Isle of Man
                                        </option>
                                        <option <?php if ($edit->location == 'Israel') {
                                            echo 'selected="selected"';
                                        } ?> value="Israel">Israel
                                        </option>
                                        <option <?php if ($edit->location == 'Italy') {
                                            echo 'selected="selected"';
                                        } ?> value="Italy">Italy
                                        </option>
                                        <option <?php if ($edit->location == 'Jamaica') {
                                            echo 'selected="selected"';
                                        } ?> value="Jamaica">Jamaica
                                        </option>
                                        <option <?php if ($edit->location == 'Japan') {
                                            echo 'selected="selected"';
                                        } ?> value="Japan">Japan
                                        </option>
                                        <option <?php if ($edit->location == 'Jersey') {
                                            echo 'selected="selected"';
                                        } ?> value="Jersey">Jersey
                                        </option>
                                        <option <?php if ($edit->location == 'Jordan') {
                                            echo 'selected="selected"';
                                        } ?> value="Jordan">Jordan
                                        </option>
                                        <option <?php if ($edit->location == 'Kazakhstan') {
                                            echo 'selected="selected"';
                                        } ?> value="Kazakhstan">Kazakhstan
                                        </option>
                                        <option <?php if ($edit->location == 'Kenya') {
                                            echo 'selected="selected"';
                                        } ?> value="Kenya">Kenya
                                        </option>
                                        <option <?php if ($edit->location == 'Kiribati') {
                                            echo 'selected="selected"';
                                        } ?> value="Kiribati">Kiribati
                                        </option>
                                        <option <?php if ($edit->location == "Korea, Democratic People's Republic of") {
                                            echo 'selected="selected"';
                                        } ?>value="Korea, Democratic People's Republic of">Korea, Democratic People's
                                            Republic of
                                        </option>
                                        <option <?php if ($edit->location == 'Korea, Republic of') {
                                            echo 'selected="selected"';
                                        } ?> value="Korea, Republic of">Korea, Republic of
                                        </option>
                                        <option <?php if ($edit->location == 'Kuwait') {
                                            echo 'selected="selected"';
                                        } ?> value="Kuwait">Kuwait
                                        </option>
                                        <option <?php if ($edit->location == 'Kyrgyzstan') {
                                            echo 'selected="selected"';
                                        } ?> value="Kyrgyzstan">Kyrgyzstan
                                        </option>
                                        <option <?php if ($edit->location == "Lao People's Democratic Republic") {
                                            echo 'selected="selected"';
                                        } ?> value="Lao People's Democratic Republic">Lao People's Democratic Republic
                                        </option>
                                        <option <?php if ($edit->location == 'Latvia') {
                                            echo 'selected="selected"';
                                        } ?> value="Latvia">Latvia
                                        </option>
                                        <option <?php if ($edit->location == 'Lebanon') {
                                            echo 'selected="selected"';
                                        } ?> value="Lebanon">Lebanon
                                        </option>
                                        <option <?php if ($edit->location == 'Lesotho') {
                                            echo 'selected="selected"';
                                        } ?> value="Lesotho">Lesotho
                                        </option>
                                        <option <?php if ($edit->location == 'Liberia') {
                                            echo 'selected="selected"';
                                        } ?> value="Liberia">Liberia
                                        </option>
                                        <option <?php if ($edit->location == 'Libya') {
                                            echo 'selected="selected"';
                                        } ?> value="Libya">Libya
                                        </option>
                                        <option <?php if ($edit->location == 'Liechtenstein') {
                                            echo 'selected="selected"';
                                        } ?> value="Liechtenstein">Liechtenstein
                                        </option>
                                        <option <?php if ($edit->location == 'Lithuania') {
                                            echo 'selected="selected"';
                                        } ?> value="Lithuania">Lithuania
                                        </option>
                                        <option <?php if ($edit->location == 'Luxembourg') {
                                            echo 'selected="selected"';
                                        } ?> value="Luxembourg">Luxembourg
                                        </option>
                                        <option <?php if ($edit->location == 'Macao') {
                                            echo 'selected="selected"';
                                        } ?> value="Macao">Macao
                                        </option>
                                        <option <?php if ($edit->location == 'Macedonia, the former Yugoslav Republic of') {
                                            echo 'selected="selected"';
                                        } ?> value="Macedonia, the former Yugoslav Republic of">Macedonia, the former
                                            Yugoslav Republic of
                                        </option>
                                        <option <?php if ($edit->location == 'Madagascar') {
                                            echo 'selected="selected"';
                                        } ?> value="Madagascar">Madagascar
                                        </option>
                                        <option <?php if ($edit->location == 'Malawi') {
                                            echo 'selected="selected"';
                                        } ?> value="Malawi">Malawi
                                        </option>
                                        <option <?php if ($edit->location == 'Malaysia') {
                                            echo 'selected="selected"';
                                        } ?> value="Malaysia">Malaysia
                                        </option>
                                        <option <?php if ($edit->location == 'Maldives') {
                                            echo 'selected="selected"';
                                        } ?> value="Maldives">Maldives
                                        </option>
                                        <option <?php if ($edit->location == 'Mali') {
                                            echo 'selected="selected"';
                                        } ?> value="Mali">Mali
                                        </option>
                                        <option <?php if ($edit->location == 'Malta') {
                                            echo 'selected="selected"';
                                        } ?> value="Malta">Malta
                                        </option>
                                        <option <?php if ($edit->location == 'Marshall Islands') {
                                            echo 'selected="selected"';
                                        } ?> value="Marshall Islands">Marshall Islands
                                        </option>
                                        <option <?php if ($edit->location == 'Martinique') {
                                            echo 'selected="selected"';
                                        } ?> value="Martinique">Martinique
                                        </option>
                                        <option <?php if ($edit->location == 'Mauritania') {
                                            echo 'selected="selected"';
                                        } ?> value="Mauritania">Mauritania
                                        </option>
                                        <option <?php if ($edit->location == 'Mauritius') {
                                            echo 'selected="selected"';
                                        } ?> value="Mauritius">Mauritius
                                        </option>
                                        <option <?php if ($edit->location == 'Mayotte') {
                                            echo 'selected="selected"';
                                        } ?> value="Mayotte">Mayotte
                                        </option>
                                        <option <?php if ($edit->location == 'Mexico') {
                                            echo 'selected="selected"';
                                        } ?> value="Mexico">Mexico
                                        </option>
                                        <option <?php if ($edit->location == 'Micronesia, Federated States of') {
                                            echo 'selected="selected"';
                                        } ?> value="Micronesia, Federated States of">Micronesia, Federated States of
                                        </option>
                                        <option <?php if ($edit->location == 'Moldova, Republic of') {
                                            echo 'selected="selected"';
                                        } ?> value="Moldova, Republic of">Moldova, Republic of
                                        </option>
                                        <option <?php if ($edit->location == 'Monaco') {
                                            echo 'selected="selected"';
                                        } ?> value="Monaco">Monaco
                                        </option>
                                        <option <?php if ($edit->location == 'Mongolia') {
                                            echo 'selected="selected"';
                                        } ?> value="Mongolia">Mongolia
                                        </option>
                                        <option <?php if ($edit->location == 'Montenegro') {
                                            echo 'selected="selected"';
                                        } ?> value="Montenegro">Montenegro
                                        </option>
                                        <option <?php if ($edit->location == 'Montserrat') {
                                            echo 'selected="selected"';
                                        } ?> value="Montserrat">Montserrat
                                        </option>
                                        <option <?php if ($edit->location == 'Morocco') {
                                            echo 'selected="selected"';
                                        } ?> value="Morocco">Morocco
                                        </option>
                                        <option <?php if ($edit->location == 'Mozambique') {
                                            echo 'selected="selected"';
                                        } ?> value="Mozambique">Mozambique
                                        </option>
                                        <option <?php if ($edit->location == 'Myanmar') {
                                            echo 'selected="selected"';
                                        } ?> value="Myanmar">Myanmar
                                        </option>
                                        <option <?php if ($edit->location == 'Namibia') {
                                            echo 'selected="selected"';
                                        } ?> value="Namibia">Namibia
                                        </option>
                                        <option <?php if ($edit->location == 'Nauru') {
                                            echo 'selected="selected"';
                                        } ?> value="Nauru">Nauru
                                        </option>
                                        <option <?php if ($edit->location == 'Nepal') {
                                            echo 'selected="selected"';
                                        } ?> value="Nepal">Nepal
                                        </option>
                                        <option <?php if ($edit->location == 'Netherlands') {
                                            echo 'selected="selected"';
                                        } ?> value="Netherlands">Netherlands
                                        </option>
                                        <option <?php if ($edit->location == 'New Caledonia') {
                                            echo 'selected="selected"';
                                        } ?> value="New Caledonia">New Caledonia
                                        </option>
                                        <option <?php if ($edit->location == 'New Zealand') {
                                            echo 'selected="selected"';
                                        } ?> value="New Zealand">New Zealand
                                        </option>
                                        <option <?php if ($edit->location == 'Nicaragua') {
                                            echo 'selected="selected"';
                                        } ?> value="Nicaragua">Nicaragua
                                        </option>
                                        <option <?php if ($edit->location == 'Niger') {
                                            echo 'selected="selected"';
                                        } ?> value="Niger">Niger
                                        </option>
                                        <option <?php if ($edit->location == 'Nigeria') {
                                            echo 'selected="selected"';
                                        } ?>  value="Nigeria">Nigeria
                                        </option>
                                        <option <?php if ($edit->location == 'Niue') {
                                            echo 'selected="selected"';
                                        } ?>  value="Niue">Niue
                                        </option>
                                        <option <?php if ($edit->location == 'Norfolk Island') {
                                            echo 'selected="selected"';
                                        } ?>  value="Norfolk Island">Norfolk Island
                                        </option>
                                        <option <?php if ($edit->location == 'Northern Mariana Islands') {
                                            echo 'selected="selected"';
                                        } ?>  value="Northern Mariana Islands">Northern Mariana Islands
                                        </option>
                                        <option <?php if ($edit->location == 'Norway') {
                                            echo 'selected="selected"';
                                        } ?>  value="Norway">Norway
                                        </option>
                                        <option <?php if ($edit->location == 'Oman') {
                                            echo 'selected="selected"';
                                        } ?>  value="Oman">Oman
                                        </option>
                                        <option <?php if ($edit->location == 'Pakistan') {
                                            echo 'selected="selected"';
                                        } ?>  value="Pakistan">Pakistan
                                        </option>
                                        <option <?php if ($edit->location == 'Palau') {
                                            echo 'selected="selected"';
                                        } ?>  value="Palau">Palau
                                        </option>
                                        <option <?php if ($edit->location == 'Palestinian Territory, Occupied') {
                                            echo 'selected="selected"';
                                        } ?>  value="Palestinian Territory, Occupied">Palestinian Territory, Occupied
                                        </option>
                                        <option <?php if ($edit->location == 'Panama') {
                                            echo 'selected="selected"';
                                        } ?>  value="Panama">Panama
                                        </option>
                                        <option <?php if ($edit->location == 'Papua New Guinea') {
                                            echo 'selected="selected"';
                                        } ?>  value="Papua New Guinea">Papua New Guinea
                                        </option>
                                        <option <?php if ($edit->location == 'Paraguay') {
                                            echo 'selected="selected"';
                                        } ?>  value="Paraguay">Paraguay
                                        </option>
                                        <option <?php if ($edit->location == 'Peru') {
                                            echo 'selected="selected"';
                                        } ?>  value="Peru">Peru
                                        </option>
                                        <option <?php if ($edit->location == 'Philippines') {
                                            echo 'selected="selected"';
                                        } ?>  value="Philippines">Philippines
                                        </option>
                                        <option <?php if ($edit->location == 'Pitcairn') {
                                            echo 'selected="selected"';
                                        } ?>  value="Pitcairn">Pitcairn
                                        </option>
                                        <option <?php if ($edit->location == 'Poland') {
                                            echo 'selected="selected"';
                                        } ?>  value="Poland">Poland
                                        </option>
                                        <option <?php if ($edit->location == 'Portugal') {
                                            echo 'selected="selected"';
                                        } ?>  value="Portugal">Portugal
                                        </option>
                                        <option <?php if ($edit->location == 'Puerto Rico') {
                                            echo 'selected="selected"';
                                        } ?>  value="Puerto Rico">Puerto Rico
                                        </option>
                                        <option <?php if ($edit->location == 'Qatar') {
                                            echo 'selected="selected"';
                                        } ?>  value="Qatar">Qatar
                                        </option>
                                        <option <?php if ($edit->location == 'Réunion') {
                                            echo 'selected="selected"';
                                        } ?>  value="Réunion">Réunion
                                        </option>
                                        <option <?php if ($edit->location == 'Romania') {
                                            echo 'selected="selected"';
                                        } ?>  value="Romania">Romania
                                        </option>
                                        <option <?php if ($edit->location == 'Russian Federation') {
                                            echo 'selected="selected"';
                                        } ?>  value="Russian Federation">Russian Federation
                                        </option>
                                        <option <?php if ($edit->location == 'Rwanda') {
                                            echo 'selected="selected"';
                                        } ?>  value="Rwanda">Rwanda
                                        </option>
                                        <option <?php if ($edit->location == 'Saint Barthélemy') {
                                            echo 'selected="selected"';
                                        } ?>  value="Saint Barthélemy">Saint Barthélemy
                                        </option>
                                        <option <?php if ($edit->location == 'Saint Helena, Ascension and Tristan da Cunha') {
                                            echo 'selected="selected"';
                                        } ?>  value="Saint Helena, Ascension and Tristan da Cunha">Saint Helena,
                                            Ascension and Tristan da Cunha
                                        </option>
                                        <option <?php if ($edit->location == 'Saint Kitts and Nevis') {
                                            echo 'selected="selected"';
                                        } ?>  value="Saint Kitts and Nevis">Saint Kitts and Nevis
                                        </option>
                                        <option <?php if ($edit->location == 'Saint Lucia') {
                                            echo 'selected="selected"';
                                        } ?>  value="Saint Lucia">Saint Lucia
                                        </option>
                                        <option <?php if ($edit->location == 'Saint Martin (French part)') {
                                            echo 'selected="selected"';
                                        } ?>  value="Saint Martin (French part)">Saint Martin (French part)
                                        </option>
                                        <option <?php if ($edit->location == 'Saint Pierre and Miquelon') {
                                            echo 'selected="selected"';
                                        } ?>  value="Saint Pierre and Miquelon">Saint Pierre and Miquelon
                                        </option>
                                        <option <?php if ($edit->location == 'Saint Vincent and the Grenadines') {
                                            echo 'selected="selected"';
                                        } ?>  value="Saint Vincent and the Grenadines">Saint Vincent and the Grenadines
                                        </option>
                                        <option <?php if ($edit->location == 'Samoa') {
                                            echo 'selected="selected"';
                                        } ?>  value="Samoa">Samoa
                                        </option>
                                        <option <?php if ($edit->location == 'San Marino') {
                                            echo 'selected="selected"';
                                        } ?>  value="San Marino">San Marino
                                        </option>
                                        <option <?php if ($edit->location == 'Sao Tome and Principe') {
                                            echo 'selected="selected"';
                                        } ?>  value="Sao Tome and Principe">Sao Tome and Principe
                                        </option>
                                        <option <?php if ($edit->location == 'Saudi Arabia') {
                                            echo 'selected="selected"';
                                        } ?>  value="Saudi Arabia">Saudi Arabia
                                        </option>
                                        <option <?php if ($edit->location == 'Senegal') {
                                            echo 'selected="selected"';
                                        } ?>  value="Senegal">Senegal
                                        </option>
                                        <option <?php if ($edit->location == 'Serbia') {
                                            echo 'selected="selected"';
                                        } ?>  value="Serbia">Serbia
                                        </option>
                                        <option <?php if ($edit->location == 'Seychelles') {
                                            echo 'selected="selected"';
                                        } ?>  value="Seychelles">Seychelles
                                        </option>
                                        <option <?php if ($edit->location == 'Sierra Leone') {
                                            echo 'selected="selected"';
                                        } ?>  value="Sierra Leone">Sierra Leone
                                        </option>
                                        <option <?php if ($edit->location == 'Singapore') {
                                            echo 'selected="selected"';
                                        } ?>  value="Singapore">Singapore
                                        </option>
                                        <option <?php if ($edit->location == 'Sint Maarten (Dutch part)') {
                                            echo 'selected="selected"';
                                        } ?>  value="Sint Maarten (Dutch part)">Sint Maarten (Dutch part)
                                        </option>
                                        <option <?php if ($edit->location == 'Slovakia') {
                                            echo 'selected="selected"';
                                        } ?>  value="Slovakia">Slovakia
                                        </option>
                                        <option <?php if ($edit->location == 'Slovenia') {
                                            echo 'selected="selected"';
                                        } ?>  value="Slovenia">Slovenia
                                        </option>
                                        <option <?php if ($edit->location == 'Solomon Islands') {
                                            echo 'selected="selected"';
                                        } ?>  value="Solomon Islands">Solomon Islands
                                        </option>
                                        <option <?php if ($edit->location == 'Somalia') {
                                            echo 'selected="selected"';
                                        } ?>  value="Somalia">Somalia
                                        </option>
                                        <option <?php if ($edit->location == 'South Africa') {
                                            echo 'selected="selected"';
                                        } ?>  value="South Africa">South Africa
                                        </option>
                                        <option <?php if ($edit->location == 'South Georgia and the South Sandwich Islands') {
                                            echo 'selected="selected"';
                                        } ?>  value="South Georgia and the South Sandwich Islands">South Georgia and the
                                            South Sandwich Islands
                                        </option>
                                        <option <?php if ($edit->location == 'South Sudan') {
                                            echo 'selected="selected"';
                                        } ?>  value="South Sudan">South Sudan
                                        </option>
                                        <option <?php if ($edit->location == 'Spain') {
                                            echo 'selected="selected"';
                                        } ?>  value="Spain">Spain
                                        </option>
                                        <option <?php if ($edit->location == 'Sri Lanka') {
                                            echo 'selected="selected"';
                                        } ?>  value="Sri Lanka">Sri Lanka
                                        </option>
                                        <option <?php if ($edit->location == 'Sudan') {
                                            echo 'selected="selected"';
                                        } ?>  value="Sudan">Sudan
                                        </option>
                                        <option <?php if ($edit->location == 'Suriname') {
                                            echo 'selected="selected"';
                                        } ?>  value="Suriname">Suriname
                                        </option>
                                        <option <?php if ($edit->location == 'Svalbard and Jan Mayen') {
                                            echo 'selected="selected"';
                                        } ?>  value="Svalbard and Jan Mayen">Svalbard and Jan Mayen
                                        </option>
                                        <option <?php if ($edit->location == 'Swaziland') {
                                            echo 'selected="selected"';
                                        } ?>  value="Swaziland">Swaziland
                                        </option>
                                        <option <?php if ($edit->location == 'Sweden') {
                                            echo 'selected="selected"';
                                        } ?>  value="Sweden">Sweden
                                        </option>
                                        <option <?php if ($edit->location == 'Switzerland') {
                                            echo 'selected="selected"';
                                        } ?>  value="Switzerland">Switzerland
                                        </option>
                                        <option <?php if ($edit->location == 'Syrian Arab Republic') {
                                            echo 'selected="selected"';
                                        } ?>  value="Syrian Arab Republic">Syrian Arab Republic
                                        </option>
                                        <option <?php if ($edit->location == 'Taiwan, Province of China') {
                                            echo 'selected="selected"';
                                        } ?>  value="Taiwan, Province of China">Taiwan, Province of China
                                        </option>
                                        <option <?php if ($edit->location == 'Tajikistan') {
                                            echo 'selected="selected"';
                                        } ?>  value="Tajikistan">Tajikistan
                                        </option>
                                        <option <?php if ($edit->location == 'Tanzania') {
                                            echo 'selected="selected"';
                                        } ?>  value="Tanzania, United Republic of">Tanzania, United Republic of
                                        </option>
                                        <option <?php if ($edit->location == 'Thailand') {
                                            echo 'selected="selected"';
                                        } ?>  value="Thailand">Thailand
                                        </option>
                                        <option <?php if ($edit->location == 'Timor-Leste') {
                                            echo 'selected="selected"';
                                        } ?>   value="Timor-Leste">Timor-Leste
                                        </option>
                                        <option <?php if ($edit->location == 'Togo') {
                                            echo 'selected="selected"';
                                        } ?>  value="Togo">Togo
                                        </option>
                                        <option <?php if ($edit->location == 'Tokelau') {
                                            echo 'selected="selected"';
                                        } ?> value="Tokelau">Tokelau
                                        </option>
                                        <option <?php if ($edit->location == 'Tonga') {
                                            echo 'selected="selected"';
                                        } ?> value="Tonga">Tonga
                                        </option>
                                        <option <?php if ($edit->location == 'Trinidad and Tobago') {
                                            echo 'selected="selected"';
                                        } ?> value="Trinidad and Tobago">Trinidad and Tobago
                                        </option>
                                        <option <?php if ($edit->location == 'Tunisia') {
                                            echo 'selected="selected"';
                                        } ?> value="Tunisia">Tunisia
                                        </option>
                                        <option <?php if ($edit->location == 'Turkey') {
                                            echo 'selected="selected"';
                                        } ?> value="Turkey">Turkey
                                        </option>
                                        <option <?php if ($edit->location == 'Turkmenistan') {
                                            echo 'selected="selected"';
                                        } ?> value="Turkmenistan">Turkmenistan
                                        </option>
                                        <option <?php if ($edit->location == 'Turks and Caicos Islands') {
                                            echo 'selected="selected"';
                                        } ?> value="Turks and Caicos Islands">Turks and Caicos Islands
                                        </option>
                                        <option <?php if ($edit->location == 'Tuvalu') {
                                            echo 'selected="selected"';
                                        } ?> value="Tuvalu">Tuvalu
                                        </option>
                                        <option <?php if ($edit->location == 'Uganda') {
                                            echo 'selected="selected"';
                                        } ?> value="Uganda">Uganda
                                        </option>
                                        <option <?php if ($edit->location == 'Ukraine') {
                                            echo 'selected="selected"';
                                        } ?> value="Ukraine">Ukraine
                                        </option>
                                        <option <?php if ($edit->location == 'United Arab Emirates') {
                                            echo 'selected="selected"';
                                        } ?> value="United Arab Emirates">United Arab Emirates
                                        </option>
                                        <option <?php if ($edit->location == 'United Kingdom') {
                                            echo 'selected="selected"';
                                        } ?> value="United Kingdom">United Kingdom
                                        </option>
                                        <option <?php if ($edit->location == 'United States') {
                                            echo 'selected="selected"';
                                        } ?> value="United States">United States
                                        </option>
                                        <option <?php if ($edit->location == 'United States Minor Outlying Islands') {
                                            echo 'selected="selected"';
                                        } ?> value="United States Minor Outlying Islands">United States Minor Outlying
                                            Islands
                                        </option>
                                        <option <?php if ($edit->location == 'Uruguay') {
                                            echo 'selected="selected"';
                                        } ?> value="Uruguay">Uruguay
                                        </option>
                                        <option <?php if ($edit->location == 'Uzbekistan') {
                                            echo 'selected="selected"';
                                        } ?> value="Uzbekistan">Uzbekistan
                                        </option>
                                        <option <?php if ($edit->location == 'Vanuatu') {
                                            echo 'selected="selected"';
                                        } ?> value="Vanuatu">Vanuatu
                                        </option>
                                        <option <?php if ($edit->location == 'Venezuela, Bolivarian Republic of') {
                                            echo 'selected="selected"';
                                        } ?> value="Venezuela, Bolivarian Republic of">Venezuela, Bolivarian Republic of
                                        </option>
                                        <option <?php if ($edit->location == 'Viet Nam') {
                                            echo 'selected="selected"';
                                        } ?> value="Viet Nam">Viet Nam
                                        </option>
                                        <option <?php if ($edit->location == 'Virgin Islands, British') {
                                            echo 'selected="selected"';
                                        } ?> value="Virgin Islands, British">Virgin Islands, British
                                        </option>
                                        <option <?php if ($edit->location == 'Virgin Islands, U.S.') {
                                            echo 'selected="selected"';
                                        } ?> value="Virgin Islands, U.S.">Virgin Islands, U.S.
                                        </option>
                                        <option <?php if ($edit->location == 'Wallis and Futuna') {
                                            echo 'selected="selected"';
                                        } ?> value="Wallis and Futuna">Wallis and Futuna
                                        </option>
                                        <option <?php if ($edit->location == 'Western Sahara') {
                                            echo 'selected="selected"';
                                        } ?> value="Western Sahara">Western Sahara
                                        </option>
                                        <option <?php if ($edit->location == 'Yemen') {
                                            echo 'selected="selected"';
                                        } ?> value="Yemen">Yemen
                                        </option>
                                        <option <?php if ($edit->location == 'Zambia') {
                                            echo 'selected="selected"';
                                        } ?> value="Zambia">Zambia
                                        </option>
                                        <option <?php if ($edit->location == 'Zimbabwe') {
                                            echo 'selected="selected"';
                                        } ?> value="Zimbabwe">Zimbabwe
                                        </option>
                                    </select>

                                </div>


                                <div class="form-group">
                                    {{ Form:: label ('sex', 'Gender' )}}


                                    <input type="text" value="{{$edit->sex}}" name="sex" class="form-control"/>

                                </div>


                                <div class="form-group">
                                    {{ Form:: label ('height', 'Height' )}}

                                    <select name="length">
                                        <option disabled="disabled" value="NULL">--select your height--</option>
                                        <option value="NULL">
                                        </option>
                                        <option <?php if ($edit->height == 120) {
                                            echo 'selected="selected"';
                                        } ?> value="120">
                                            &lt;130cm
                                        </option>
                                        <option <?php if ($edit->height == 130) {
                                            echo 'selected="selected"';
                                        } ?> value="130">130-140cm
                                        </option>
                                        <option <?php if ($edit->height == 140) {
                                            echo 'selected="selected"';
                                        } ?> value="140">
                                            140-150cm
                                        </option>
                                        <option <?php if ($edit->height == 150) {
                                            echo 'selected="selected"';
                                        } ?> value="150">
                                            150-160cm
                                        </option>
                                        <option <?php if ($edit->height == 160) {
                                            echo 'selected="selected"';
                                        } ?> value="160">
                                            160-170cm
                                        </option>
                                        <option <?php if ($edit->height == 170) {
                                            echo 'selected="selected"';
                                        } ?> value="170">
                                            170-180cm
                                        </option>
                                        <option <?php if ($edit->height == 180) {
                                            echo 'selected="selected"';
                                        } ?> value="180">
                                            180-190cm
                                        </option>
                                        <option <?php if ($edit->height == 190) {
                                            echo 'selected="selected"';
                                        } ?> value="190">
                                            190-200cm
                                        </option>
                                        <option <?php if ($edit->height == 200) {
                                            echo 'selected="selected"';
                                        } ?>value="200">
                                            200-210cm
                                        </option>
                                        <option <?php if ($edit->height == 210) {
                                            echo 'selected="selected"';
                                        } ?> value="210">
                                            210-220cm
                                        </option>
                                        <option <?php if ($edit->height == 220) {
                                            echo 'selected="selected"';
                                        } ?> value="220">
                                            220-230cm
                                        </option>
                                        <option <?php if ($edit->height == 230) {
                                            echo 'selected="selected"';
                                        } ?> value="230">
                                            &gt;230cm
                                        </option>
                                    </select>


                                </div>


                                <div class="form-group">
                                    {{ Form:: label ('haircolor', 'Hair Color' )}}

                                    <select name="hairColor">
                                        <option value="NULL"></option>
                                        <option <?php if ($edit->haircolor == 1) {
                                            echo 'selected="selected"';
                                        } ?> value="1">
                                            Black
                                        </option>
                                        <option <?php if ($edit->haircolor == 2) {
                                            echo 'selected="selected"';
                                        } ?> value="2">
                                            Blond
                                        </option>
                                        <option <?php if ($edit->haircolor == 3) {
                                            echo 'selected="selected"';
                                        } ?> value="3">
                                            Brown
                                        </option>
                                        <option <?php if ($edit->haircolor == 4) {
                                            echo 'selected="selected"';
                                        } ?> value="4">
                                            Red
                                        </option>
                                        <option <?php if ($edit->haircolor == 5) {
                                            echo 'selected="selected"';
                                        } ?> value="5">
                                            Grey
                                        </option>
                                        <option <?php if ($edit->haircolor == 6) {
                                            echo 'selected="selected"';
                                        } ?> value="6">
                                            White
                                        </option>
                                        <option <?php if ($edit->haircolor == 7) {
                                            echo 'selected="selected"';
                                        } ?> value="7">
                                            Bald
                                        </option>
                                        <option <?php if ($edit->haircolor == 8) {
                                            echo 'selected="selected"';
                                        } ?> value="8">
                                            Dyed
                                        </option>
                                        <option <?php if ($edit->haircolor == 9) {
                                            echo 'selected="selected"';
                                        } ?> value="9">
                                            Other
                                        </option>
                                        <option <?php if ($edit->haircolor == 10) {
                                            echo 'selected="selected"';
                                        } ?> value="10">
                                            Flavour of the month
                                        </option>
                                    </select>


                                </div>


                                <div class="form-group">
                                    {{ Form:: label ('haircolor', 'Eye Color' )}}

                                    <select name="eyeColor">
                                        <option value="NULL"></option>
                                        <option <?php if ($edit->eyecolor == 1) {
                                            echo 'selected="selected"';
                                        } ?> value="1">
                                            Brown
                                        </option>
                                        <option <?php if ($edit->eyecolor == 2) {
                                            echo 'selected="selected"';
                                        } ?>  value="2">
                                            Grey
                                        </option>
                                        <option <?php if ($edit->eyecolor == 3) {
                                            echo 'selected="selected"';
                                        } ?>  value="3">
                                            Green
                                        </option>
                                        <option <?php if ($edit->eyecolor == 4) {
                                            echo 'selected="selected"';
                                        } ?>  value="4">
                                            Blue
                                        </option>
                                        <option <?php if ($edit->eyecolor == 5) {
                                            echo 'selected="selected"';
                                        } ?>  value="5">
                                            Hazel
                                        </option>
                                        <option <?php if ($edit->eyecolor == 6) {
                                            echo 'selected="selected"';
                                        } ?>  value="6">
                                            Other
                                        </option>
                                    </select>


                                </div>


                                <div class="form-group">
                                    {{ Form:: label ('bodytype', 'Body Type' )}}

                                    <select name="silhouette">
                                        <option value="NULL"></option>
                                        <option <?php if ($edit->bodytype == 1) {
                                            echo 'selected="selected"';
                                        } ?>value="1">
                                            Slim
                                        </option>
                                        <option <?php if ($edit->bodytype == 2) {
                                            echo 'selected="selected"';
                                        } ?> value="2">
                                            Sporty
                                        </option>
                                        <option <?php if ($edit->bodytype == 3) {
                                            echo 'selected="selected"';
                                        } ?> value="3">
                                            Curvy
                                        </option>
                                        <option <?php if ($edit->bodytype == 4) {
                                            echo 'selected="selected"';
                                        } ?> value="4">
                                            Round
                                        </option>
                                        <option <?php if ($edit->bodytype == 5) {
                                            echo 'selected="selected"';
                                        } ?> value="5">
                                            Supermodel
                                        </option>
                                        <option <?php if ($edit->bodytype == 6) {
                                            echo 'selected="selected"';
                                        } ?> value="6">
                                            Olympic athlete
                                        </option>
                                        <option <?php if ($edit->bodytype == 7) {
                                            echo 'selected="selected"';
                                        } ?> value="7">
                                            Lots of me to love
                                        </option>
                                        <option <?php if ($edit->bodytype == 8) {
                                            echo 'selected="selected"';
                                        } ?> value="8">
                                            I'll tell you later
                                        </option>
                                        <option <?php if ($edit->bodytype == 9) {
                                            echo 'selected="selected"';
                                        } ?> value="9">
                                            I'll let you see for yourself
                                        </option>
                                    </select>


                                </div>


                                <div class="form-group">
                                    <?php
                                    if($pick->removemember == 'on')
                                    { ?>

                                    <label>  {{ Form:: label ('memberplan', 'Membership plan*' )}}  </label>
                                    <select name="member">

                                        @foreach( $member as $hello)

                                            <option <?php if ($hello->name == $edit->plan) {
                                                echo 'selected="selected"';
                                            } ?>value="{{$hello->name}}">{{$hello->name}}</option>

                                        @endforeach


                                    </select>


                                    <?php
                                    }
                                    ?>

                                </div>


                                <div class="form-group">


                                    {{ Form::submit('Update', array('class' => 'register_btn')) }}
                                </div>


                            </form>


                        </div>
                        {{ Form:: close() }}<br/>

                    </div>


                </div>

            </div>
        </div>
        <!-- /.row -->
    </div>
    <!-- /.container-fluid -->


























@endsection
