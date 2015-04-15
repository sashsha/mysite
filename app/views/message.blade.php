@extends('layout')

@section('content')
<div class="jumbotron">
    <div class="container">
        <p>{{ $message }}</p>

        @if ($redirect)
        <script type="application/javascript">
            setTimeout(
                function() {
                    location.href = '{{ $redirect }}';
                },
                5000
            );
        </script>
        <p class="like-h">@lang('action.click_redirect', array('redirect' => $redirect))</p>
        @endif
    </div>
</div>
@stop
