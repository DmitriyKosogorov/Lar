@extends('shablon')

@section('title') Login @endsection

@section('shtuka')


@if($errors->any())
	<div>
		<ul>
		@foreach($errors->all() as $error)
			<li>{{$error}}</li>
		@endforeach
		</ul>
	</div>
@endif

<div>Имя уже занято</div>
<form method="POST" action="register">
@csrf
<div>
	<div>Имя пользователя</div>
	<div><input type='text' id='name' name='name'></div>
	<div>Пароль</div>
	<div><input type='text' id='password' name='password'></div>
	<div><button type="submit">Register</button></div>
</div>
</form>
<div>
<a href='/login'>Login</a>
</div>
@endsection