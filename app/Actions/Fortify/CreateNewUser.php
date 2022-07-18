<?php

namespace App\Actions\Fortify;

use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Laravel\Fortify\Contracts\CreatesNewUsers;
use Laravel\Jetstream\Jetstream;
use Carbon\Carbon;
use Livewire\WithFileUploads;

class CreateNewUser implements CreatesNewUsers
{
    use PasswordValidationRules;
    use WithFileUploads;
    /**
     * Validate and create a newly registered user.
     *
     * @param  array  $input
     * @return \App\Models\User
     */
    public function create(array $input)
    {
        Validator::make($input, [
            'name' => ['required', 'string', 'max:255'],
            'username' => ['required', 'string', 'max:255','unique:users'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'mobile' => 'required|unique:users',
            // 'profile_photo_path'=>'required',
            'password' => $this->passwordRules(),
            'terms' => Jetstream::hasTermsAndPrivacyPolicyFeature() ? ['accepted', 'required'] : '',
        ])->validate();

        $image = $input['profile_photo_path'];
        $imagename=Carbon::now()->timestamp.'.'.$image->extension();
        $image->storeAs('assests/images/users',$imagename);
        //$imagesname=$imagesname.','.$imagename;
    return User::create([
        'name' => $input['name'],
        'username' => $input['username'],
        'email' => $input['email'],
        'mobile'=>$input['mobile'],
        'profile_photo_path'=>$imagename,
        'password' => Hash::make($input['password']),
        
    ]);
    }
}
