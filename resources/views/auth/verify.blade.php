@extends('layouts.app')

@section('mainContents')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">@lang('auth.verify_your_email_address')</div>

                <div class="card-body">
                    @if (session('resent'))
                        <div class="alert alert-success" role="alert">
                            @lang('auth.a_fresh_verification_link_has_been_sent_to_your_email_address')
                        </div>
                    @endif

                    @lang('auth.before_proceeding_please_check_your_email_for_a_verification_link')
                    @lang('auth.if_you_did_not_receive_the_email'), <a href="{{ route('verification.resend') }}">@lang('auth.click_here_to_request_another')</a>.
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
