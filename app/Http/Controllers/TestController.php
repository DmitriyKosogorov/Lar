<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\TestModel1;
use Event;
use App\Events\onRegisterEvent;

class TestController extends Controller
{
    public function login()
	{
		return view('login');
	}
	
	public function try_register(Request $request)
	{
				$correction=$request->validate([
										'name' => 'required|min:3|max:15',
										'password' => 'required|min:3|max:15'
										]);
		$check = DB::table('clients')->where('name', $request->input('name'))->first();
		if($check===null)
		{
			$log=new TestModel1();
			$log->name=$request->input('name');
			$log->password=$request->input('password');
			$log->status='user';
			$log->save();
			Event::fire(new onRegisterEvent($request->input('name')));
			return(redirect()->route('login'));
		}
		else
		{
			return(redirect()->route('wrong_register'));
		}
	}
	
	public function correct_login(Request $request)
	{
		$correction=$request->validate([
										'name' => 'required|min:3|max:15',
										'password' => 'required|min:3|max:15'
										]);
		$check = DB::table('clients')->where('name', $request->input('name'))->where('password', $request->input('password'))->first();
		if($check===null)
		{
			return(redirect()->route('wrong_login'));
		}
		else
		{
			session(['registered'=>'yes']);
			if($check->status==='admin')
			{
				session(['registered'=>'admin']);
				return(redirect()->route('admin'));
			}
			return(redirect()->route('main'));
			
		}
	}
	
	public function admin()
	{
		if(session()->has('registered') and session('registered')==='admin')
			return view('admin');
		else
			return view('wrong_admin');
	}
}
