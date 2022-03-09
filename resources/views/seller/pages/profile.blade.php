@extends('seller.layouts.master')

@section('content')

<div id="main-content" class="profilepage_2 blog-page">
    <div class="container-fluid">
        <div class="block-header">
            <div class="row">
                <div class="col-lg-5 col-md-8 col-sm-12">
                    <h2><a href="javascript:void(0);" class="btn btn-xs btn-link btn-toggle-fullwidth"><i class="fa fa-arrow-left"></i></a> User Profile</h2>
                    <ul class="breadcrumb">
                        <li class="breadcrumb-item"><a href="{{route('seller')}}"><i class="icon-home"></i></a></li>
                        <li class="breadcrumb-item">Profile</li>
                        <li class="breadcrumb-item active">User Profile</li>
                    </ul>
                </div>
            </div>
        </div>

        <div class="clearfix row">
            <div class="col-lg-4 col-md-12">
                <div class="card profile-header">
                    <div class="body">
                        <div class="profile-image"> <img src="{{asset(auth('seller')->user()->photo)}}" class="rounded-circle" alt="" style="border-radius: 100%; height: 200px; width: 200px;" > </div>
                        <div>
                            @php
                                $full_names=explode(' ', auth('seller')->user()->full_name)
                            @endphp
                            <h4 class="m-b-0"><strong>{{$first_name = $full_names[0]}}</strong> {{$last_name = $full_names[1]}}</h4>
                            <span>username: {{auth('seller')->user()->username}}</span>
                        </div>
                    </div>
                </div>

                <div class="card">
                    <div class="header">
                        <h2>Info</h2>
                    </div>
                    <div class="body">
                        <small class="text-muted">Address: </small>
                        <p>{{auth('seller')->user()->address}}</p>
                        <hr>
                        <small class="text-muted">Email address: </small>
                        <p>{{auth('seller')->user()->email}}</p>
                        <hr>
                        <small class="text-muted">Mobile: </small>
                        <p>+ {{auth('seller')->user()->phone}}</p>
                        <hr>
                        <small class="text-muted">Birth Date: </small>
                        <p class="m-b-0">{{auth('seller')->user()->date_of_birth}}</p>
                        <hr>
                        <small class="text-muted">Social: </small>
                        <p><i class="fa fa-twitter m-r-5"></i> {{get_setting('twitter_url')}}</p>
                        <p><i class="fa fa-facebook m-r-5"></i>  {{get_setting('facebook_url')}}</p>
                        <p><i class="fa fa-youtube m-r-5"></i> {{get_setting('youtube_url')}}</p>
                        <p><i class="fa fa-instagram m-r-5"></i> {{get_setting('instagram_url')}}</p>
                    </div>
                </div>
            </div>

            <div class="col-lg-5 col-md-12">
                <div class="card">
                    <div class="body">
                        <ul class="nav nav-tabs-new">
                            <li class="nav-item"><a class="nav-link" data-toggle="tab" href="#Settings">Update</a></li>
                        </ul>
                    </div>
                </div>

                <div class="tab-content padding-0">

                    <div class="tab-pane" id="Settings">

                        <div class="card">
                            <div class="body">
                                <h6>Edit Information</h6>
                                <form action="{{route('seller.profile.update',auth('seller')->user()->id)}}" method="post">
                                    @csrf
                                    @method('put')
                                    <div class="clearfix row">
                                        <div class="col-lg-12 col-md-12">
                                            <div class="form-group">
                                                <input type="text" name="full_name" class="form-control" placeholder="Full Name" value="{{auth('seller')->user()->full_name}}">
                                            </div>
                                            <div class="form-group">
                                                <input type="text" name="username" class="form-control" placeholder="Username" value="{{auth('seller')->user()->username}}">
                                            </div>

                                            <div class="form-group">
                                                <input type="text" class="form-control" name="phone" placeholder="Phone" value="{{auth('seller')->user()->phone}}">
                                            </div>

                                            <div class="form-group">
                                                <input type="text" class="form-control" name="email" placeholder="email" value="{{auth('seller')->user()->email}}">
                                            </div>
                                            {{-- <div class="form-group">
                                                <div>
                                                    <label class="fancy-radio">
                                                        <input name="gender2" value="male" type="radio" checked>
                                                        <span><i></i>Male</span>
                                                    </label>
                                                    <label class="fancy-radio">
                                                        <input name="gender2" value="female" type="radio">
                                                        <span><i></i>Female</span>
                                                    </label>
                                                </div>
                                            </div> --}}
                                            <div class="form-group">
                                                <div class="input-group">
                                                    <div class="input-group-prepend">
                                                        <span class="input-group-text"><i class="icon-calendar"></i></span>
                                                    </div>
                                                    <input data-provide="datepicker" name="date_of_birth" data-date-autoclose="true" class="form-control" value="{{auth('seller')->user()->date_of_birth}}" placeholder="Birthdate">
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <select class="form-control" name="genre">
                                                    <option value="">-- Select Genre --</option>
                                                    <option value="Male" {{auth('seller')->user()->genre=='Male' ? 'selected' : '' }}>Male</option>
                                                    <option value="Female" {{auth('seller')->user()->genre=='Female' ? 'selected' : '' }}>Female</option>
                                                    <option value="Others" {{auth('seller')->user()->genre=='Others' ? 'selected' : '' }}>Others</option>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="col-lg-12 col-md-12">
                                            <div class="form-group">
                                                <input type="text" class="form-control" placeholder="Address" name="address" value="{{auth('seller')->user()->address}}">
                                            </div>
                                            <div class="form-group">
                                                <input type="text" class="form-control" name="city" placeholder="City" value="{{auth('seller')->user()->city}}">
                                            </div>
                                            <div class="form-group">
                                                <input type="text" class="form-control" name="state" placeholder="State/Province" value="{{auth('seller')->user()->state}}">
                                            </div>
                                            <div class="form-group">
                                                <select class="form-control" name="country">
                                                    <option value="">-- Select Country --</option>
                                                    <option value="AF" {{auth('seller')->user()->country=='AF' ? 'selected' : '' }}>Afghanistan</option>
                                                    <option value="AX" {{auth('seller')->user()->country=='AX' ? 'selected' : '' }}>Åland Islands</option>
                                                    <option value="AL" {{auth('seller')->user()->country=='AL' ? 'selected' : '' }}>Albania</option>
                                                    <option value="DZ" {{auth('seller')->user()->country=='ZD' ? 'selected' : '' }}>Algeria</option>
                                                    <option value="AS" {{auth('seller')->user()->country=='AS' ? 'selected' : '' }}>American Samoa</option>
                                                    <option value="AD" {{auth('seller')->user()->country=='AD' ? 'selected' : '' }}>Andorra</option>
                                                    <option value="AO" {{auth('seller')->user()->country=='AO' ? 'selected' : '' }}>Angola</option>
                                                    <option value="AI" {{auth('seller')->user()->country=='AI' ? 'selected' : '' }}>Anguilla</option>
                                                    <option value="AQ" {{auth('seller')->user()->country=='AQ' ? 'selected' : '' }}>Antarctica</option>
                                                    <option value="AG" {{auth('seller')->user()->country=='AG' ? 'selected' : '' }}>Antigua and Barbuda</option>
                                                    <option value="AR" {{auth('seller')->user()->country=='AR' ? 'selected' : '' }}>Argentina</option>
                                                    <option value="AM" {{auth('seller')->user()->country=='AM' ? 'selected' : '' }}>Armenia</option>
                                                    <option value="AW" {{auth('seller')->user()->country=='AW' ? 'selected' : '' }}>Aruba</option>
                                                    <option value="AU" {{auth('seller')->user()->country=='AU' ? 'selected' : '' }}>Australia</option>
                                                    <option value="AT" {{auth('seller')->user()->country=='AT' ? 'selected' : '' }}>Austria</option>
                                                    <option value="AZ" {{auth('seller')->user()->country=='AZ' ? 'selected' : '' }}>Azerbaijan</option>
                                                    <option value="BS" {{auth('seller')->user()->country=='BS' ? 'selected' : '' }}>Bahamas</option>
                                                    <option value="BH" {{auth('seller')->user()->country=='BH' ? 'selected' : '' }}>Bahrain</option>
                                                    <option value="BD" {{auth('seller')->user()->country=='BD' ? 'selected' : '' }}>Bangladesh</option>
                                                    <option value="BB" {{auth('seller')->user()->country=='BB' ? 'selected' : '' }}>Barbados</option>
                                                    <option value="BY" {{auth('seller')->user()->country=='BY' ? 'selected' : '' }}>Belarus</option>
                                                    <option value="BE" {{auth('seller')->user()->country=='BE' ? 'selected' : '' }}>Belgium</option>
                                                    <option value="BZ" {{auth('seller')->user()->country=='BZ' ? 'selected' : '' }}>Belize</option>
                                                    <option value="BJ" {{auth('seller')->user()->country=='BJ' ? 'selected' : '' }}>Benin</option>
                                                    <option value="BM" {{auth('seller')->user()->country=='BM' ? 'selected' : '' }}>Bermuda</option>
                                                    <option value="BT" {{auth('seller')->user()->country=='BT' ? 'selected' : '' }}>Bhutan</option>
                                                    <option value="BO" {{auth('seller')->user()->country=='BO' ? 'selected' : '' }}>Bolivia, Plurinational State of</option>
                                                    <option value="BQ" {{auth('seller')->user()->country=='BQ' ? 'selected' : '' }}>Bonaire, Sint Eustatius and Saba</option>
                                                    <option value="BA" {{auth('seller')->user()->country=='BA' ? 'selected' : '' }}>Bosnia and Herzegovina</option>
                                                    <option value="BW" {{auth('seller')->user()->country=='BW' ? 'selected' : '' }}>Botswana</option>
                                                    <option value="BV" {{auth('seller')->user()->country=='BV' ? 'selected' : '' }}>Bouvet Island</option>
                                                    <option value="BR" {{auth('seller')->user()->country=='BR' ? 'selected' : '' }}>Brazil</option>
                                                    <option value="IO" {{auth('seller')->user()->country=='IO' ? 'selected' : '' }}>British Indian Ocean Territory</option>
                                                    <option value="BN" {{auth('seller')->user()->country=='BN' ? 'selected' : '' }}>Brunei Darussalam</option>
                                                    <option value="BG" {{auth('seller')->user()->country=='BG' ? 'selected' : '' }}>Bulgaria</option>
                                                    <option value="BF" {{auth('seller')->user()->country=='BF' ? 'selected' : '' }}>Burkina Faso</option>
                                                    <option value="BI" {{auth('seller')->user()->country=='BI' ? 'selected' : '' }}>Burundi</option>
                                                    <option value="KH" {{auth('seller')->user()->country=='KH' ? 'selected' : '' }}>Cambodia</option>
                                                    <option value="CM" {{auth('seller')->user()->country=='CM' ? 'selected' : '' }}>Cameroon</option>
                                                    <option value="CA" {{auth('seller')->user()->country=='CA' ? 'selected' : '' }}>Canada</option>
                                                    <option value="CV" {{auth('seller')->user()->country=='CV' ? 'selected' : '' }}>Cape Verde</option>
                                                    <option value="KY" {{auth('seller')->user()->country=='KY' ? 'selected' : '' }}>Cayman Islands</option>
                                                    <option value="CF" {{auth('seller')->user()->country=='CF' ? 'selected' : '' }}>Central African Republic</option>
                                                    <option value="TD" {{auth('seller')->user()->country=='TD' ? 'selected' : '' }}>Chad</option>
                                                    <option value="CL" {{auth('seller')->user()->country=='CL' ? 'selected' : '' }}>Chile</option>
                                                    <option value="CN" {{auth('seller')->user()->country=='CN' ? 'selected' : '' }}>China</option>
                                                    <option value="CX" {{auth('seller')->user()->country=='CX' ? 'selected' : '' }}>Christmas Island</option>
                                                    <option value="CC" {{auth('seller')->user()->country=='CC' ? 'selected' : '' }}>Cocos (Keeling) Islands</option>
                                                    <option value="CO" {{auth('seller')->user()->country=='CO' ? 'selected' : '' }}>Colombia</option>
                                                    <option value="KM" {{auth('seller')->user()->country=='KM' ? 'selected' : '' }}>Comoros</option>
                                                    <option value="CG" {{auth('seller')->user()->country=='CG' ? 'selected' : '' }}>Congo</option>
                                                    <option value="CD" {{auth('seller')->user()->country=='CD' ? 'selected' : '' }}>Congo, the Democratic Republic of the</option>
                                                    <option value="CK" {{auth('seller')->user()->country=='CK' ? 'selected' : '' }}>Cook Islands</option>
                                                    <option value="CR" {{auth('seller')->user()->country=='CR' ? 'selected' : '' }}>Costa Rica</option>
                                                    <option value="CI" {{auth('seller')->user()->country=='CI' ? 'selected' : '' }}>Côte d'Ivoire</option>
                                                    <option value="HR" {{auth('seller')->user()->country=='HR' ? 'selected' : '' }}>Croatia</option>
                                                    <option value="CU" {{auth('seller')->user()->country=='CU' ? 'selected' : '' }}>Cuba</option>
                                                    <option value="CW" {{auth('seller')->user()->country=='CW' ? 'selected' : '' }}>Curaçao</option>
                                                    <option value="CY" {{auth('seller')->user()->country=='CY' ? 'selected' : '' }}>Cyprus</option>
                                                    <option value="CZ" {{auth('seller')->user()->country=='CZ' ? 'selected' : '' }}>Czech Republic</option>
                                                    <option value="DK" {{auth('seller')->user()->country=='DK' ? 'selected' : '' }}>Denmark</option>
                                                    <option value="DJ" {{auth('seller')->user()->country=='DJ' ? 'selected' : '' }}>Djibouti</option>
                                                    <option value="DM" {{auth('seller')->user()->country=='DM' ? 'selected' : '' }}>Dominica</option>
                                                    <option value="DO" {{auth('seller')->user()->country=='DO' ? 'selected' : '' }}>Dominican Republic</option>
                                                    <option value="EC" {{auth('seller')->user()->country=='EC' ? 'selected' : '' }}>Ecuador</option>
                                                    <option value="EG" {{auth('seller')->user()->country=='EG' ? 'selected' : '' }}>Egypt</option>
                                                    <option value="SV" {{auth('seller')->user()->country=='SV' ? 'selected' : '' }}>El Salvador</option>
                                                    <option value="GQ" {{auth('seller')->user()->country=='GQ' ? 'selected' : '' }}>Equatorial Guinea</option>
                                                    <option value="ER" {{auth('seller')->user()->country=='ER' ? 'selected' : '' }}>Eritrea</option>
                                                    <option value="EE" {{auth('seller')->user()->country=='EE' ? 'selected' : '' }}>Estonia</option>
                                                    <option value="ET" {{auth('seller')->user()->country=='ET' ? 'selected' : '' }}>Ethiopia</option>
                                                    <option value="FK" {{auth('seller')->user()->country=='FK' ? 'selected' : '' }}>Falkland Islands (Malvinas)</option>
                                                    <option value="FO" {{auth('seller')->user()->country=='FO' ? 'selected' : '' }}>Faroe Islands</option>
                                                    <option value="FJ" {{auth('seller')->user()->country=='FJ' ? 'selected' : '' }}>Fiji</option>
                                                    <option value="FI" {{auth('seller')->user()->country=='FI' ? 'selected' : '' }}>Finland</option>
                                                    <option value="FR" {{auth('seller')->user()->country=='FR' ? 'selected' : '' }}>France</option>
                                                    <option value="GF" {{auth('seller')->user()->country=='GF' ? 'selected' : '' }}>French Guiana</option>
                                                    <option value="PF" {{auth('seller')->user()->country=='PF' ? 'selected' : '' }}>French Polynesia</option>
                                                    <option value="TF" {{auth('seller')->user()->country=='TF' ? 'selected' : '' }}>French Southern Territories</option>
                                                    <option value="GA" {{auth('seller')->user()->country=='GA' ? 'selected' : '' }}>Gabon</option>
                                                    <option value="GM" {{auth('seller')->user()->country=='GM' ? 'selected' : '' }}>Gambia</option>
                                                    <option value="GE" {{auth('seller')->user()->country=='GE' ? 'selected' : '' }}>Georgia</option>
                                                    <option value="DE" {{auth('seller')->user()->country=='DE' ? 'selected' : '' }}>Germany</option>
                                                    <option value="GH" {{auth('seller')->user()->country=='GH' ? 'selected' : '' }}>Ghana</option>
                                                    <option value="GI" {{auth('seller')->user()->country=='GI' ? 'selected' : '' }}>Gibraltar</option>
                                                    <option value="GR" {{auth('seller')->user()->country=='GR' ? 'selected' : '' }}>Greece</option>
                                                    <option value="GL" {{auth('seller')->user()->country=='GL' ? 'selected' : '' }}>Greenland</option>
                                                    <option value="GD" {{auth('seller')->user()->country=='GD' ? 'selected' : '' }}>Grenada</option>
                                                    <option value="GP" {{auth('seller')->user()->country=='GP' ? 'selected' : '' }}>Guadeloupe</option>
                                                    <option value="GU" {{auth('seller')->user()->country=='GU' ? 'selected' : '' }}>Guam</option>
                                                    <option value="GT" {{auth('seller')->user()->country=='GT' ? 'selected' : '' }}>Guatemala</option>
                                                    <option value="GG" {{auth('seller')->user()->country=='GG' ? 'selected' : '' }}>Guernsey</option>
                                                    <option value="GN" {{auth('seller')->user()->country=='GN' ? 'selected' : '' }}>Guinea</option>
                                                    <option value="GW" {{auth('seller')->user()->country=='GW' ? 'selected' : '' }}>Guinea-Bissau</option>
                                                    <option value="GY" {{auth('seller')->user()->country=='GY' ? 'selected' : '' }}>Guyana</option>
                                                    <option value="HT" {{auth('seller')->user()->country=='HT' ? 'selected' : '' }}>Haiti</option>
                                                    <option value="HM" {{auth('seller')->user()->country=='HM' ? 'selected' : '' }}>Heard Island and McDonald Islands</option>
                                                    <option value="VA" {{auth('seller')->user()->country=='VA' ? 'selected' : '' }}>Holy See (Vatican City State)</option>
                                                    <option value="HN" {{auth('seller')->user()->country=='HN' ? 'selected' : '' }}>Honduras</option>
                                                    <option value="HK" {{auth('seller')->user()->country=='HK' ? 'selected' : '' }}>Hong Kong</option>
                                                    <option value="HU" {{auth('seller')->user()->country=='HU' ? 'selected' : '' }}>Hungary</option>
                                                    <option value="IS" {{auth('seller')->user()->country=='IS' ? 'selected' : '' }}>Iceland</option>
                                                    <option value="IN" {{auth('seller')->user()->country=='IN' ? 'selected' : '' }}>India</option>
                                                    <option value="ID" {{auth('seller')->user()->country=='ID' ? 'selected' : '' }}>Indonesia</option>
                                                    <option value="IR" {{auth('seller')->user()->country=='IR' ? 'selected' : '' }}>Iran, Islamic Republic of</option>
                                                    <option value="IQ" {{auth('seller')->user()->country=='IQ' ? 'selected' : '' }}>Iraq</option>
                                                    <option value="IE" {{auth('seller')->user()->country=='IE' ? 'selected' : '' }}>Ireland</option>
                                                    <option value="IM" {{auth('seller')->user()->country=='IM' ? 'selected' : '' }}>Isle of Man</option>
                                                    <option value="IL" {{auth('seller')->user()->country=='IL' ? 'selected' : '' }}>Israel</option>
                                                    <option value="IT" {{auth('seller')->user()->country=='IT' ? 'selected' : '' }}>Italy</option>
                                                    <option value="JM" {{auth('seller')->user()->country=='JM' ? 'selected' : '' }}>Jamaica</option>
                                                    <option value="JP" {{auth('seller')->user()->country=='JP' ? 'selected' : '' }}>Japan</option>
                                                    <option value="JE" {{auth('seller')->user()->country=='JE' ? 'selected' : '' }}>Jersey</option>
                                                    <option value="JO" {{auth('seller')->user()->country=='JO' ? 'selected' : '' }}>Jordan</option>
                                                    <option value="KZ" {{auth('seller')->user()->country=='KZ' ? 'selected' : '' }}>Kazakhstan</option>
                                                    <option value="KE" {{auth('seller')->user()->country=='KE' ? 'selected' : '' }}>Kenya</option>
                                                    <option value="KI" {{auth('seller')->user()->country=='KI' ? 'selected' : '' }}>Kiribati</option>
                                                    <option value="KP" {{auth('seller')->user()->country=='KP' ? 'selected' : '' }}>Korea, Democratic People's Republic of</option>
                                                    <option value="KR" {{auth('seller')->user()->country=='KR' ? 'selected' : '' }}>Korea, Republic of</option>
                                                    <option value="KW" {{auth('seller')->user()->country=='KW' ? 'selected' : '' }}>Kuwait</option>
                                                    <option value="KG" {{auth('seller')->user()->country=='KG' ? 'selected' : '' }}>Kyrgyzstan</option>
                                                    <option value="LA" {{auth('seller')->user()->country=='LA' ? 'selected' : '' }}>Lao People's Democratic Republic</option>
                                                    <option value="LV" {{auth('seller')->user()->country=='LV' ? 'selected' : '' }}>Latvia</option>
                                                    <option value="LB" {{auth('seller')->user()->country=='LB' ? 'selected' : '' }}>Lebanon</option>
                                                    <option value="LS" {{auth('seller')->user()->country=='LS' ? 'selected' : '' }}>Lesotho</option>
                                                    <option value="LR" {{auth('seller')->user()->country=='LR' ? 'selected' : '' }}>Liberia</option>
                                                    <option value="LY" {{auth('seller')->user()->country=='LY' ? 'selected' : '' }}>Libya</option>
                                                    <option value="LI" {{auth('seller')->user()->country=='LI' ? 'selected' : '' }}>Liechtenstein</option>
                                                    <option value="LT" {{auth('seller')->user()->country=='LT' ? 'selected' : '' }}>Lithuania</option>
                                                    <option value="LU" {{auth('seller')->user()->country=='LU' ? 'selected' : '' }}>Luxembourg</option>
                                                    <option value="MO" {{auth('seller')->user()->country=='MO' ? 'selected' : '' }}>Macao</option>
                                                    <option value="MK" {{auth('seller')->user()->country=='MK' ? 'selected' : '' }}>Macedonia, the former Yugoslav Republic of</option>
                                                    <option value="MG" {{auth('seller')->user()->country=='MG' ? 'selected' : '' }}>Madagascar</option>
                                                    <option value="MW" {{auth('seller')->user()->country=='MW' ? 'selected' : '' }}>Malawi</option>
                                                    <option value="MY" {{auth('seller')->user()->country=='MY' ? 'selected' : '' }}>Malaysia</option>
                                                    <option value="MV" {{auth('seller')->user()->country=='MV' ? 'selected' : '' }}>Maldives</option>
                                                    <option value="ML" {{auth('seller')->user()->country=='ML' ? 'selected' : '' }}>Mali</option>
                                                    <option value="MT" {{auth('seller')->user()->country=='MT' ? 'selected' : '' }}>Malta</option>
                                                    <option value="MH" {{auth('seller')->user()->country=='MH' ? 'selected' : '' }}>Marshall Islands</option>
                                                    <option value="MQ" {{auth('seller')->user()->country=='MQ' ? 'selected' : '' }}>Martinique</option>
                                                    <option value="MR" {{auth('seller')->user()->country=='MR' ? 'selected' : '' }}>Mauritania</option>
                                                    <option value="MU" {{auth('seller')->user()->country=='MU' ? 'selected' : '' }}>Mauritius</option>
                                                    <option value="YT" {{auth('seller')->user()->country=='YT' ? 'selected' : '' }}>Mayotte</option>
                                                    <option value="MX" {{auth('seller')->user()->country=='MX' ? 'selected' : '' }}>Mexico</option>
                                                    <option value="FM" {{auth('seller')->user()->country=='FM' ? 'selected' : '' }}>Micronesia, Federated States of</option>
                                                    <option value="MD" {{auth('seller')->user()->country=='MD' ? 'selected' : '' }}>Moldova, Republic of</option>
                                                    <option value="MC" {{auth('seller')->user()->country=='MC' ? 'selected' : '' }}>Monaco</option>
                                                    <option value="MN" {{auth('seller')->user()->country=='MN' ? 'selected' : '' }}>Mongolia</option>
                                                    <option value="ME" {{auth('seller')->user()->country=='ME' ? 'selected' : '' }}>Montenegro</option>
                                                    <option value="MS" {{auth('seller')->user()->country=='MS' ? 'selected' : '' }}>Montserrat</option>
                                                    <option value="MA" {{auth('seller')->user()->country=='MA' ? 'selected' : '' }}>Morocco</option>
                                                    <option value="MZ" {{auth('seller')->user()->country=='MZ' ? 'selected' : '' }}>Mozambique</option>
                                                    <option value="MM" {{auth('seller')->user()->country=='MM' ? 'selected' : '' }}>Myanmar</option>
                                                    <option value="NA" {{auth('seller')->user()->country=='NA' ? 'selected' : '' }}>Namibia</option>
                                                    <option value="NR" {{auth('seller')->user()->country=='NR' ? 'selected' : '' }}>Nauru</option>
                                                    <option value="NP" {{auth('seller')->user()->country=='NP' ? 'selected' : '' }}>Nepal</option>
                                                    <option value="NL" {{auth('seller')->user()->country=='NL' ? 'selected' : '' }}>Netherlands</option>
                                                    <option value="NC" {{auth('seller')->user()->country=='NC' ? 'selected' : '' }}>New Caledonia</option>
                                                    <option value="NZ" {{auth('seller')->user()->country=='NZ' ? 'selected' : '' }}>New Zealand</option>
                                                    <option value="NI" {{auth('seller')->user()->country=='NI' ? 'selected' : '' }}>Nicaragua</option>
                                                    <option value="NE" {{auth('seller')->user()->country=='NE' ? 'selected' : '' }}>Niger</option>
                                                    <option value="NG" {{auth('seller')->user()->country=='NG' ? 'selected' : '' }}>Nigeria</option>
                                                    <option value="NU" {{auth('seller')->user()->country=='NU' ? 'selected' : '' }}>Niue</option>
                                                    <option value="NF" {{auth('seller')->user()->country=='NF' ? 'selected' : '' }}>Norfolk Island</option>
                                                    <option value="MP" {{auth('seller')->user()->country=='MP' ? 'selected' : '' }}>Northern Mariana Islands</option>
                                                    <option value="NO" {{auth('seller')->user()->country=='NO' ? 'selected' : '' }}>Norway</option>
                                                    <option value="OM" {{auth('seller')->user()->country=='OM' ? 'selected' : '' }}>Oman</option>
                                                    <option value="PK" {{auth('seller')->user()->country=='PK' ? 'selected' : '' }}>Pakistan</option>
                                                    <option value="PW" {{auth('seller')->user()->country=='PW' ? 'selected' : '' }}>Palau</option>
                                                    <option value="PS" {{auth('seller')->user()->country=='PS' ? 'selected' : '' }}>Palestinian Territory, Occupied</option>
                                                    <option value="PA" {{auth('seller')->user()->country=='PA' ? 'selected' : '' }}>Panama</option>
                                                    <option value="PG" {{auth('seller')->user()->country=='PG' ? 'selected' : '' }}>Papua New Guinea</option>
                                                    <option value="PY" {{auth('seller')->user()->country=='PY' ? 'selected' : '' }}>Paraguay</option>
                                                    <option value="PE" {{auth('seller')->user()->country=='PE' ? 'selected' : '' }}>Peru</option>
                                                    <option value="PH" {{auth('seller')->user()->country=='PH' ? 'selected' : '' }}>Philippines</option>
                                                    <option value="PN" {{auth('seller')->user()->country=='PN' ? 'selected' : '' }}>Pitcairn</option>
                                                    <option value="PL" {{auth('seller')->user()->country=='PL' ? 'selected' : '' }}>Poland</option>
                                                    <option value="PT" {{auth('seller')->user()->country=='PT' ? 'selected' : '' }}>Portugal</option>
                                                    <option value="PR" {{auth('seller')->user()->country=='PR' ? 'selected' : '' }}>Puerto Rico</option>
                                                    <option value="QA" {{auth('seller')->user()->country=='AQA' ? 'selected' : '' }}>Qatar</option>
                                                    <option value="RE" {{auth('seller')->user()->country=='RE' ? 'selected' : '' }}>Réunion</option>
                                                    <option value="RO" {{auth('seller')->user()->country=='RO' ? 'selected' : '' }}>Romania</option>
                                                    <option value="RU" {{auth('seller')->user()->country=='RU' ? 'selected' : '' }}>Russian Federation</option>
                                                    <option value="RW" {{auth('seller')->user()->country=='RW' ? 'selected' : '' }}>Rwanda</option>
                                                    <option value="BL" {{auth('seller')->user()->country=='BL' ? 'selected' : '' }}>Saint Barthélemy</option>
                                                    <option value="SH" {{auth('seller')->user()->country=='SH' ? 'selected' : '' }}>Saint Helena, Ascension and Tristan da Cunha</option>
                                                    <option value="KN" {{auth('seller')->user()->country=='KN' ? 'selected' : '' }}>Saint Kitts and Nevis</option>
                                                    <option value="LC" {{auth('seller')->user()->country=='LC' ? 'selected' : '' }}>Saint Lucia</option>
                                                    <option value="MF" {{auth('seller')->user()->country=='MF' ? 'selected' : '' }}>Saint Martin (French part)</option>
                                                    <option value="PM" {{auth('seller')->user()->country=='PM' ? 'selected' : '' }}>Saint Pierre and Miquelon</option>
                                                    <option value="VC" {{auth('seller')->user()->country=='VC' ? 'selected' : '' }}>Saint Vincent and the Grenadines</option>
                                                    <option value="WS" {{auth('seller')->user()->country=='WS' ? 'selected' : '' }}>Samoa</option>
                                                    <option value="SM" {{auth('seller')->user()->country=='SM' ? 'selected' : '' }}>San Marino</option>
                                                    <option value="ST" {{auth('seller')->user()->country=='ST' ? 'selected' : '' }}>Sao Tome and Principe</option>
                                                    <option value="SA" {{auth('seller')->user()->country=='SA' ? 'selected' : '' }}>Saudi Arabia</option>
                                                    <option value="SN" {{auth('seller')->user()->country=='SN' ? 'selected' : '' }}>Senegal</option>
                                                    <option value="RS" {{auth('seller')->user()->country=='RS' ? 'selected' : '' }}>Serbia</option>
                                                    <option value="SC" {{auth('seller')->user()->country=='SC' ? 'selected' : '' }}>Seychelles</option>
                                                    <option value="SL" {{auth('seller')->user()->country=='SL' ? 'selected' : '' }}>Sierra Leone</option>
                                                    <option value="SG" {{auth('seller')->user()->country=='SG' ? 'selected' : '' }}>Singapore</option>
                                                    <option value="SX" {{auth('seller')->user()->country=='SX' ? 'selected' : '' }}>Sint Maarten (Dutch part)</option>
                                                    <option value="SK" {{auth('seller')->user()->country=='SK' ? 'selected' : '' }}>Slovakia</option>
                                                    <option value="SI" {{auth('seller')->user()->country=='SI' ? 'selected' : '' }}>Slovenia</option>
                                                    <option value="SB" {{auth('seller')->user()->country=='SB' ? 'selected' : '' }}>Solomon Islands</option>
                                                    <option value="SO" {{auth('seller')->user()->country=='SO' ? 'selected' : '' }}>Somalia</option>
                                                    <option value="ZA" {{auth('seller')->user()->country=='ZA' ? 'selected' : '' }}>South Africa</option>
                                                    <option value="GS" {{auth('seller')->user()->country=='GS' ? 'selected' : '' }}>South Georgia and the South Sandwich Islands</option>
                                                    <option value="SS" {{auth('seller')->user()->country=='SS' ? 'selected' : '' }}>South Sudan</option>
                                                    <option value="ES" {{auth('seller')->user()->country=='ES' ? 'selected' : '' }}>Spain</option>
                                                    <option value="LK" {{auth('seller')->user()->country=='LK' ? 'selected' : '' }}>Sri Lanka</option>
                                                    <option value="SD" {{auth('seller')->user()->country=='SD' ? 'selected' : '' }}>Sudan</option>
                                                    <option value="SR" {{auth('seller')->user()->country=='SR' ? 'selected' : '' }}>Suriname</option>
                                                    <option value="SJ" {{auth('seller')->user()->country=='SJ' ? 'selected' : '' }}>Svalbard and Jan Mayen</option>
                                                    <option value="SZ" {{auth('seller')->user()->country=='SZ' ? 'selected' : '' }}>Swaziland</option>
                                                    <option value="SE" {{auth('seller')->user()->country=='SE' ? 'selected' : '' }}>Sweden</option>
                                                    <option value="CH" {{auth('seller')->user()->country=='CH' ? 'selected' : '' }}>Switzerland</option>
                                                    <option value="SY" {{auth('seller')->user()->country=='SY' ? 'selected' : '' }}>Syrian Arab Republic</option>
                                                    <option value="TW" {{auth('seller')->user()->country=='TW' ? 'selected' : '' }}>Taiwan, Province of China</option>
                                                    <option value="TJ" {{auth('seller')->user()->country=='TJ' ? 'selected' : '' }}>Tajikistan</option>
                                                    <option value="TZ" {{auth('seller')->user()->country=='TZ' ? 'selected' : '' }}>Tanzania, United Republic of</option>
                                                    <option value="TH" {{auth('seller')->user()->country=='TH' ? 'selected' : '' }}>Thailand</option>
                                                    <option value="TL" {{auth('seller')->user()->country=='TL' ? 'selected' : '' }}>Timor-Leste</option>
                                                    <option value="TG" {{auth('seller')->user()->country=='TG' ? 'selected' : '' }}>Togo</option>
                                                    <option value="TK" {{auth('seller')->user()->country=='TK' ? 'selected' : '' }}>Tokelau</option>
                                                    <option value="TO" {{auth('seller')->user()->country=='TO' ? 'selected' : '' }}>Tonga</option>
                                                    <option value="TT" {{auth('seller')->user()->country=='TT' ? 'selected' : '' }}>Trinidad and Tobago</option>
                                                    <option value="TN" {{auth('seller')->user()->country=='TN' ? 'selected' : '' }}>Tunisia</option>
                                                    <option value="TR" {{auth('seller')->user()->country=='TR' ? 'selected' : '' }}>Turkey</option>
                                                    <option value="TM" {{auth('seller')->user()->country=='TM' ? 'selected' : '' }}>Turkmenistan</option>
                                                    <option value="TC" {{auth('seller')->user()->country=='TC' ? 'selected' : '' }}>Turks and Caicos Islands</option>
                                                    <option value="TV" {{auth('seller')->user()->country=='TV' ? 'selected' : '' }}>Tuvalu</option>
                                                    <option value="UG" {{auth('seller')->user()->country=='UG' ? 'selected' : '' }}>Uganda</option>
                                                    <option value="UA" {{auth('seller')->user()->country=='UA' ? 'selected' : '' }}>Ukraine</option>
                                                    <option value="AE" {{auth('seller')->user()->country=='AE' ? 'selected' : '' }}>United Arab Emirates</option>
                                                    <option value="GB" {{auth('seller')->user()->country=='GB' ? 'selected' : '' }}>United Kingdom</option>
                                                    <option value="US" {{auth('seller')->user()->country=='US' ? 'selected' : '' }}>United States</option>
                                                    <option value="UM" {{auth('seller')->user()->country=='UM' ? 'selected' : '' }}>United States Minor Outlying Islands</option>
                                                    <option value="UY" {{auth('seller')->user()->country=='UY' ? 'selected' : '' }}>Uruguay</option>
                                                    <option value="UZ" {{auth('seller')->user()->country=='UZ' ? 'selected' : '' }}>Uzbekistan</option>
                                                    <option value="VU" {{auth('seller')->user()->country=='VU' ? 'selected' : '' }}>Vanuatu</option>
                                                    <option value="VE" {{auth('seller')->user()->country=='VE' ? 'selected' : '' }}>Venezuela, Bolivarian Republic of</option>
                                                    <option value="VN" {{auth('seller')->user()->country=='VN' ? 'selected' : '' }}>Viet Nam</option>
                                                    <option value="VG" {{auth('seller')->user()->country=='VG' ? 'selected' : '' }}>Virgin Islands, British</option>
                                                    <option value="VI" {{auth('seller')->user()->country=='VI' ? 'selected' : '' }}>Virgin Islands, U.S.</option>
                                                    <option value="WF" {{auth('seller')->user()->country=='WF' ? 'selected' : '' }}>Wallis and Futuna</option>
                                                    <option value="EH" {{auth('seller')->user()->country=='EH' ? 'selected' : '' }}>Western Sahara</option>
                                                    <option value="YE" {{auth('seller')->user()->country=='YE' ? 'selected' : '' }}>Yemen</option>
                                                    <option value="ZM" {{auth('seller')->user()->country=='ZM' ? 'selected' : '' }}>Zambia</option>
                                                    <option value="ZW" {{auth('seller')->user()->country=='ZW' ? 'selected' : '' }}>Zimbabwe</option>
                                                </select>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <label for="">Photo </label>
                                        <div class="input-group">
                                            <span class="input-group-btn">
                                                <a id="lfm" data-input="thumbnail" data-preview="holder"
                                                    class="btn btn-primary">
                                                    <i class="fa fa-picture-o"></i>Choose
                                                </a>
                                            </span>
                                            <input id="thumbnail" class="form-control" type="text" name="photo" value="{{auth('seller')->user()->photo}}">
                                        </div>
                                        <div id="holder" style="margin-top:15px; max-height:100px;"></div>
                                    </div>
                                    <button type="submit" class="btn btn-primary">Update</button> &nbsp;&nbsp;
                                    <button type="button" class="btn btn-default">Cancel</button>
                                </form>
                            </div>
                        </div>
                    </div>

                </div>

            </div>

            <div class="col-lg-3 col-md-12">
                <div class="clearfix text-center row">
                    <div class="col-12">
                        <div class="card">
                            <div class="body">
                                <input type="text" class="knob" value="22" data-width="70" data-height="70" data-thickness="0.1" data-fgColor="#49c5b6">
                                <h6>Events</h6>
                                <span>12 of this month</span>
                            </div>
                        </div>
                    </div>
                    <div class="col-12">
                        <div class="card">
                            <div class="body">
                                <input type="text" class="knob" value="78" data-width="70" data-height="70" data-thickness="0.1" data-fgColor="#2196f3">
                                <h6>Birthday</h6>
                                <span>4 of this month</span>
                            </div>
                        </div>
                    </div>
                    <div class="col-12">
                        <div class="card">
                            <div class="body">
                                <input type="text" class="knob" value="66" data-width="70" data-height="70" data-thickness="0.1" data-fgColor="#f44336">
                                <h6>Conferences</h6>
                                <span>8 of this month</span>
                            </div>
                        </div>
                    </div>
                    <div class="col-12">
                        <div class="card">
                            <div class="body">
                                <input type="text" class="knob" value="50" data-width="70" data-height="70" data-thickness="0.1" data-fgColor="#4caf50">
                                <h6>Seminars</h6>
                                <span>2 of this month</span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection

