<?php

namespace App\Http\Controllers\Auth;

use App\Constants\Role;
use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use App\Models\User;
use App\Models\Owner;
use App\Models\Customer;
use App\Helpers\StorageHelper;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

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

    protected $redirectTo = RouteServiceProvider::HOME;

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
     * Get a validator for an incoming registration request.
     *
     * @param  array  $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    protected function validator(array $data)
    {
        return Validator::make($data, [
            'email' => ['required', 'string', 'email', 'max:255', 'unique:user'],
            'password' => ['required', 'string', 'min:6', 'confirmed'],
        ]);
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return \App\Models\User
     */
    protected function create(array $data)
    {
        $user = new User;
        $user->email = $data['email'];
        $user->password = Hash::make($data['password']);
        $user->role = Role::ADMIN;
        if(isset($data['role']) && !empty($data['role'])) $user->role = $data['role'];
        $user->save();

        if($user->role === Role::OWNER){
            $owner = new Owner;
            $owner->user_id = $user->id;
            $owner->name = $data['name'];
            $owner->contact_number = $data['contact_number'];
            $owner->country = $data['country'];
            $owner->province = $data['province'];
            $owner->city = $data['city'];
            $owner->address = $data['address'];
            $owner->postcode = $data['postcode'];
            $this->redirectTo = RouteServiceProvider::OWNER_HOME;
            $owner->save();
        } elseif($user->role === Role::CUSTOMER){
            $customer = new Customer;
            $customer->user_id = $user->id;
            $customer->name = $data['name'];
            $customer->contact_number = $data['contact_number'];
            $customer->country = $data['country'];
            $customer->province = $data['province'];
            $customer->city = $data['city'];
            $customer->address = $data['address'];
            $customer->postcode = $data['postcode'];
            $this->redirectTo = RouteServiceProvider::CUSTOMER_HOME;
            $customer->save();
        }

        if (request()->hasFile('avatar')){
            $avatar = $data['avatar']->getClientOriginalName();
            $extension = $data['avatar']->extension();
            $path = StorageHelper::storeDo('do_spaces', 'avatars', $data['avatar'], $user->id.'/'.$avatar);
            $user->update(['avatar' => $path]);
        }
    
        return $user;
    }
}
