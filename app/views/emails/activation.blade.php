@lang('messages.email_activation', array('urlSite' => Config::get('app.url')))
<a href="{{ $activationUrl }}">{{ $activationUrl }}</a>
