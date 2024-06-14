@extends('layout')
@section('body')
<div class="arah-white-circle"></div>
<div class="row">
    <div class="container">
        <div class="row">
            <div class="col-12 offset-md-1 col-md-10">
                <h1 class="large-h1">{{__("auth.ARAH")}}<br>{{__("auth.Registration Page")}}</h1>
                <p class="title-desc">{{__('auth.Welcome to the official Registration Page for the ARAH Coin and complimentary insurance package for qualified NU members and friends')}}</p>
                <p class="title-desc">{{__("auth.Disclaimer: Arah official team reserved our rights to reject any incomplete or improper registration form and may request for verification of identity before issue of the above package")}}</p>
                <p class="title-desc"><small>{{__("auth.Note: The ARAH Coin will reside on Waves blockchain, which is in the process of interlinking with other international blockchains to form the largest multi-linked blockchain in the world.")}}</small></p>
                <hr class='white-hr'>
            </div>
            
            <form method="POST" action="{{ route('register') }}" class="col-12 offset-md-1 col-md-8 register-form">
                @csrf
                <div class="alert">{!! session()->get('error') !!}</div>
                <div class="form-group">
                    <label for="name" >{{__('auth.Full Name')}}*</label>
                    <input type="text" class="form-control" id="name" name="name" :value="old('name')" required autofocus>
                    @error('name')
                        <div class="alert">{{ $message }}</div>
                    @enderror
                </div>

                <div class="form-group">
                    <label for="email_account" >{{__('auth.Email')}}*</label>
                    <input type="email" class="form-control" id="email" aria-describedby="email_accountHelp" name="email_account" :value="old('email_account')" required >
                    <small id="email_accountHelp" class="form-text text-white">{{__("auth.We'll never share your email with anyone else.")}}</small>
                    @error('email_account')
                        <div class="alert">{{ $message }}</div>
                    @enderror
                </div>

                <div class="form-group">
                    <label for="phone" class="mb-0px">{{__('auth.Mobile Phone (for mobile app purpose)')}}*</label>
                    <small class="form-text text-white mt-0px">{{__("auth.(including country code e.g. +622165390605)")}}</small>
                    <input type="text" class="form-control" id="phone" aria-describedby="phoneHelp" name="phone" :value="old('phone')" required >
                    <small id="phoneHelp" class="form-text text-white">{{__("auth.Note: Kindly retain this phone number as it may be required for future contact.")}}</small>
                    @error('phone')
                        <div class="alert">{{ $message }}</div>
                    @enderror
                </div>

                <div class="form-group">
                    <label for="nric">{{__('auth.ID number or passport number (for verification purpose when issuing package)')}}</label>
                    <input type="text" class="form-control" id="nric" name="nric" :value="old('nric')" >
                    @error('nric')
                        <div class="alert">{{ $message }}</div>
                    @enderror
                </div>

                <div class="form-group">
                    <label for="dob" class="mb-0px">{{__('auth.Date Of Birth (for verification purpose when issuing package)')}}</label>
                    <input type="text" class="form-control" id="dob" name="dob" :value="old('dob')" autocomplete="off" >
                    @error('dob')
                        <div class="alert">{{ $message }}</div>
                    @enderror
                </div>

                <div class="form-group">
                    <label class="clear-both display-block" >{{__('auth.Gender')}}</label>
                    <div class="form-check">
                        <input class="form-check-input" type="radio" name="gender" id="male" value="male" checked>
                        <label class="form-check-label" for="male">
                        {{__("auth.Male")}}
                        </label>
                    </div>
                    <div class="form-check" for="female">
                        <input class="form-check-input" type="radio" name="gender" id="female" value="female">
                        <label class="form-check-label" for="female">
                        {{__("auth.Female")}}
                        </label>
                    </div>
                </div>

                <div class="form-group clear-both display-block">
                    <label class="mt-20px" for="occupation">{{__("auth.Occupation (optional)")}}</label>
                    <select class="form-control" id="occupation" name="occupation">
                        <option>Accountant</option>
                        <option>Actor / Actress</option>
                        <option>Architect</option>
                        <option>Author</option>
                        <option>Baker</option>
                        <option>Bricklayer</option>
                        <option>Bus driver</option>
                        <option>Butcher</option>
                        <option>Carpenter</option>
                        <option>Chef/Cook</option>
                        <option>Cleaner</option>
                        <option>Dentist</option>
                        <option>Designer</option>
                        <option>Doctor</option>
                        <option>Dustman/Refuse collector</option>
                        <option>Electrician</option>
                        <option>Factory worker</option>
                        <option>Farmer</option>
                        <option>Fireman/Fire fighter</option>
                        <option>Fisherman</option>
                        <option>Florist</option>
                        <option>Gardener</option>
                        <option>Hairdresser</option>
                        <option>Journalist</option>
                        <option>Judge</option>
                        <option>Lawyer</option>
                        <option>Lecturer </option>
                        <option>Librarian</option>
                        <option>Lifeguard</option>
                        <option>Mechanic</option>
                        <option>Model</option>
                        <option>Newsreader</option>
                        <option>Nurse</option>
                        <option>Optician</option>
                        <option>Painter</option>
                        <option>Pharmacist</option>
                        <option>Photographer</option>
                        <option>Pilot</option>
                        <option>Plumber</option>
                        <option>Politician</option>
                        <option>Policeman/Policewoman</option>
                        <option>Postman</option>
                        <option>Real estate agent</option>
                        <option>Receptionist </option>
                        <option>Scientist</option>
                        <option>Secretary</option>
                        <option>Shop assistant</option>
                        <option>Soldier</option>
                        <option>Software Engineer</option>
                        <option>Tailor</option>
                        <option>Taxi driver</option>
                        <option>Teacher</option>
                        <option>Translator</option>
                        <option>Traffic warden</option>
                        <option>Travel agent</option>
                        <option>Veterinary doctor (Vet)</option>
                        <option>Waiter/Waitress</option>
                    </select>
                </div>

                <div class="form-group">
                    <label for="income">{{__("auth.Estimate Annual Income (Rupiah)")}}</label>
                    <select class="form-control" id="income" name="income">
                        <option>< 14,000,000 </option>
                        <option>14,000,000 ~ 42,000,000</option>
                        <option>42,000,000 ~ 70,000,000</option>
                        <option>70,000,000 ~ 140,000,000</option>
                        <option>140,000,000 ~ 281,000,000</option>
                        <option>281,000,000 ~ 422,000,000</option>
                        <option>422,000,000 ~ 704,000,000</option>
                        <option>> 704,000,000</option>
                    </select>
                </div>

                <div class="form-group">
                    <label for="state">{{__("auth.State of residency in Indonesia (optional)")}}</label>
                    <select class="form-control" id="state" name="state">
                        <option>Aceh</option>
                        <option>Bali</option>
                        <option>Bangka-Belitung</option>
                        <option>Banten</option>
                        <option>Bengkulu</option>
                        <option>Central Java</option>
                        <option>Central Sulawesi</option>
                        <option>Daerah Istimewa Yogyakarta</option>
                        <option>East Java</option>
                        <option>East Kalimantan</option>
                        <option>East Nusa Tenggara</option>
                        <option>Gorontalo</option>
                        <option>Jakarta Raya</option>
                        <option>Jambi</option>
                        <option>Kalimantan Tengah</option>
                        <option>Lampung</option>
                        <option>Maluku</option>
                        <option>Maluku Utara</option>
                        <option>North Sulawesi</option>
                        <option>North Sumatra</option>
                        <option>Nusa Tenggara Barat</option>
                        <option>Papua</option>
                        <option>Riau</option>
                        <option>Riau Islands</option>
                        <option>South Kalimantan</option>
                        <option>South Sulawesi</option>
                        <option>South Sumatra</option>
                        <option>Sulawesi Barat</option>
                        <option>Sulawesi Tenggara</option>
                        <option>West Java</option>
                        <option>West Kalimantan</option>
                        <option>West Papua</option>
                        <option>West Sumatra</option>
                        <option>Others</option>
                    </select>
                </div>

                <div class="form-group others-residency-wrapper" style="display:none;">
                    <label for="others-residency" class="mb-0px">{{__('auth.Others Residency')}}</label>
                    <input type="text" class="form-control" id="others-residency" name="others-residency" :value="old('others-residency')">
                    @error('others-residency')
                        <div class="alert">{{ $message }}</div>
                    @enderror
                </div>

                <!--div class="form-group">
                    <label for="password" >{{__('Password')}}</label>
                    <input id="password" type="password" class="form-control" name="password" required >
                    @error('password')
                        <div class="alert">{{ $message }}</div>
                    @enderror
                </div>

                <div class="form-group">
                    <label for="password_confirmation" >{{__('auth.Confirm Password')}}</label>
                    <input id="password_confirmation" type="password" class="form-control" name="password_confirmation" required>
                    @error('password_confirmation')
                        <div class="alert">{{ $message }}</div>
                    @enderror
                </div-->

                <div class="form-group overflow-auto">
                    <label class="clear-both display-block" >{{__('auth.Kindly select one of the following:')}}</label>
                    <div class="form-check">
                        <input class="form-check-input" type="radio" name="nu_member" id="nu_member1" value="nu_member1" checked>
                        <label class="form-check-label" for="nu_member1">
                        {{__("auth.I am an existing NU member")}}
                        </label>
                    </div>
                    <div class="form-check">
                        <input class="form-check-input" type="radio" name="nu_member" id="nu_member2" value="nu_member2">
                        <label class="form-check-label" for="nu_member2">
                        {{__("auth.I am a member of the public")}}
                        </label>
                    </div>
                </div>
                
                <!--div class="form-group clear-both display-block">
                    <label for="interested_quantity" >{{__('auth.Kindly enter the USD($) amount of ARAH Coins that you are interested to purchase:')}}</label>
                    <input type="number" class="form-control" id="interested_quantity" placeholder="USD" aria-describedby="interested_quantityHelp" name="interested_quantity" :value="old('interested_quantity')">
                    <small id="interested_quantityHelp" class="form-text text-white">{{__("auth.Note: Please note that our representative will be personally contact you via the mobile phone number entered above should you be shortlisted to join our exclusive pre-launch sales group.")}}</small>
                </div-->
                
                
                <!--div class="form-group ">
                    <label for="email_array" >{{__('auth.If you are interested in sharing this opportunity with your friends, kindly enter their emails in the field below (Max 20 emails):')}}</label>
                    <input type="email" class="form-control email_array" aria-describedby="email_arrayHelp" name="email_array[]" :value="old('email_array')">
                    <button type="button" class="form-control add-email" >+ {{__("auth.Add Another Email")}}</button>
                </div-->

                <div class="flex items-center justify-end mt-4">
                    <!--a class="underline text-sm text-gray-600 hover:text-gray-900" href="{{ route('login') }}">
                        {{ __('Already registered?') }}
                    </a-->
                    <button class="green-btn">
                        {{ __('auth.Submit') }}
                    </button>
                </div>
                <small><i>{{__("auth.All information will be kept confident and only for the purpose for the issuing of the above package")}}</i></small>
            </form>
        </div>
        @include('landing-subscribe')
    </div>
</div>
<script>
    $(document).ready(function(){
        $(".add-email").click(function(){
            if($(".email_array").length<=20){
                cloned = $(".email_array").first().clone();
                $(cloned).insertBefore(this);
            }
        });
        $("#dob").datepicker({
            changeMonth: true,
            changeYear: true,
            yearRange: "1930:2021"
        });
        $("#state").change(function(){
            if($('#state option:selected').text() == "Others"){
                $(".others-residency-wrapper").show();
            }
            else{
                $(".others-residency-wrapper").hide();
            }
        });
    });
</script>
@endsection

