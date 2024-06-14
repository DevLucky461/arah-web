<style>
    .coin-alert{
        color:red;
    }
</style>
<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            Balance Coins: {{number_format( $coin_account->balance , 0 , '.' , ',' )}}
        </h2>
        @if (session('error'))
        <div class="coin-alert">{{ session('error') }}</div>
        @endif
    </x-slot>
    @role('user')
        
    @endrole

    @role('moderator')
    <div class="container-fluid">
        <div class="row">
            <div class="col-12">
                <div class="mt-40px">
                    <button class="dt-button buttons-csv buttons-html5 btn-history" type="button"><span>History</span></button>
                    <button class="dt-button buttons-csv buttons-html5 btn-new-buyer" type="button"><span>New Buyer</span></button>
                </div>
            </div>
            <div class="col-12 col-sugar-daddy" @if($errors->any()) style="display:none;" @endif>
                <div class="mt-40px">
                    <table id='sugar_daddy'>
                        <thead>
                            <tr>
                                <th>Serial Number</th>
                                <th>Name</th>
                                <th>Amount Paid</th>
                                <th>Coin Quantity</th>
                            </tr>
                        </thead>
                        <tbody class='dt-body'>
                            @foreach($coin_holder as $single_record)
                                <tr>
                                    <td><a href="/get-certificate/{{$single_record->serial_number}}" target="_blank">{{$single_record->serial_number}}</a></td>
                                    <td>{{$single_record->buyer->name}}</td>
                                    <td align="right">{{number_format($single_record->amount_purchased, 0 , '.' , ',' )}}</td>
                                    <td align="right">{{number_format($single_record->coin_quantity, 0 , '.' , ',' )}}</td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
            <div class="col-12 col-soon-to-be" @if(!$errors->any()) style="display:none;" @endif>
                <form action="/dashboard" method="post">
                    @csrf
                    <div class="form-group">
                        <label for="name">Name</label>
                        <input type="text" class="form-control" id="name" name='name' aria-describedby="nameHelp" placeholder="Enter name">
                        <small id="nameHelp" class="form-text text-muted">Full name according to NRIC/Passport/ID</small>
                        @error('name')
                        <div class="coin-alert">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="email">Email address</label>
                        <input type="email" class="form-control" id="email" name='email' aria-describedby="emailHelp" placeholder="Enter email">
                        <small id="emailHelp" class="form-text text-muted">We'll never share your email with anyone else.</small>
                        @error('email')
                        <div class="coin-alert">{{ __('landing.Invalid Email') }}</div>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="phone">Phone number</label>
                        <input type="text" class="form-control" id="phone" name='phone' placeholder="Enter phone">
                        @error('phone')
                        <div class="coin-alert">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="nric">NRIC/Passport/ID</label>
                        <input type="text" class="form-control" id="nric" name='nric' placeholder="Enter NRIC/Passport/ID">
                        @error('nric')
                        <div class="coin-alert">{{ $message }}</div>
                        @enderror
                    </div>
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
                    <div class="form-group">
                        <label for="amount_purchased">Amount purchase (SGD)</label>
                        <input type="number" class="form-control" id="amount_purchased" name='amount_purchased' placeholder="Enter amount">
                        @error('amount_purchased')
                        <div class="coin-alert">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="coin_quantity">Coin quantity</label>
                        <input type="number" class="form-control" id="coin_quantity" name='coin_quantity' placeholder="Enter quantity">
                        @error('coin_quantity')
                        <div class="coin-alert">{{ $message }}</div>
                        @enderror
                    </div>
                    <button type="submit" class="btn btn-primary">Submit</button>
                </form>
            </div>
        </div>
    </div>
    @endrole
    

</x-app-layout>
<script>
    $(document).ready(function(){
        $("#sugar_daddy").DataTable( {
            dom: 'Bfrtip',
            buttons: [
                'csv', 'excel', 'pdf'
            ]
        } );
        $(".btn-history").click(function(){
            $(".col-sugar-daddy").show();
            $(".col-soon-to-be").hide();
        });
        $(".btn-new-buyer").click(function(){
            $(".col-sugar-daddy").hide();
            $(".col-soon-to-be").show();
        });

    });
</script>