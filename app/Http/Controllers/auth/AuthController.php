<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Session;
use App\Models\User;
use Hash;

class AuthController extends Controller
{
    /**
     * Write code on Method
     *
     * @return response()
     */
    public function index()
    {
        return view('auth.login');
    }

    /**
     * Write code on Method
     *
     * @return response()
     */
    public function registration()
    {
        return view('auth.registration');
    }

    /**
     * Write code on Method
     *
     * @return response()
     */
    public function postLogin(Request $request)
    {
        $request->validate([
            'email' => 'required',
            'password' => 'required',
        ]);

        $credentials = $request->only('email', 'password');
        $data = $request->all();
        //echo '<pre>';print_r($data);die;
        if (Auth::attempt($credentials)) {
            return redirect('dashboard')->withSuccess('You have Successfully loggedin');
        }

        return redirect("login")->withSuccess('Oppes! You have entered invalid credentials');
    }
    /*public function postLogin(Request $request)
    {
        $request->validate([
            'email' => 'required|string|email',
            'password' => 'required|string',
        ]);

        $credentials = $request->only('email', 'password');

        if (Auth::attempt($credentials)) {
            return redirect()->intended('home');
        }

        return redirect('login')->with('error', 'Oppes! You have entered invalid credentials');
    }*/

    /**
     * Write code on Method
     *
     * @return response()
     */
    public function postRegistration(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'email' => 'required|email|unique:users',
            'password' => 'required',
        ]);
        //'password' => 'required|min:6',
        $data = $request->all();
        $check = $this->create($data);

        return redirect("dashboard")->withSuccess('Great! You have Successfully loggedin');
    }

    /**
     * Write code on Method
     *
     * @return response()
     */
    public function dashboard()
    {
        //echo 'hhh';die;
        if(Auth::check()){
            return view('dashboard');
        }
echo 'here';die;
        return redirect("login")->withSuccess('Opps! You do not have access');
    }

    /**
     * Write code on Method
     *
     * @return response()
     */
    /*public function create(array $data)
    {
      return User::create([
        'name' => $data['name'],
        'email' => $data['email'],
        'password' => Hash::make($data['password'])
      ]);
    }*/
    public function home()
    {

$notice = DB::table('noticeboards')
            ->join('users', 'noticeboards.user_id', '=', 'users.id')
            ->select('noticeboards.subject', 'noticeboards.description', 'noticeboards.time', 'users.user_type', 'users.name')
            ->orderByDesc('time')
            ->get();
        $arr['user_type']= 'admin';
        return view('dash', [
            'title' => 'Dashboard',
            'notices' => $arr,
            'doctorcnt'=> 'dfd',
            'generalcnt'=> 'dsf',
            'pharmacistcnt'=> 'df',
            'inpatientcnt'=> 'ddd'
        ]);

    }

    /**
     * Write code on Method
     *
     * @return response()
     */
    public function logout() {
        Session::flush();
        Auth::logout();

        return Redirect('login');
    }
}