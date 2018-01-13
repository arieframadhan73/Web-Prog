<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Tukang;
use App\User;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
class PagesController extends Controller
{
    public function getHome()
    {
        $tukangs = Tukang::paginate(4);
        return view('welcome',compact('tukangs'));
    }
    public function getHomeTukang()
    {
        return view('tukang.home');
    }
    public function getLogin()
    {
        return view('user.login');
    }
    public function getTukangLogin()
    {
        return view('tukang.login');
    }
    public function getRegister()
    {
        return view('user.register');
    }
    public function getTukangRegister()
    {
        return view('tukang.register');
    }
    public function postLogin(Request $request)
    {
        $validate = Validator::make($request->all(),[
            'email' => 'required',
            'password' => 'required',
        ]);

        if(!$validate->fails())
        {
            $credentials = ['email'=>$request->get('email'),'password'=>$request->get('password')];

            if(Auth::guard('web')->attempt($credentials))
            {
                return redirect('/')->with('status','Welcome '.Auth::guard('web')->user()->name);
            }
            else{
                return redirect()->back()->with('status','Email or Password Invalid');
            }
        }
        else{
            return redirect()->back()->withErrors($validate);
        }
    }
    public function postTukangLogin(Request $request)
    {
        $validate = Validator::make($request->all(),[
            'no_ktp' => 'required',
            'password' => 'required',
        ]);

        if(!$validate->fails())
        {
            $credentials = ['no_ktp'=>$request->get('no_ktp'),'password'=>$request->get('password')];

            if(Auth::guard('tukang')->attempt($credentials))
            {
                return redirect('/tukang/home')->with('status','Welcome '.Auth::guard('tukang')->user()->name);
            }
            else{
                return redirect()->back()->with('status','No KTP or Password Invalid');
            }
        }else{
            return redirect()->back()->withErrors($validate);
        }
    }
    public function postRegister(Request $request)
    {
        $validate = Validator::make($request->all(),[
            'name'  => 'required|min:5',
            'email' => 'required|email|unique:users',
            'password'=>'required|alpha_num|min:5|confirmed',
            'gender' => 'required|in:male,female',
            'address'=>'required|min:10',
            'picture'=>'image',
            'phone' =>'required|numeric',
        ]);

        if(!$validate->fails())
        {
            $file = $request['picture'];
            if($file)
            {
                $filename = $file->getClientOriginalName();
                Storage::put($filename,File::get($file));
            }
            $user = new User();
            $user->name     = $request->get('name');
            $user->email    = $request->get('email');
            $user->password = bcrypt($request->get('password'));
            $user->gender   = $request->get('gender');
            $user->address  = $request->get('address');
            $user->picture  = $filename;
            $user->phone    = $request->get('phone');
            $user->save();

            $credentials = ['email'=>$request->get('email'),'password'=>$request->get('password')];

            if(Auth::guard('web')->attempt($credentials))
            {
                return redirect('/')->with('status','Welcome '.Auth::guard('web')->user()->name);
            }
        }
        else{
            return redirect()->back()->withErrors($validate);
        }
    }
    public function postTukangRegister(Request $request)
    {
        $validate = Validator::make($request->all(),[
            'name'  => 'required|min:5',
            'no_ktp' => 'required|numeric|unique:tukangs',
            'password'=>'required|alpha_num|min:5|confirmed',
            'address'=>'required|min:10',
            'city'  => 'required|min:5',
            'picture' =>'image',
            'phone' =>'required|numeric',
        ]);

        if(!$validate->fails())
        {
            $file = $request['picture'];
            if($file)
            {
                $filename = $file->getClientOriginalName();
                Storage::disk('tukang')->put($filename,File::get($file));
            }
            $tukang = new Tukang();
            $tukang->name     = $request->get('name');
            $tukang->no_ktp    = $request->get('no_ktp');
            $tukang->password = bcrypt($request->get('password'));
            $tukang->city   = $request->get('city');
            $tukang->address  = $request->get('address');
            $tukang->picture  = $filename;
            $tukang->phone    = $request->get('phone');
            $tukang->status    = 'available';
            $tukang->save();

            $credentials = ['no_ktp'=>$request->get('no_ktp'),'password'=>$request->get('password')];

            if(Auth::guard('tukang')->attempt($credentials))
            {
                return redirect('/tukang/home')->with('status','Welcome '.Auth::guard('tukang')->user()->name);
            }
        }
        else{
            return redirect()->back()->withErrors($validate);
        }
    }

    public function getTukangImage($filename)
    {
        $image = Storage::disk('tukang')->get($filename);
        return response($image,200)->header('Content-Type','Image/JPEG');
    }

    public function getUserImage($filename)
    {
        $image = Storage::disk('local')->get($filename);
        return response($image,200)->header('Content-Type','Image/JPEG');
    }

    public function getUserLogout()
    {
        Auth::guard('web')->logout();
        return redirect('/');
    }

    public function getTukangLogout()
    {
        Auth::guard('tukang')->logout();
        return redirect('/');
    }

    public function getSearchTukang(Request $request)
    {
        $tukangs = DB::table('tukangs')->where('city','like','%'.$request->get('search').'%')->paginate(8);
        return view('welcome',compact('tukangs'));
    }

    public function getBooking($id)
    {
        $tukang = Tukang::find($id);
        $tukang->status = 'Booked';
        $tukang->save();
        return redirect()->back()->with('status','Booking successfull');
    }
}
