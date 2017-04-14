<?php

namespace App\Http\Controllers\Auth;

use DB;
use Session;

use App\User;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Foundation\Auth\RegistersUsers;

use App\Events\UserRegistered;
use App\Events\EmailVerified;

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
    protected $redirectTo = '/user/';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest');
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return User
     */
    protected function create(array $data)
    {
        $user = User::create([
            'email' => $data['email'],
            'password' => bcrypt($data['password']),
            'email_token' => str_random(10),
        ]);

        $profile = $user->profile()->create([
            'user_id' => $user->id,
            'screen_name' => $data['screen_name'],
            'first_name' => $data['first_name'],
            'last_name' => $data['last_name'],
        ]);

        return $user;
    }

    /**
     * Get a validator for an incoming registration request.
     *
     * @param  array  $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    protected function validator(array $data)
    {
        return Validator::make($data, [
            'screen_name' => 'required|max:50|unique:profiles',
            'first_name' => 'required|max:50',
            'last_name' => 'required|max:50',
            'email' => 'required|string|email|max:255|unique:users',
            'password' => 'required|string|min:6|confirmed',
        ]);
    }

    // Get the user who has the same token and change his/her status to verified i.e. 1
    public function verify($token)
    {
        // The verified method has been added to the user model and chained here
        // for better readability
        Session::flash('account_verified', 'No valid activation, It may be used!');
        $user = User::where('email_token',$token)->first();
        if($user)
        {
            Session::flash('account_verified', 'You have verified your email!');
            $user->verified();
            event(new EmailVerified($user));
        }

        return redirect('login');
    }


    /**
    *  Over-ridden the register method from the "RegistersUsers" trait
    *  Remember to take care while upgrading laravel
    */

    public function register(Request $request)
    {
        // Laravel validation
        $validator = $this->validator($request->all());
        if ($validator->fails()) 
        {
            $this->throwValidationException($request, $validator);
        }
        // Using database transactions is useful here because stuff happening is actually a transaction
        // I don't know what I said in the last line! Weird!
        DB::beginTransaction();
        try
        {
            $user = $this->create($request->all());

            // After creating the user send an email with the random token generated in the create method above
            event(new UserRegistered($user));

            DB::commit();

            Session::flash('new_reg_message', 'We have sent you a verification email!');
            return back();
        }
        catch(Exception $e)
        {
            DB::rollback(); 
            return back();
        }
    }
}
