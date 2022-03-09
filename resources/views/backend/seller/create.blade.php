@extends('backend.layouts.master')

@section('content')


<div id="main-content">
    <div class="container-fluid">
        <div class="block-header">
            <div class="row">
                <div class="col-lg-6 col-md-8 col-sm-12">
                    <h2><a href="javascript:void(0);" class="btn btn-xs btn-link btn-toggle-fullwidth"><i
                                class="fa fa-arrow-left"></i></a> Add Seller</h2>
                    <ul class="breadcrumb">
                        <li class="breadcrumb-item"><a href="{{route('admin')}}"><i class="icon-home"></i></a></li>
                        <li class="breadcrumb-item">Sellers</li>
                        <li class="breadcrumb-item active">Add Seller</li>
                    </ul>
                </div>
            </div>
        </div>

        <!-- Color Pickers -->
        <div class="clearfix row">
            <div class="col-md-12">
                @if ($errors->any())
                    <div class="alert alert-danger">
                        <ul>
                            @foreach ($errors->all() as $error)
                                <li>{{$error}}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif
            </div>

            <div class="col-lg-12 col-md-12 col-sm-12">
                <div class="card">
                    <div class="body">
                        <form action="{{route('seller.store')}}" method="post">
                            @csrf
                            <div class="clearfix row">
                                <div class="row col-lg-12 col-md-12">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="">Full Name <span class="text-danger">*</span></label>
                                            <input type="text" class="form-control" placeholder="Full Name" name="full_name"
                                                value="{{old('full_name')}}">
                                        </div>
                                    </div>

                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="">Username <span class="text-danger">*</span></label>
                                            <input type="text" class="form-control" placeholder="Username" name="username"
                                                value="{{old('username')}}">
                                        </div>
                                    </div>
                                </div>

                                <div class="row col-lg-12 col-md-12">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="">Email <span class="text-danger">*</span></label>
                                            <input type="email" class="form-control" placeholder="Email" name="email"
                                                value="{{old('email')}}">
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="">Password <span class="text-danger">*</span></label>
                                            <input type="password" class="form-control" placeholder="Password" name="password"
                                                value="{{old('password')}}">
                                        </div>
                                    </div>
                                </div>

                                <div class="row col-lg-12 col-md-12">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="">Address</label>
                                            <input type="text" class="form-control" placeholder="Address" name="address"
                                                value="{{old('address')}}">
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="">Date of Birth <span class="text-danger">*</span></label>
                                            <input type="date" class="form-control" placeholder="13/05/1993" name="date_of_birth"
                                                value="{{old('date_of_birth')}}">
                                        </div>
                                    </div>
                                </div>

                                <div class="col-lg-12 col-md-12">
                                    <div class="form-group">
                                        <label for="">Photo </label>
                                        <div class="input-group">
                                            <span class="input-group-btn">
                                                <a id="lfm" data-input="thumbnail" data-preview="holder"
                                                    class="btn btn-primary">
                                                    <i class="fa fa-picture-o"></i>Choose
                                                </a>
                                            </span>
                                            <input id="thumbnail" class="form-control" type="text" name="photo">
                                        </div>
                                        <div id="holder" style="margin-top:15px; max-height:100px;"></div>
                                    </div>
                                </div>

                                <div class="row col-lg-12 col-md-12">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="">Phone</label>
                                            <input type="number" class="form-control" placeholder="221 772050626" name="phone"
                                                value="{{old('phone')}}">
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="">City </label>
                                            <input type="text" class="form-control" placeholder="City" name="city"
                                                value="{{old('city')}}">
                                        </div>
                                    </div>
                                </div>

                                <div class="row col-lg-12 col-md-12">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="">State</label>
                                            <input type="text" class="form-control" placeholder="State" name="state"
                                                value="{{old('state')}}">
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="">Country</label>
                                            <select class="form-control" name="country">
                                                <option value="">-- Select Country --</option>
                                                <option value="AF" {{old('country')=='AF' ? 'selected' : '' }}>Afghanistan</option>
                                                <option value="AX" {{old('country')=='AX' ? 'selected' : '' }}>Åland Islands</option>
                                                <option value="AL" {{old('country')=='AL' ? 'selected' : '' }}>Albania</option>
                                                <option value="DZ" {{old('country')=='ZD' ? 'selected' : '' }}>Algeria</option>
                                                <option value="AS" {{old('country')=='AS' ? 'selected' : '' }}>American Samoa</option>
                                                <option value="AD" {{old('country')=='AD' ? 'selected' : '' }}>Andorra</option>
                                                <option value="AO" {{old('country')=='AO' ? 'selected' : '' }}>Angola</option>
                                                <option value="AI" {{old('country')=='AI' ? 'selected' : '' }}>Anguilla</option>
                                                <option value="AQ" {{old('country')=='AQ' ? 'selected' : '' }}>Antarctica</option>
                                                <option value="AG" {{old('country')=='AG' ? 'selected' : '' }}>Antigua and Barbuda</option>
                                                <option value="AR" {{old('country')=='AR' ? 'selected' : '' }}>Argentina</option>
                                                <option value="AM" {{old('country')=='AM' ? 'selected' : '' }}>Armenia</option>
                                                <option value="AW" {{old('country')=='AW' ? 'selected' : '' }}>Aruba</option>
                                                <option value="AU" {{old('country')=='AU' ? 'selected' : '' }}>Australia</option>
                                                <option value="AT" {{old('country')=='AT' ? 'selected' : '' }}>Austria</option>
                                                <option value="AZ" {{old('country')=='AZ' ? 'selected' : '' }}>Azerbaijan</option>
                                                <option value="BS" {{old('country')=='BS' ? 'selected' : '' }}>Bahamas</option>
                                                <option value="BH" {{old('country')=='BH' ? 'selected' : '' }}>Bahrain</option>
                                                <option value="BD" {{old('country')=='BD' ? 'selected' : '' }}>Bangladesh</option>
                                                <option value="BB" {{old('country')=='BB' ? 'selected' : '' }}>Barbados</option>
                                                <option value="BY" {{old('country')=='BY' ? 'selected' : '' }}>Belarus</option>
                                                <option value="BE" {{old('country')=='BE' ? 'selected' : '' }}>Belgium</option>
                                                <option value="BZ" {{old('country')=='BZ' ? 'selected' : '' }}>Belize</option>
                                                <option value="BJ" {{old('country')=='BJ' ? 'selected' : '' }}>Benin</option>
                                                <option value="BM" {{old('country')=='BM' ? 'selected' : '' }}>Bermuda</option>
                                                <option value="BT" {{old('country')=='BT' ? 'selected' : '' }}>Bhutan</option>
                                                <option value="BO" {{old('country')=='BO' ? 'selected' : '' }}>Bolivia, Plurinational State of</option>
                                                <option value="BQ" {{old('country')=='BQ' ? 'selected' : '' }}>Bonaire, Sint Eustatius and Saba</option>
                                                <option value="BA" {{old('country')=='BA' ? 'selected' : '' }}>Bosnia and Herzegovina</option>
                                                <option value="BW" {{old('country')=='BW' ? 'selected' : '' }}>Botswana</option>
                                                <option value="BV" {{old('country')=='BV' ? 'selected' : '' }}>Bouvet Island</option>
                                                <option value="BR" {{old('country')=='BR' ? 'selected' : '' }}>Brazil</option>
                                                <option value="IO" {{old('country')=='IO' ? 'selected' : '' }}>British Indian Ocean Territory</option>
                                                <option value="BN" {{old('country')=='BN' ? 'selected' : '' }}>Brunei Darussalam</option>
                                                <option value="BG" {{old('country')=='BG' ? 'selected' : '' }}>Bulgaria</option>
                                                <option value="BF" {{old('country')=='BF' ? 'selected' : '' }}>Burkina Faso</option>
                                                <option value="BI" {{old('country')=='BI' ? 'selected' : '' }}>Burundi</option>
                                                <option value="KH" {{old('country')=='KH' ? 'selected' : '' }}>Cambodia</option>
                                                <option value="CM" {{old('country')=='CM' ? 'selected' : '' }}>Cameroon</option>
                                                <option value="CA" {{old('country')=='CA' ? 'selected' : '' }}>Canada</option>
                                                <option value="CV" {{old('country')=='CV' ? 'selected' : '' }}>Cape Verde</option>
                                                <option value="KY" {{old('country')=='KY' ? 'selected' : '' }}>Cayman Islands</option>
                                                <option value="CF" {{old('country')=='CF' ? 'selected' : '' }}>Central African Republic</option>
                                                <option value="TD" {{old('country')=='TD' ? 'selected' : '' }}>Chad</option>
                                                <option value="CL" {{old('country')=='CL' ? 'selected' : '' }}>Chile</option>
                                                <option value="CN" {{old('country')=='CN' ? 'selected' : '' }}>China</option>
                                                <option value="CX" {{old('country')=='CX' ? 'selected' : '' }}>Christmas Island</option>
                                                <option value="CC" {{old('country')=='CC' ? 'selected' : '' }}>Cocos (Keeling) Islands</option>
                                                <option value="CO" {{old('country')=='CO' ? 'selected' : '' }}>Colombia</option>
                                                <option value="KM" {{old('country')=='KM' ? 'selected' : '' }}>Comoros</option>
                                                <option value="CG" {{old('country')=='CG' ? 'selected' : '' }}>Congo</option>
                                                <option value="CD" {{old('country')=='CD' ? 'selected' : '' }}>Congo, the Democratic Republic of the</option>
                                                <option value="CK" {{old('country')=='CK' ? 'selected' : '' }}>Cook Islands</option>
                                                <option value="CR" {{old('country')=='CR' ? 'selected' : '' }}>Costa Rica</option>
                                                <option value="CI" {{old('country')=='CI' ? 'selected' : '' }}>Côte d'Ivoire</option>
                                                <option value="HR" {{old('country')=='HR' ? 'selected' : '' }}>Croatia</option>
                                                <option value="CU" {{old('country')=='CU' ? 'selected' : '' }}>Cuba</option>
                                                <option value="CW" {{old('country')=='CW' ? 'selected' : '' }}>Curaçao</option>
                                                <option value="CY" {{old('country')=='CY' ? 'selected' : '' }}>Cyprus</option>
                                                <option value="CZ" {{old('country')=='CZ' ? 'selected' : '' }}>Czech Republic</option>
                                                <option value="DK" {{old('country')=='DK' ? 'selected' : '' }}>Denmark</option>
                                                <option value="DJ" {{old('country')=='DJ' ? 'selected' : '' }}>Djibouti</option>
                                                <option value="DM" {{old('country')=='DM' ? 'selected' : '' }}>Dominica</option>
                                                <option value="DO" {{old('country')=='DO' ? 'selected' : '' }}>Dominican Republic</option>
                                                <option value="EC" {{old('country')=='EC' ? 'selected' : '' }}>Ecuador</option>
                                                <option value="EG" {{old('country')=='EG' ? 'selected' : '' }}>Egypt</option>
                                                <option value="SV" {{old('country')=='SV' ? 'selected' : '' }}>El Salvador</option>
                                                <option value="GQ" {{old('country')=='GQ' ? 'selected' : '' }}>Equatorial Guinea</option>
                                                <option value="ER" {{old('country')=='ER' ? 'selected' : '' }}>Eritrea</option>
                                                <option value="EE" {{old('country')=='EE' ? 'selected' : '' }}>Estonia</option>
                                                <option value="ET" {{old('country')=='ET' ? 'selected' : '' }}>Ethiopia</option>
                                                <option value="FK" {{old('country')=='FK' ? 'selected' : '' }}>Falkland Islands (Malvinas)</option>
                                                <option value="FO" {{old('country')=='FO' ? 'selected' : '' }}>Faroe Islands</option>
                                                <option value="FJ" {{old('country')=='FJ' ? 'selected' : '' }}>Fiji</option>
                                                <option value="FI" {{old('country')=='FI' ? 'selected' : '' }}>Finland</option>
                                                <option value="FR" {{old('country')=='FR' ? 'selected' : '' }}>France</option>
                                                <option value="GF" {{old('country')=='GF' ? 'selected' : '' }}>French Guiana</option>
                                                <option value="PF" {{old('country')=='PF' ? 'selected' : '' }}>French Polynesia</option>
                                                <option value="TF" {{old('country')=='TF' ? 'selected' : '' }}>French Southern Territories</option>
                                                <option value="GA" {{old('country')=='GA' ? 'selected' : '' }}>Gabon</option>
                                                <option value="GM" {{old('country')=='GM' ? 'selected' : '' }}>Gambia</option>
                                                <option value="GE" {{old('country')=='GE' ? 'selected' : '' }}>Georgia</option>
                                                <option value="DE" {{old('country')=='DE' ? 'selected' : '' }}>Germany</option>
                                                <option value="GH" {{old('country')=='GH' ? 'selected' : '' }}>Ghana</option>
                                                <option value="GI" {{old('country')=='GI' ? 'selected' : '' }}>Gibraltar</option>
                                                <option value="GR" {{old('country')=='GR' ? 'selected' : '' }}>Greece</option>
                                                <option value="GL" {{old('country')=='GL' ? 'selected' : '' }}>Greenland</option>
                                                <option value="GD" {{old('country')=='GD' ? 'selected' : '' }}>Grenada</option>
                                                <option value="GP" {{old('country')=='GP' ? 'selected' : '' }}>Guadeloupe</option>
                                                <option value="GU" {{old('country')=='GU' ? 'selected' : '' }}>Guam</option>
                                                <option value="GT" {{old('country')=='GT' ? 'selected' : '' }}>Guatemala</option>
                                                <option value="GG" {{old('country')=='GG' ? 'selected' : '' }}>Guernsey</option>
                                                <option value="GN" {{old('country')=='GN' ? 'selected' : '' }}>Guinea</option>
                                                <option value="GW" {{old('country')=='GW' ? 'selected' : '' }}>Guinea-Bissau</option>
                                                <option value="GY" {{old('country')=='GY' ? 'selected' : '' }}>Guyana</option>
                                                <option value="HT" {{old('country')=='HT' ? 'selected' : '' }}>Haiti</option>
                                                <option value="HM" {{old('country')=='HM' ? 'selected' : '' }}>Heard Island and McDonald Islands</option>
                                                <option value="VA" {{old('country')=='VA' ? 'selected' : '' }}>Holy See (Vatican City State)</option>
                                                <option value="HN" {{old('country')=='HN' ? 'selected' : '' }}>Honduras</option>
                                                <option value="HK" {{old('country')=='HK' ? 'selected' : '' }}>Hong Kong</option>
                                                <option value="HU" {{old('country')=='HU' ? 'selected' : '' }}>Hungary</option>
                                                <option value="IS" {{old('country')=='IS' ? 'selected' : '' }}>Iceland</option>
                                                <option value="IN" {{old('country')=='IN' ? 'selected' : '' }}>India</option>
                                                <option value="ID" {{old('country')=='ID' ? 'selected' : '' }}>Indonesia</option>
                                                <option value="IR" {{old('country')=='IR' ? 'selected' : '' }}>Iran, Islamic Republic of</option>
                                                <option value="IQ" {{old('country')=='IQ' ? 'selected' : '' }}>Iraq</option>
                                                <option value="IE" {{old('country')=='IE' ? 'selected' : '' }}>Ireland</option>
                                                <option value="IM" {{old('country')=='IM' ? 'selected' : '' }}>Isle of Man</option>
                                                <option value="IL" {{old('country')=='IL' ? 'selected' : '' }}>Israel</option>
                                                <option value="IT" {{old('country')=='IT' ? 'selected' : '' }}>Italy</option>
                                                <option value="JM" {{old('country')=='JM' ? 'selected' : '' }}>Jamaica</option>
                                                <option value="JP" {{old('country')=='JP' ? 'selected' : '' }}>Japan</option>
                                                <option value="JE" {{old('country')=='JE' ? 'selected' : '' }}>Jersey</option>
                                                <option value="JO" {{old('country')=='JO' ? 'selected' : '' }}>Jordan</option>
                                                <option value="KZ" {{old('country')=='KZ' ? 'selected' : '' }}>Kazakhstan</option>
                                                <option value="KE" {{old('country')=='KE' ? 'selected' : '' }}>Kenya</option>
                                                <option value="KI" {{old('country')=='KI' ? 'selected' : '' }}>Kiribati</option>
                                                <option value="KP" {{old('country')=='KP' ? 'selected' : '' }}>Korea, Democratic People's Republic of</option>
                                                <option value="KR" {{old('country')=='KR' ? 'selected' : '' }}>Korea, Republic of</option>
                                                <option value="KW" {{old('country')=='KW' ? 'selected' : '' }}>Kuwait</option>
                                                <option value="KG" {{old('country')=='KG' ? 'selected' : '' }}>Kyrgyzstan</option>
                                                <option value="LA" {{old('country')=='LA' ? 'selected' : '' }}>Lao People's Democratic Republic</option>
                                                <option value="LV" {{old('country')=='LV' ? 'selected' : '' }}>Latvia</option>
                                                <option value="LB" {{old('country')=='LB' ? 'selected' : '' }}>Lebanon</option>
                                                <option value="LS" {{old('country')=='LS' ? 'selected' : '' }}>Lesotho</option>
                                                <option value="LR" {{old('country')=='LR' ? 'selected' : '' }}>Liberia</option>
                                                <option value="LY" {{old('country')=='LY' ? 'selected' : '' }}>Libya</option>
                                                <option value="LI" {{old('country')=='LI' ? 'selected' : '' }}>Liechtenstein</option>
                                                <option value="LT" {{old('country')=='LT' ? 'selected' : '' }}>Lithuania</option>
                                                <option value="LU" {{old('country')=='LU' ? 'selected' : '' }}>Luxembourg</option>
                                                <option value="MO" {{old('country')=='MO' ? 'selected' : '' }}>Macao</option>
                                                <option value="MK" {{old('country')=='MK' ? 'selected' : '' }}>Macedonia, the former Yugoslav Republic of</option>
                                                <option value="MG" {{old('country')=='MG' ? 'selected' : '' }}>Madagascar</option>
                                                <option value="MW" {{old('country')=='MW' ? 'selected' : '' }}>Malawi</option>
                                                <option value="MY" {{old('country')=='MY' ? 'selected' : '' }}>Malaysia</option>
                                                <option value="MV" {{old('country')=='MV' ? 'selected' : '' }}>Maldives</option>
                                                <option value="ML" {{old('country')=='ML' ? 'selected' : '' }}>Mali</option>
                                                <option value="MT" {{old('country')=='MT' ? 'selected' : '' }}>Malta</option>
                                                <option value="MH" {{old('country')=='MH' ? 'selected' : '' }}>Marshall Islands</option>
                                                <option value="MQ" {{old('country')=='MQ' ? 'selected' : '' }}>Martinique</option>
                                                <option value="MR" {{old('country')=='MR' ? 'selected' : '' }}>Mauritania</option>
                                                <option value="MU" {{old('country')=='MU' ? 'selected' : '' }}>Mauritius</option>
                                                <option value="YT" {{old('country')=='YT' ? 'selected' : '' }}>Mayotte</option>
                                                <option value="MX" {{old('country')=='MX' ? 'selected' : '' }}>Mexico</option>
                                                <option value="FM" {{old('country')=='FM' ? 'selected' : '' }}>Micronesia, Federated States of</option>
                                                <option value="MD" {{old('country')=='MD' ? 'selected' : '' }}>Moldova, Republic of</option>
                                                <option value="MC" {{old('country')=='MC' ? 'selected' : '' }}>Monaco</option>
                                                <option value="MN" {{old('country')=='MN' ? 'selected' : '' }}>Mongolia</option>
                                                <option value="ME" {{old('country')=='ME' ? 'selected' : '' }}>Montenegro</option>
                                                <option value="MS" {{old('country')=='MS' ? 'selected' : '' }}>Montserrat</option>
                                                <option value="MA" {{old('country')=='MA' ? 'selected' : '' }}>Morocco</option>
                                                <option value="MZ" {{old('country')=='MZ' ? 'selected' : '' }}>Mozambique</option>
                                                <option value="MM" {{old('country')=='MM' ? 'selected' : '' }}>Myanmar</option>
                                                <option value="NA" {{old('country')=='NA' ? 'selected' : '' }}>Namibia</option>
                                                <option value="NR" {{old('country')=='NR' ? 'selected' : '' }}>Nauru</option>
                                                <option value="NP" {{old('country')=='NP' ? 'selected' : '' }}>Nepal</option>
                                                <option value="NL" {{old('country')=='NL' ? 'selected' : '' }}>Netherlands</option>
                                                <option value="NC" {{old('country')=='NC' ? 'selected' : '' }}>New Caledonia</option>
                                                <option value="NZ" {{old('country')=='NZ' ? 'selected' : '' }}>New Zealand</option>
                                                <option value="NI" {{old('country')=='NI' ? 'selected' : '' }}>Nicaragua</option>
                                                <option value="NE" {{old('country')=='NE' ? 'selected' : '' }}>Niger</option>
                                                <option value="NG" {{old('country')=='NG' ? 'selected' : '' }}>Nigeria</option>
                                                <option value="NU" {{old('country')=='NU' ? 'selected' : '' }}>Niue</option>
                                                <option value="NF" {{old('country')=='NF' ? 'selected' : '' }}>Norfolk Island</option>
                                                <option value="MP" {{old('country')=='MP' ? 'selected' : '' }}>Northern Mariana Islands</option>
                                                <option value="NO" {{old('country')=='NO' ? 'selected' : '' }}>Norway</option>
                                                <option value="OM" {{old('country')=='OM' ? 'selected' : '' }}>Oman</option>
                                                <option value="PK" {{old('country')=='PK' ? 'selected' : '' }}>Pakistan</option>
                                                <option value="PW" {{old('country')=='PW' ? 'selected' : '' }}>Palau</option>
                                                <option value="PS" {{old('country')=='PS' ? 'selected' : '' }}>Palestinian Territory, Occupied</option>
                                                <option value="PA" {{old('country')=='PA' ? 'selected' : '' }}>Panama</option>
                                                <option value="PG" {{old('country')=='PG' ? 'selected' : '' }}>Papua New Guinea</option>
                                                <option value="PY" {{old('country')=='PY' ? 'selected' : '' }}>Paraguay</option>
                                                <option value="PE" {{old('country')=='PE' ? 'selected' : '' }}>Peru</option>
                                                <option value="PH" {{old('country')=='PH' ? 'selected' : '' }}>Philippines</option>
                                                <option value="PN" {{old('country')=='PN' ? 'selected' : '' }}>Pitcairn</option>
                                                <option value="PL" {{old('country')=='PL' ? 'selected' : '' }}>Poland</option>
                                                <option value="PT" {{old('country')=='PT' ? 'selected' : '' }}>Portugal</option>
                                                <option value="PR" {{old('country')=='PR' ? 'selected' : '' }}>Puerto Rico</option>
                                                <option value="QA" {{old('country')=='AQA' ? 'selected' : '' }}>Qatar</option>
                                                <option value="RE" {{old('country')=='RE' ? 'selected' : '' }}>Réunion</option>
                                                <option value="RO" {{old('country')=='RO' ? 'selected' : '' }}>Romania</option>
                                                <option value="RU" {{old('country')=='RU' ? 'selected' : '' }}>Russian Federation</option>
                                                <option value="RW" {{old('country')=='RW' ? 'selected' : '' }}>Rwanda</option>
                                                <option value="BL" {{old('country')=='BL' ? 'selected' : '' }}>Saint Barthélemy</option>
                                                <option value="SH" {{old('country')=='SH' ? 'selected' : '' }}>Saint Helena, Ascension and Tristan da Cunha</option>
                                                <option value="KN" {{old('country')=='KN' ? 'selected' : '' }}>Saint Kitts and Nevis</option>
                                                <option value="LC" {{old('country')=='LC' ? 'selected' : '' }}>Saint Lucia</option>
                                                <option value="MF" {{old('country')=='MF' ? 'selected' : '' }}>Saint Martin (French part)</option>
                                                <option value="PM" {{old('country')=='PM' ? 'selected' : '' }}>Saint Pierre and Miquelon</option>
                                                <option value="VC" {{old('country')=='VC' ? 'selected' : '' }}>Saint Vincent and the Grenadines</option>
                                                <option value="WS" {{old('country')=='WS' ? 'selected' : '' }}>Samoa</option>
                                                <option value="SM" {{old('country')=='SM' ? 'selected' : '' }}>San Marino</option>
                                                <option value="ST" {{old('country')=='ST' ? 'selected' : '' }}>Sao Tome and Principe</option>
                                                <option value="SA" {{old('country')=='SA' ? 'selected' : '' }}>Saudi Arabia</option>
                                                <option value="SN" {{old('country')=='SN' ? 'selected' : '' }}>Senegal</option>
                                                <option value="RS" {{old('country')=='RS' ? 'selected' : '' }}>Serbia</option>
                                                <option value="SC" {{old('country')=='SC' ? 'selected' : '' }}>Seychelles</option>
                                                <option value="SL" {{old('country')=='SL' ? 'selected' : '' }}>Sierra Leone</option>
                                                <option value="SG" {{old('country')=='SG' ? 'selected' : '' }}>Singapore</option>
                                                <option value="SX" {{old('country')=='SX' ? 'selected' : '' }}>Sint Maarten (Dutch part)</option>
                                                <option value="SK" {{old('country')=='SK' ? 'selected' : '' }}>Slovakia</option>
                                                <option value="SI" {{old('country')=='SI' ? 'selected' : '' }}>Slovenia</option>
                                                <option value="SB" {{old('country')=='SB' ? 'selected' : '' }}>Solomon Islands</option>
                                                <option value="SO" {{old('country')=='SO' ? 'selected' : '' }}>Somalia</option>
                                                <option value="ZA" {{old('country')=='ZA' ? 'selected' : '' }}>South Africa</option>
                                                <option value="GS" {{old('country')=='GS' ? 'selected' : '' }}>South Georgia and the South Sandwich Islands</option>
                                                <option value="SS" {{old('country')=='SS' ? 'selected' : '' }}>South Sudan</option>
                                                <option value="ES" {{old('country')=='ES' ? 'selected' : '' }}>Spain</option>
                                                <option value="LK" {{old('country')=='LK' ? 'selected' : '' }}>Sri Lanka</option>
                                                <option value="SD" {{old('country')=='SD' ? 'selected' : '' }}>Sudan</option>
                                                <option value="SR" {{old('country')=='SR' ? 'selected' : '' }}>Suriname</option>
                                                <option value="SJ" {{old('country')=='SJ' ? 'selected' : '' }}>Svalbard and Jan Mayen</option>
                                                <option value="SZ" {{old('country')=='SZ' ? 'selected' : '' }}>Swaziland</option>
                                                <option value="SE" {{old('country')=='SE' ? 'selected' : '' }}>Sweden</option>
                                                <option value="CH" {{old('country')=='CH' ? 'selected' : '' }}>Switzerland</option>
                                                <option value="SY" {{old('country')=='SY' ? 'selected' : '' }}>Syrian Arab Republic</option>
                                                <option value="TW" {{old('country')=='TW' ? 'selected' : '' }}>Taiwan, Province of China</option>
                                                <option value="TJ" {{old('country')=='TJ' ? 'selected' : '' }}>Tajikistan</option>
                                                <option value="TZ" {{old('country')=='TZ' ? 'selected' : '' }}>Tanzania, United Republic of</option>
                                                <option value="TH" {{old('country')=='TH' ? 'selected' : '' }}>Thailand</option>
                                                <option value="TL" {{old('country')=='TL' ? 'selected' : '' }}>Timor-Leste</option>
                                                <option value="TG" {{old('country')=='TG' ? 'selected' : '' }}>Togo</option>
                                                <option value="TK" {{old('country')=='TK' ? 'selected' : '' }}>Tokelau</option>
                                                <option value="TO" {{old('country')=='TO' ? 'selected' : '' }}>Tonga</option>
                                                <option value="TT" {{old('country')=='TT' ? 'selected' : '' }}>Trinidad and Tobago</option>
                                                <option value="TN" {{old('country')=='TN' ? 'selected' : '' }}>Tunisia</option>
                                                <option value="TR" {{old('country')=='TR' ? 'selected' : '' }}>Turkey</option>
                                                <option value="TM" {{old('country')=='TM' ? 'selected' : '' }}>Turkmenistan</option>
                                                <option value="TC" {{old('country')=='TC' ? 'selected' : '' }}>Turks and Caicos Islands</option>
                                                <option value="TV" {{old('country')=='TV' ? 'selected' : '' }}>Tuvalu</option>
                                                <option value="UG" {{old('country')=='UG' ? 'selected' : '' }}>Uganda</option>
                                                <option value="UA" {{old('country')=='UA' ? 'selected' : '' }}>Ukraine</option>
                                                <option value="AE" {{old('country')=='AE' ? 'selected' : '' }}>United Arab Emirates</option>
                                                <option value="GB" {{old('country')=='GB' ? 'selected' : '' }}>United Kingdom</option>
                                                <option value="US" {{old('country')=='US' ? 'selected' : '' }}>United States</option>
                                                <option value="UM" {{old('country')=='UM' ? 'selected' : '' }}>United States Minor Outlying Islands</option>
                                                <option value="UY" {{old('country')=='UY' ? 'selected' : '' }}>Uruguay</option>
                                                <option value="UZ" {{old('country')=='UZ' ? 'selected' : '' }}>Uzbekistan</option>
                                                <option value="VU" {{old('country')=='VU' ? 'selected' : '' }}>Vanuatu</option>
                                                <option value="VE" {{old('country')=='VE' ? 'selected' : '' }}>Venezuela, Bolivarian Republic of</option>
                                                <option value="VN" {{old('country')=='VN' ? 'selected' : '' }}>Viet Nam</option>
                                                <option value="VG" {{old('country')=='VG' ? 'selected' : '' }}>Virgin Islands, British</option>
                                                <option value="VI" {{old('country')=='VI' ? 'selected' : '' }}>Virgin Islands, U.S.</option>
                                                <option value="WF" {{old('country')=='WF' ? 'selected' : '' }}>Wallis and Futuna</option>
                                                <option value="EH" {{old('country')=='EH' ? 'selected' : '' }}>Western Sahara</option>
                                                <option value="YE" {{old('country')=='YE' ? 'selected' : '' }}>Yemen</option>
                                                <option value="ZM" {{old('country')=='ZM' ? 'selected' : '' }}>Zambia</option>
                                                <option value="ZW" {{old('country')=='ZW' ? 'selected' : '' }}>Zimbabwe</option>
                                            </select>
                                        </div>
                                    </div>
                                </div>

                                <div class="row col-lg-12 col-md-12">
                                    <div class="col-md-6">
                                        <label for="">Is Verified <span class="text-danger">*</span></label>
                                        <select name="type" class="form-control show-tick">
                                            <option value="">-- Type --</option>
                                            <option value="0" {{old('is_verified')=='0' ? 'selected' : '' }}>No
                                            </option>
                                            <option value="1" {{old('is_verified')=='1' ? 'selected' : '' }}>Yes
                                            </option>
                                        </select>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="">Status <span class="text-danger">*</span></label>
                                            <select name="status" class="form-control show-tick">
                                                <option value="">-- Status --</option>
                                                <option value="active" {{old('status')=='active' ? 'selected' : '' }}>Active
                                                </option>
                                                <option value="inactive" {{old('status')=='inactive' ? 'selected' : '' }}>Inactive
                                                </option>
                                            </select>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <button type="submit" class="btn btn-primary">Submit</button>
                            <button type="button" onclick="window.history.back();  class="btn btn-outline-secondary">Cancel</button>

                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection

@section('scripts')
<script src="/vendor/laravel-filemanager/js/stand-alone-button.js"></script>
<script>
    $('#lfm').filemanager('image');
</script>

<script>
    $(document).ready(function() {
            $('#description').summernote();
        });
</script>
@endsection
