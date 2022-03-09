@extends('backend.layouts.master')

@section('content')


<div id="main-content">
    <div class="container-fluid">
        <div class="block-header">
            <div class="row">
                <div class="col-lg-6 col-md-8 col-sm-12">
                    <h2><a href="javascript:void(0);" class="btn btn-xs btn-link btn-toggle-fullwidth"><i
                                class="fa fa-arrow-left"></i></a> Edit Seller</h2>
                    <ul class="breadcrumb">
                        <li class="breadcrumb-item"><a href="{{route('admin')}}"><i class="icon-home"></i></a></li>
                        <li class="breadcrumb-item">Sellers</li>
                        <li class="breadcrumb-item active">Edit Seller</li>
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
                        <form action="{{route('seller.update',$seller->id)}}" method="post">
                            @csrf
                            @method('patch')

                            <div class="clearfix row">
                                <div class="row col-lg-12 col-md-12">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="">Full Name <span class="text-danger">*</span></label>
                                            <input type="text" class="form-control" placeholder="Full Name"
                                                name="full_name" value="{{$seller->full_name}}">
                                        </div>
                                    </div>

                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="">Username <span class="text-danger">*</span></label>
                                            <input type="text" class="form-control" placeholder="Username"
                                                name="username" value="{{$seller->username}}">
                                        </div>
                                    </div>
                                </div>

                                <div class="row col-lg-12 col-md-12">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="">Email <span class="text-danger">*</span></label>
                                            <input type="email" readonly class="form-control" placeholder="Email" name="email"
                                                value="{{$seller->email}}">
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="">Address</label>
                                            <input type="text" class="form-control" placeholder="Address" name="address"
                                                value="{{$seller->address}}">
                                        </div>
                                    </div>
                                </div>

                                <div class="col-lg-12 col-md-12">
                                    <div class="form-group">
                                        <label for="">Date of Birth <span class="text-danger">*</span></label>
                                        <input type="date" class="form-control" placeholder="13/05/1993"
                                            name="date_of_birth" value="{{$seller->date_of_birth}}">
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
                                            <input id="thumbnail" class="form-control" type="text" name="photo"
                                                value="{{$seller->photo}}">
                                        </div>
                                        <div id="holder" style="margin-top:15px; max-height:100px;"></div>
                                    </div>
                                </div>

                                <div class="row col-lg-12 col-md-12">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="">Phone</label>
                                            <input type="number" class="form-control" placeholder="221 772050626"
                                                name="phone" value="{{$seller->phone}}">
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="">City </label>
                                            <input type="text" class="form-control" placeholder="City" name="city"
                                                value="{{$seller->city}}">
                                        </div>
                                    </div>
                                </div>

                                <div class="row col-lg-12 col-md-12">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="">State</label>
                                            <input type="text" class="form-control" placeholder="State" name="state"
                                                value="{{$seller->state}}">
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="">Country</label>
                                            <select class="form-control" name="country">
                                                <option value="">-- Select Country --</option>
                                                <option value="AF" {{$seller->country=='AF' ? 'selected' : ''
                                                    }}>Afghanistan</option>
                                                <option value="AX" {{$seller->country=='AX' ? 'selected' : '' }}>Åland
                                                    Islands</option>
                                                <option value="AL" {{$seller->country=='AL' ? 'selected' : '' }}>Albania
                                                </option>
                                                <option value="DZ" {{$seller->country=='ZD' ? 'selected' : '' }}>Algeria
                                                </option>
                                                <option value="AS" {{$seller->country=='AS' ? 'selected' : ''
                                                    }}>American Samoa</option>
                                                <option value="AD" {{$seller->country=='AD' ? 'selected' : '' }}>Andorra
                                                </option>
                                                <option value="AO" {{$seller->country=='AO' ? 'selected' : '' }}>Angola
                                                </option>
                                                <option value="AI" {{$seller->country=='AI' ? 'selected' : ''
                                                    }}>Anguilla</option>
                                                <option value="AQ" {{$seller->country=='AQ' ? 'selected' : ''
                                                    }}>Antarctica</option>
                                                <option value="AG" {{$seller->country=='AG' ? 'selected' : '' }}>Antigua
                                                    and Barbuda</option>
                                                <option value="AR" {{$seller->country=='AR' ? 'selected' : ''
                                                    }}>Argentina</option>
                                                <option value="AM" {{$seller->country=='AM' ? 'selected' : '' }}>Armenia
                                                </option>
                                                <option value="AW" {{$seller->country=='AW' ? 'selected' : '' }}>Aruba
                                                </option>
                                                <option value="AU" {{$seller->country=='AU' ? 'selected' : ''
                                                    }}>Australia</option>
                                                <option value="AT" {{$seller->country=='AT' ? 'selected' : '' }}>Austria
                                                </option>
                                                <option value="AZ" {{$seller->country=='AZ' ? 'selected' : ''
                                                    }}>Azerbaijan</option>
                                                <option value="BS" {{$seller->country=='BS' ? 'selected' : '' }}>Bahamas
                                                </option>
                                                <option value="BH" {{$seller->country=='BH' ? 'selected' : '' }}>Bahrain
                                                </option>
                                                <option value="BD" {{$seller->country=='BD' ? 'selected' : ''
                                                    }}>Bangladesh</option>
                                                <option value="BB" {{$seller->country=='BB' ? 'selected' : ''
                                                    }}>Barbados</option>
                                                <option value="BY" {{$seller->country=='BY' ? 'selected' : '' }}>Belarus
                                                </option>
                                                <option value="BE" {{$seller->country=='BE' ? 'selected' : '' }}>Belgium
                                                </option>
                                                <option value="BZ" {{$seller->country=='BZ' ? 'selected' : '' }}>Belize
                                                </option>
                                                <option value="BJ" {{$seller->country=='BJ' ? 'selected' : '' }}>Benin
                                                </option>
                                                <option value="BM" {{$seller->country=='BM' ? 'selected' : '' }}>Bermuda
                                                </option>
                                                <option value="BT" {{$seller->country=='BT' ? 'selected' : '' }}>Bhutan
                                                </option>
                                                <option value="BO" {{$seller->country=='BO' ? 'selected' : ''
                                                    }}>Bolivia, Plurinational State of</option>
                                                <option value="BQ" {{$seller->country=='BQ' ? 'selected' : ''
                                                    }}>Bonaire, Sint Eustatius and Saba</option>
                                                <option value="BA" {{$seller->country=='BA' ? 'selected' : '' }}>Bosnia
                                                    and Herzegovina</option>
                                                <option value="BW" {{$seller->country=='BW' ? 'selected' : ''
                                                    }}>Botswana</option>
                                                <option value="BV" {{$seller->country=='BV' ? 'selected' : '' }}>Bouvet
                                                    Island</option>
                                                <option value="BR" {{$seller->country=='BR' ? 'selected' : '' }}>Brazil
                                                </option>
                                                <option value="IO" {{$seller->country=='IO' ? 'selected' : '' }}>British
                                                    Indian Ocean Territory</option>
                                                <option value="BN" {{$seller->country=='BN' ? 'selected' : '' }}>Brunei
                                                    Darussalam</option>
                                                <option value="BG" {{$seller->country=='BG' ? 'selected' : ''
                                                    }}>Bulgaria</option>
                                                <option value="BF" {{$seller->country=='BF' ? 'selected' : '' }}>Burkina
                                                    Faso</option>
                                                <option value="BI" {{$seller->country=='BI' ? 'selected' : '' }}>Burundi
                                                </option>
                                                <option value="KH" {{$seller->country=='KH' ? 'selected' : ''
                                                    }}>Cambodia</option>
                                                <option value="CM" {{$seller->country=='CM' ? 'selected' : ''
                                                    }}>Cameroon</option>
                                                <option value="CA" {{$seller->country=='CA' ? 'selected' : '' }}>Canada
                                                </option>
                                                <option value="CV" {{$seller->country=='CV' ? 'selected' : '' }}>Cape
                                                    Verde</option>
                                                <option value="KY" {{$seller->country=='KY' ? 'selected' : '' }}>Cayman
                                                    Islands</option>
                                                <option value="CF" {{$seller->country=='CF' ? 'selected' : '' }}>Central
                                                    African Republic</option>
                                                <option value="TD" {{$seller->country=='TD' ? 'selected' : '' }}>Chad
                                                </option>
                                                <option value="CL" {{$seller->country=='CL' ? 'selected' : '' }}>Chile
                                                </option>
                                                <option value="CN" {{$seller->country=='CN' ? 'selected' : '' }}>China
                                                </option>
                                                <option value="CX" {{$seller->country=='CX' ? 'selected' : ''
                                                    }}>Christmas Island</option>
                                                <option value="CC" {{$seller->country=='CC' ? 'selected' : '' }}>Cocos
                                                    (Keeling) Islands</option>
                                                <option value="CO" {{$seller->country=='CO' ? 'selected' : ''
                                                    }}>Colombia</option>
                                                <option value="KM" {{$seller->country=='KM' ? 'selected' : '' }}>Comoros
                                                </option>
                                                <option value="CG" {{$seller->country=='CG' ? 'selected' : '' }}>Congo
                                                </option>
                                                <option value="CD" {{$seller->country=='CD' ? 'selected' : '' }}>Congo,
                                                    the Democratic Republic of the</option>
                                                <option value="CK" {{$seller->country=='CK' ? 'selected' : '' }}>Cook
                                                    Islands</option>
                                                <option value="CR" {{$seller->country=='CR' ? 'selected' : '' }}>Costa
                                                    Rica</option>
                                                <option value="CI" {{$seller->country=='CI' ? 'selected' : '' }}>Côte
                                                    d'Ivoire</option>
                                                <option value="HR" {{$seller->country=='HR' ? 'selected' : '' }}>Croatia
                                                </option>
                                                <option value="CU" {{$seller->country=='CU' ? 'selected' : '' }}>Cuba
                                                </option>
                                                <option value="CW" {{$seller->country=='CW' ? 'selected' : '' }}>Curaçao
                                                </option>
                                                <option value="CY" {{$seller->country=='CY' ? 'selected' : '' }}>Cyprus
                                                </option>
                                                <option value="CZ" {{$seller->country=='CZ' ? 'selected' : '' }}>Czech
                                                    Republic</option>
                                                <option value="DK" {{$seller->country=='DK' ? 'selected' : '' }}>Denmark
                                                </option>
                                                <option value="DJ" {{$seller->country=='DJ' ? 'selected' : ''
                                                    }}>Djibouti</option>
                                                <option value="DM" {{$seller->country=='DM' ? 'selected' : ''
                                                    }}>Dominica</option>
                                                <option value="DO" {{$seller->country=='DO' ? 'selected' : ''
                                                    }}>Dominican Republic</option>
                                                <option value="EC" {{$seller->country=='EC' ? 'selected' : '' }}>Ecuador
                                                </option>
                                                <option value="EG" {{$seller->country=='EG' ? 'selected' : '' }}>Egypt
                                                </option>
                                                <option value="SV" {{$seller->country=='SV' ? 'selected' : '' }}>El
                                                    Salvador</option>
                                                <option value="GQ" {{$seller->country=='GQ' ? 'selected' : ''
                                                    }}>Equatorial Guinea</option>
                                                <option value="ER" {{$seller->country=='ER' ? 'selected' : '' }}>Eritrea
                                                </option>
                                                <option value="EE" {{$seller->country=='EE' ? 'selected' : '' }}>Estonia
                                                </option>
                                                <option value="ET" {{$seller->country=='ET' ? 'selected' : ''
                                                    }}>Ethiopia</option>
                                                <option value="FK" {{$seller->country=='FK' ? 'selected' : ''
                                                    }}>Falkland Islands (Malvinas)</option>
                                                <option value="FO" {{$seller->country=='FO' ? 'selected' : '' }}>Faroe
                                                    Islands</option>
                                                <option value="FJ" {{$seller->country=='FJ' ? 'selected' : '' }}>Fiji
                                                </option>
                                                <option value="FI" {{$seller->country=='FI' ? 'selected' : '' }}>Finland
                                                </option>
                                                <option value="FR" {{$seller->country=='FR' ? 'selected' : '' }}>France
                                                </option>
                                                <option value="GF" {{$seller->country=='GF' ? 'selected' : '' }}>French
                                                    Guiana</option>
                                                <option value="PF" {{$seller->country=='PF' ? 'selected' : '' }}>French
                                                    Polynesia</option>
                                                <option value="TF" {{$seller->country=='TF' ? 'selected' : '' }}>French
                                                    Southern Territories</option>
                                                <option value="GA" {{$seller->country=='GA' ? 'selected' : '' }}>Gabon
                                                </option>
                                                <option value="GM" {{$seller->country=='GM' ? 'selected' : '' }}>Gambia
                                                </option>
                                                <option value="GE" {{$seller->country=='GE' ? 'selected' : '' }}>Georgia
                                                </option>
                                                <option value="DE" {{$seller->country=='DE' ? 'selected' : '' }}>Germany
                                                </option>
                                                <option value="GH" {{$seller->country=='GH' ? 'selected' : '' }}>Ghana
                                                </option>
                                                <option value="GI" {{$seller->country=='GI' ? 'selected' : ''
                                                    }}>Gibraltar</option>
                                                <option value="GR" {{$seller->country=='GR' ? 'selected' : '' }}>Greece
                                                </option>
                                                <option value="GL" {{$seller->country=='GL' ? 'selected' : ''
                                                    }}>Greenland</option>
                                                <option value="GD" {{$seller->country=='GD' ? 'selected' : '' }}>Grenada
                                                </option>
                                                <option value="GP" {{$seller->country=='GP' ? 'selected' : ''
                                                    }}>Guadeloupe</option>
                                                <option value="GU" {{$seller->country=='GU' ? 'selected' : '' }}>Guam
                                                </option>
                                                <option value="GT" {{$seller->country=='GT' ? 'selected' : ''
                                                    }}>Guatemala</option>
                                                <option value="GG" {{$seller->country=='GG' ? 'selected' : ''
                                                    }}>Guernsey</option>
                                                <option value="GN" {{$seller->country=='GN' ? 'selected' : '' }}>Guinea
                                                </option>
                                                <option value="GW" {{$seller->country=='GW' ? 'selected' : ''
                                                    }}>Guinea-Bissau</option>
                                                <option value="GY" {{$seller->country=='GY' ? 'selected' : '' }}>Guyana
                                                </option>
                                                <option value="HT" {{$seller->country=='HT' ? 'selected' : '' }}>Haiti
                                                </option>
                                                <option value="HM" {{$seller->country=='HM' ? 'selected' : '' }}>Heard
                                                    Island and McDonald Islands</option>
                                                <option value="VA" {{$seller->country=='VA' ? 'selected' : '' }}>Holy
                                                    See (Vatican City State)</option>
                                                <option value="HN" {{$seller->country=='HN' ? 'selected' : ''
                                                    }}>Honduras</option>
                                                <option value="HK" {{$seller->country=='HK' ? 'selected' : '' }}>Hong
                                                    Kong</option>
                                                <option value="HU" {{$seller->country=='HU' ? 'selected' : '' }}>Hungary
                                                </option>
                                                <option value="IS" {{$seller->country=='IS' ? 'selected' : '' }}>Iceland
                                                </option>
                                                <option value="IN" {{$seller->country=='IN' ? 'selected' : '' }}>India
                                                </option>
                                                <option value="ID" {{$seller->country=='ID' ? 'selected' : ''
                                                    }}>Indonesia</option>
                                                <option value="IR" {{$seller->country=='IR' ? 'selected' : '' }}>Iran,
                                                    Islamic Republic of</option>
                                                <option value="IQ" {{$seller->country=='IQ' ? 'selected' : '' }}>Iraq
                                                </option>
                                                <option value="IE" {{$seller->country=='IE' ? 'selected' : '' }}>Ireland
                                                </option>
                                                <option value="IM" {{$seller->country=='IM' ? 'selected' : '' }}>Isle of
                                                    Man</option>
                                                <option value="IL" {{$seller->country=='IL' ? 'selected' : '' }}>Israel
                                                </option>
                                                <option value="IT" {{$seller->country=='IT' ? 'selected' : '' }}>Italy
                                                </option>
                                                <option value="JM" {{$seller->country=='JM' ? 'selected' : '' }}>Jamaica
                                                </option>
                                                <option value="JP" {{$seller->country=='JP' ? 'selected' : '' }}>Japan
                                                </option>
                                                <option value="JE" {{$seller->country=='JE' ? 'selected' : '' }}>Jersey
                                                </option>
                                                <option value="JO" {{$seller->country=='JO' ? 'selected' : '' }}>Jordan
                                                </option>
                                                <option value="KZ" {{$seller->country=='KZ' ? 'selected' : ''
                                                    }}>Kazakhstan</option>
                                                <option value="KE" {{$seller->country=='KE' ? 'selected' : '' }}>Kenya
                                                </option>
                                                <option value="KI" {{$seller->country=='KI' ? 'selected' : ''
                                                    }}>Kiribati</option>
                                                <option value="KP" {{$seller->country=='KP' ? 'selected' : '' }}>Korea,
                                                    Democratic People's Republic of</option>
                                                <option value="KR" {{$seller->country=='KR' ? 'selected' : '' }}>Korea,
                                                    Republic of</option>
                                                <option value="KW" {{$seller->country=='KW' ? 'selected' : '' }}>Kuwait
                                                </option>
                                                <option value="KG" {{$seller->country=='KG' ? 'selected' : ''
                                                    }}>Kyrgyzstan</option>
                                                <option value="LA" {{$seller->country=='LA' ? 'selected' : '' }}>Lao
                                                    People's Democratic Republic</option>
                                                <option value="LV" {{$seller->country=='LV' ? 'selected' : '' }}>Latvia
                                                </option>
                                                <option value="LB" {{$seller->country=='LB' ? 'selected' : '' }}>Lebanon
                                                </option>
                                                <option value="LS" {{$seller->country=='LS' ? 'selected' : '' }}>Lesotho
                                                </option>
                                                <option value="LR" {{$seller->country=='LR' ? 'selected' : '' }}>Liberia
                                                </option>
                                                <option value="LY" {{$seller->country=='LY' ? 'selected' : '' }}>Libya
                                                </option>
                                                <option value="LI" {{$seller->country=='LI' ? 'selected' : ''
                                                    }}>Liechtenstein</option>
                                                <option value="LT" {{$seller->country=='LT' ? 'selected' : ''
                                                    }}>Lithuania</option>
                                                <option value="LU" {{$seller->country=='LU' ? 'selected' : ''
                                                    }}>Luxembourg</option>
                                                <option value="MO" {{$seller->country=='MO' ? 'selected' : '' }}>Macao
                                                </option>
                                                <option value="MK" {{$seller->country=='MK' ? 'selected' : ''
                                                    }}>Macedonia, the former Yugoslav Republic of</option>
                                                <option value="MG" {{$seller->country=='MG' ? 'selected' : ''
                                                    }}>Madagascar</option>
                                                <option value="MW" {{$seller->country=='MW' ? 'selected' : '' }}>Malawi
                                                </option>
                                                <option value="MY" {{$seller->country=='MY' ? 'selected' : ''
                                                    }}>Malaysia</option>
                                                <option value="MV" {{$seller->country=='MV' ? 'selected' : ''
                                                    }}>Maldives</option>
                                                <option value="ML" {{$seller->country=='ML' ? 'selected' : '' }}>Mali
                                                </option>
                                                <option value="MT" {{$seller->country=='MT' ? 'selected' : '' }}>Malta
                                                </option>
                                                <option value="MH" {{$seller->country=='MH' ? 'selected' : ''
                                                    }}>Marshall Islands</option>
                                                <option value="MQ" {{$seller->country=='MQ' ? 'selected' : ''
                                                    }}>Martinique</option>
                                                <option value="MR" {{$seller->country=='MR' ? 'selected' : ''
                                                    }}>Mauritania</option>
                                                <option value="MU" {{$seller->country=='MU' ? 'selected' : ''
                                                    }}>Mauritius</option>
                                                <option value="YT" {{$seller->country=='YT' ? 'selected' : '' }}>Mayotte
                                                </option>
                                                <option value="MX" {{$seller->country=='MX' ? 'selected' : '' }}>Mexico
                                                </option>
                                                <option value="FM" {{$seller->country=='FM' ? 'selected' : ''
                                                    }}>Micronesia, Federated States of</option>
                                                <option value="MD" {{$seller->country=='MD' ? 'selected' : ''
                                                    }}>Moldova, Republic of</option>
                                                <option value="MC" {{$seller->country=='MC' ? 'selected' : '' }}>Monaco
                                                </option>
                                                <option value="MN" {{$seller->country=='MN' ? 'selected' : ''
                                                    }}>Mongolia</option>
                                                <option value="ME" {{$seller->country=='ME' ? 'selected' : ''
                                                    }}>Montenegro</option>
                                                <option value="MS" {{$seller->country=='MS' ? 'selected' : ''
                                                    }}>Montserrat</option>
                                                <option value="MA" {{$seller->country=='MA' ? 'selected' : '' }}>Morocco
                                                </option>
                                                <option value="MZ" {{$seller->country=='MZ' ? 'selected' : ''
                                                    }}>Mozambique</option>
                                                <option value="MM" {{$seller->country=='MM' ? 'selected' : '' }}>Myanmar
                                                </option>
                                                <option value="NA" {{$seller->country=='NA' ? 'selected' : '' }}>Namibia
                                                </option>
                                                <option value="NR" {{$seller->country=='NR' ? 'selected' : '' }}>Nauru
                                                </option>
                                                <option value="NP" {{$seller->country=='NP' ? 'selected' : '' }}>Nepal
                                                </option>
                                                <option value="NL" {{$seller->country=='NL' ? 'selected' : ''
                                                    }}>Netherlands</option>
                                                <option value="NC" {{$seller->country=='NC' ? 'selected' : '' }}>New
                                                    Caledonia</option>
                                                <option value="NZ" {{$seller->country=='NZ' ? 'selected' : '' }}>New
                                                    Zealand</option>
                                                <option value="NI" {{$seller->country=='NI' ? 'selected' : ''
                                                    }}>Nicaragua</option>
                                                <option value="NE" {{$seller->country=='NE' ? 'selected' : '' }}>Niger
                                                </option>
                                                <option value="NG" {{$seller->country=='NG' ? 'selected' : '' }}>Nigeria
                                                </option>
                                                <option value="NU" {{$seller->country=='NU' ? 'selected' : '' }}>Niue
                                                </option>
                                                <option value="NF" {{$seller->country=='NF' ? 'selected' : '' }}>Norfolk
                                                    Island</option>
                                                <option value="MP" {{$seller->country=='MP' ? 'selected' : ''
                                                    }}>Northern Mariana Islands</option>
                                                <option value="NO" {{$seller->country=='NO' ? 'selected' : '' }}>Norway
                                                </option>
                                                <option value="OM" {{$seller->country=='OM' ? 'selected' : '' }}>Oman
                                                </option>
                                                <option value="PK" {{$seller->country=='PK' ? 'selected' : ''
                                                    }}>Pakistan</option>
                                                <option value="PW" {{$seller->country=='PW' ? 'selected' : '' }}>Palau
                                                </option>
                                                <option value="PS" {{$seller->country=='PS' ? 'selected' : ''
                                                    }}>Palestinian Territory, Occupied</option>
                                                <option value="PA" {{$seller->country=='PA' ? 'selected' : '' }}>Panama
                                                </option>
                                                <option value="PG" {{$seller->country=='PG' ? 'selected' : '' }}>Papua
                                                    New Guinea</option>
                                                <option value="PY" {{$seller->country=='PY' ? 'selected' : ''
                                                    }}>Paraguay</option>
                                                <option value="PE" {{$seller->country=='PE' ? 'selected' : '' }}>Peru
                                                </option>
                                                <option value="PH" {{$seller->country=='PH' ? 'selected' : ''
                                                    }}>Philippines</option>
                                                <option value="PN" {{$seller->country=='PN' ? 'selected' : ''
                                                    }}>Pitcairn</option>
                                                <option value="PL" {{$seller->country=='PL' ? 'selected' : '' }}>Poland
                                                </option>
                                                <option value="PT" {{$seller->country=='PT' ? 'selected' : ''
                                                    }}>Portugal</option>
                                                <option value="PR" {{$seller->country=='PR' ? 'selected' : '' }}>Puerto
                                                    Rico</option>
                                                <option value="QA" {{$seller->country=='AQA' ? 'selected' : '' }}>Qatar
                                                </option>
                                                <option value="RE" {{$seller->country=='RE' ? 'selected' : '' }}>Réunion
                                                </option>
                                                <option value="RO" {{$seller->country=='RO' ? 'selected' : '' }}>Romania
                                                </option>
                                                <option value="RU" {{$seller->country=='RU' ? 'selected' : '' }}>Russian
                                                    Federation</option>
                                                <option value="RW" {{$seller->country=='RW' ? 'selected' : '' }}>Rwanda
                                                </option>
                                                <option value="BL" {{$seller->country=='BL' ? 'selected' : '' }}>Saint
                                                    Barthélemy</option>
                                                <option value="SH" {{$seller->country=='SH' ? 'selected' : '' }}>Saint
                                                    Helena, Ascension and Tristan da Cunha</option>
                                                <option value="KN" {{$seller->country=='KN' ? 'selected' : '' }}>Saint
                                                    Kitts and Nevis</option>
                                                <option value="LC" {{$seller->country=='LC' ? 'selected' : '' }}>Saint
                                                    Lucia</option>
                                                <option value="MF" {{$seller->country=='MF' ? 'selected' : '' }}>Saint
                                                    Martin (French part)</option>
                                                <option value="PM" {{$seller->country=='PM' ? 'selected' : '' }}>Saint
                                                    Pierre and Miquelon</option>
                                                <option value="VC" {{$seller->country=='VC' ? 'selected' : '' }}>Saint
                                                    Vincent and the Grenadines</option>
                                                <option value="WS" {{$seller->country=='WS' ? 'selected' : '' }}>Samoa
                                                </option>
                                                <option value="SM" {{$seller->country=='SM' ? 'selected' : '' }}>San
                                                    Marino</option>
                                                <option value="ST" {{$seller->country=='ST' ? 'selected' : '' }}>Sao
                                                    Tome and Principe</option>
                                                <option value="SA" {{$seller->country=='SA' ? 'selected' : '' }}>Saudi
                                                    Arabia</option>
                                                <option value="SN" {{$seller->country=='SN' ? 'selected' : '' }}>Senegal
                                                </option>
                                                <option value="RS" {{$seller->country=='RS' ? 'selected' : '' }}>Serbia
                                                </option>
                                                <option value="SC" {{$seller->country=='SC' ? 'selected' : ''
                                                    }}>Seychelles</option>
                                                <option value="SL" {{$seller->country=='SL' ? 'selected' : '' }}>Sierra
                                                    Leone</option>
                                                <option value="SG" {{$seller->country=='SG' ? 'selected' : ''
                                                    }}>Singapore</option>
                                                <option value="SX" {{$seller->country=='SX' ? 'selected' : '' }}>Sint
                                                    Maarten (Dutch part)</option>
                                                <option value="SK" {{$seller->country=='SK' ? 'selected' : ''
                                                    }}>Slovakia</option>
                                                <option value="SI" {{$seller->country=='SI' ? 'selected' : ''
                                                    }}>Slovenia</option>
                                                <option value="SB" {{$seller->country=='SB' ? 'selected' : '' }}>Solomon
                                                    Islands</option>
                                                <option value="SO" {{$seller->country=='SO' ? 'selected' : '' }}>Somalia
                                                </option>
                                                <option value="ZA" {{$seller->country=='ZA' ? 'selected' : '' }}>South
                                                    Africa</option>
                                                <option value="GS" {{$seller->country=='GS' ? 'selected' : '' }}>South
                                                    Georgia and the South Sandwich Islands</option>
                                                <option value="SS" {{$seller->country=='SS' ? 'selected' : '' }}>South
                                                    Sudan</option>
                                                <option value="ES" {{$seller->country=='ES' ? 'selected' : '' }}>Spain
                                                </option>
                                                <option value="LK" {{$seller->country=='LK' ? 'selected' : '' }}>Sri
                                                    Lanka</option>
                                                <option value="SD" {{$seller->country=='SD' ? 'selected' : '' }}>Sudan
                                                </option>
                                                <option value="SR" {{$seller->country=='SR' ? 'selected' : ''
                                                    }}>Suriname</option>
                                                <option value="SJ" {{$seller->country=='SJ' ? 'selected' : ''
                                                    }}>Svalbard and Jan Mayen</option>
                                                <option value="SZ" {{$seller->country=='SZ' ? 'selected' : ''
                                                    }}>Swaziland</option>
                                                <option value="SE" {{$seller->country=='SE' ? 'selected' : '' }}>Sweden
                                                </option>
                                                <option value="CH" {{$seller->country=='CH' ? 'selected' : ''
                                                    }}>Switzerland</option>
                                                <option value="SY" {{$seller->country=='SY' ? 'selected' : '' }}>Syrian
                                                    Arab Republic</option>
                                                <option value="TW" {{$seller->country=='TW' ? 'selected' : '' }}>Taiwan,
                                                    Province of China</option>
                                                <option value="TJ" {{$seller->country=='TJ' ? 'selected' : ''
                                                    }}>Tajikistan</option>
                                                <option value="TZ" {{$seller->country=='TZ' ? 'selected' : ''
                                                    }}>Tanzania, United Republic of</option>
                                                <option value="TH" {{$seller->country=='TH' ? 'selected' : ''
                                                    }}>Thailand</option>
                                                <option value="TL" {{$seller->country=='TL' ? 'selected' : ''
                                                    }}>Timor-Leste</option>
                                                <option value="TG" {{$seller->country=='TG' ? 'selected' : '' }}>Togo
                                                </option>
                                                <option value="TK" {{$seller->country=='TK' ? 'selected' : '' }}>Tokelau
                                                </option>
                                                <option value="TO" {{$seller->country=='TO' ? 'selected' : '' }}>Tonga
                                                </option>
                                                <option value="TT" {{$seller->country=='TT' ? 'selected' : ''
                                                    }}>Trinidad and Tobago</option>
                                                <option value="TN" {{$seller->country=='TN' ? 'selected' : '' }}>Tunisia
                                                </option>
                                                <option value="TR" {{$seller->country=='TR' ? 'selected' : '' }}>Turkey
                                                </option>
                                                <option value="TM" {{$seller->country=='TM' ? 'selected' : ''
                                                    }}>Turkmenistan</option>
                                                <option value="TC" {{$seller->country=='TC' ? 'selected' : '' }}>Turks
                                                    and Caicos Islands</option>
                                                <option value="TV" {{$seller->country=='TV' ? 'selected' : '' }}>Tuvalu
                                                </option>
                                                <option value="UG" {{$seller->country=='UG' ? 'selected' : '' }}>Uganda
                                                </option>
                                                <option value="UA" {{$seller->country=='UA' ? 'selected' : '' }}>Ukraine
                                                </option>
                                                <option value="AE" {{$seller->country=='AE' ? 'selected' : '' }}>United
                                                    Arab Emirates</option>
                                                <option value="GB" {{$seller->country=='GB' ? 'selected' : '' }}>United
                                                    Kingdom</option>
                                                <option value="US" {{$seller->country=='US' ? 'selected' : '' }}>United
                                                    States</option>
                                                <option value="UM" {{$seller->country=='UM' ? 'selected' : '' }}>United
                                                    States Minor Outlying Islands</option>
                                                <option value="UY" {{$seller->country=='UY' ? 'selected' : '' }}>Uruguay
                                                </option>
                                                <option value="UZ" {{$seller->country=='UZ' ? 'selected' : ''
                                                    }}>Uzbekistan</option>
                                                <option value="VU" {{$seller->country=='VU' ? 'selected' : '' }}>Vanuatu
                                                </option>
                                                <option value="VE" {{$seller->country=='VE' ? 'selected' : ''
                                                    }}>Venezuela, Bolivarian Republic of</option>
                                                <option value="VN" {{$seller->country=='VN' ? 'selected' : '' }}>Viet
                                                    Nam</option>
                                                <option value="VG" {{$seller->country=='VG' ? 'selected' : '' }}>Virgin
                                                    Islands, British</option>
                                                <option value="VI" {{$seller->country=='VI' ? 'selected' : '' }}>Virgin
                                                    Islands, U.S.</option>
                                                <option value="WF" {{$seller->country=='WF' ? 'selected' : '' }}>Wallis
                                                    and Futuna</option>
                                                <option value="EH" {{$seller->country=='EH' ? 'selected' : '' }}>Western
                                                    Sahara</option>
                                                <option value="YE" {{$seller->country=='YE' ? 'selected' : '' }}>Yemen
                                                </option>
                                                <option value="ZM" {{$seller->country=='ZM' ? 'selected' : '' }}>Zambia
                                                </option>
                                                <option value="ZW" {{$seller->country=='ZW' ? 'selected' : ''
                                                    }}>Zimbabwe</option>
                                            </select>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <button type="submit" class="btn btn-success">Update</button>
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
