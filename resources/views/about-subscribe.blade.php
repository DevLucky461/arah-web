<div class="row">
    <div class="col-12 offset-md-1 col-md-8 subscribe-wrapper">
        <form class="form-group subscribe-form" method="post" action="/">
            @csrf
            <p class="subscribe-title">{{__('landing.Join the Community!')}}</p>
            <p class="subscribe-desc">{{__('landing.Drop your email to stay updated.')}}</p>
            <div class="subscribe-btn-wrapper">
                <input type="email" name='email' class="subscribe-input" placeholder="{{__('landing.Email')}}"><input type="submit" class="btn btn-subscribe" value="{{__('landing.Submit')}}"/>
                @error('email')
                    <div class="alert">{{ __('landing.Invalid Email') }}</div>
                @enderror
                @if($status=='success')
                    <div class="success">{{__('landing.Succcessfully registered.') }}</div>
                @endif
                @if($status=='failed')
                    <div class="alert">{{__('landing.Duplicated email.') }}</div>
                @endif
            </div>
        </form>
    </div>
</div>
@error('email')
<script>
    $(document).ready(function(){
        window.scrollTo(0,document.body.scrollHeight);
    });
</script>
@enderror
@if($status=='success')
<script>
    $(document).ready(function(){
        window.scrollTo(0,document.body.scrollHeight);
    });
</script>
@endif
@if($status=='failed')
<script>
    $(document).ready(function(){
        window.scrollTo(0,document.body.scrollHeight);
    });
</script>
@endif