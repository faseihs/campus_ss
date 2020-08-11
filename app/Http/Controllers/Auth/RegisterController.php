<?php

namespace App\Http\Controllers\Auth;

use App\Common\CommonFunction;
use App\Model\AccountPlan;
use App\Model\LeasePlan;
use App\Model\Plan;
use App\Model\UserApproval;
use App\User;
use App\Http\Controllers\Controller;
use Illuminate\Auth\Events\Registered;
use Illuminate\Support\Facades\Hash;

use Illuminate\Support\Facades\URL;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Validator;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Http\Request;


class RegisterController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Register Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles the registration of new users as well as their
    | validation and creation. By default this controller uses a trait to
    | provide this functionality without requiring any additional code.
    |
    */

    use RegistersUsers;

    /**
     * Where to redirect users after registration.
     *
     * @var string
     */
    protected $redirectTo = '/home';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        //header('location: login'); exit;
//        $this->middleware('guest');
        $this->middleware('guest')->except('logout');
    }

    /**
     * Get a validator for an incoming registration request.
     *
     * @param  array  $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    protected function validator(array $data)
    {
        $rules=[
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users',
            'password' => 'required|string|min:6|confirmed',
            'role_id'=>'required',
            'g-recaptcha-response' => 'required|captcha'
        ];
     /*   if($data["role_id"]==2)
        {
            $rules["address"]='required';
            $rules["phone_number"]='required';
        }*/

        $custom_user = CommonFunction::getCustomUser();
        if(!$custom_user){
            $rules["services"]="required|string";
            $rules["volume"]="required|numeric";
            $rules["rate"]="required|numeric";
            $rules["email"]='required|string|email|max:255|unique:users|unique:user_approvals';
        }
        return Validator::make($data, $rules);
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return \App\User
     */
   protected function create(array $data)
    {
        $input=$data;
        $input["password"]= Hash::make($data['password']);
        return  User::create($input);
    }

    public function register(Request $request)
    {
        $this->validator($request->all())->validate();
        $user=$this->create($request->all());
        event(new Registered($user));
        $this->guard()->login($user);
        return $this->registered($request, $user)
            ?: redirect($this->redirectPath());
    }

    public function showRegistrationForm(Request $request)
    {
        return redirect(route("login"));
    }
}
