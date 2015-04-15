<!DOCTYPE html>
<html lang="en-US">
	<head>
		<meta charset="utf-8">
	</head>
	<body>
		<h2>@lang('action.password.forgot')</h2>

		<div>
			@lang('action.go_to_reset_password'): {{ URL::to('password/reset', array($token)) }}.
		</div>
	</body>
</html>