@section('scripts')
<script>
    $(function () {
        $('.knob').knob({
            draw: function () {
                // "tron" case
                if (this.$.data('skin') == 'tron') {

                    var a = this.angle(this.cv)  // Angle
                        , sa = this.startAngle          // Previous start angle
                        , sat = this.startAngle         // Start angle
                        , ea                            // Previous end angle
                        , eat = sat + a                 // End angle
                        , r = true;

                    this.g.lineWidth = this.lineWidth;

                    this.o.cursor
                        && (sat = eat - 0.3)
                        && (eat = eat + 0.3);

                    if (this.o.displayPrevious) {
                        ea = this.startAngle + this.angle(this.value);
                        this.o.cursor
                            && (sa = ea - 0.3)
                            && (ea = ea + 0.3);
                        this.g.beginPath();
                        this.g.strokeStyle = this.previousColor;
                        this.g.arc(this.xy, this.xy, this.radius - this.lineWidth, sa, ea, false);
                        this.g.stroke();
                    }

                    this.g.beginPath();
                    this.g.strokeStyle = r ? this.o.fgColor : this.fgColor;
                    this.g.arc(this.xy, this.xy, this.radius - this.lineWidth, sat, eat, false);
                    this.g.stroke();

                    this.g.lineWidth = 2;
                    this.g.beginPath();
                    this.g.strokeStyle = this.o.fgColor;
                    this.g.arc(this.xy, this.xy, this.radius - this.lineWidth + 1 + this.lineWidth * 2 / 3, 0, 2 * Math.PI, false);
                    this.g.stroke();

                    return false;
                }
            }
        });
    });
    </script>
<script>
    $('#lfm').filemanager('image');
</script>
@endsection
