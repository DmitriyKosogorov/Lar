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


<form method="POST" action="correct_login">
@csrf
<div>
	<div>Имя пользователя</div>
	<div><input type='text' id='name' name='name'></div>
	<div>Пароль</div>
	<div><input type='text' id='password' name='password'></div>
	<div><button type="submit">Log In</button></div>
</div>
</form>
<div>
<a href='/register'>Зарегитрироваться</a>
</div>
@endsection