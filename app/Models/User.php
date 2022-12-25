<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;
use App\Helpers\Helper;
use Illuminate\Support\Facades\Auth;
use App\Models\Technology;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'first_name',
        'last_name',
        'email',
        'password',
        'role_id',
        'status',
        'profile_pic',
        'phone',
        'hear_about_us',
        'technology_id'
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function technology()
    {
        return $this->belongsTo(Technology::class, 'technology_id');

    }

    public function getFullNameAttribute()
    {
       return ucfirst($this->first_name) . ' ' . ucfirst($this->last_name);
    }

    /* Get User Details */
    public static function getUserDetails($id){
        $data = User::find($id);
        if($data){
            if(isset($data) && $data->profile_pic !=''){
                $data->profile_pic = Helper::displayProfilePath().$data->profile_pic;
            }
        }
        return $data;
    }

    /* Edit Profile Details */
    public static function updateMyProfile($request){
        $data = User::find(Auth::user()->id);
        $data->first_name = $request->first_name;
        $data->last_name = $request->last_name;
        $profilelogoName = $data->profile_pic;
        if(isset($request->profile_pic) && $request->profile_pic !=''){

            /* Unlink Image */
            if(isset($data->profile_pic) && $data->profile_pic!=''){
                $imagePath = Helper::profileFileUploadPath().''.$data->profile_pic;
                if(file_exists($imagePath)){
                    unlink($imagePath);
                }
            }

            $profilelogo   = $request->profile_pic;
            $profilelogoName = 'Profile-'.time().'.'.$request->profile_pic->getClientOriginalExtension();
            $profilelogo->move(Helper::profileFileUploadPath(), $profilelogoName);
        }
        $data->profile_pic = $profilelogoName;
        $data->save();
        return self::getUserDetails($data->id);
    }

    public static function createClient($request)
    {
        $data = new User();
        $data->first_name = $request->first_name;
        $data->last_name = $request->last_name;
        $data->email = $request->email;
        $data->role_id = 2;
        $data->status = 1;
        $data->password = bcrypt($request->password);
        $data->phone = $request->phone;
        $data->hear_about_us = $request->hear_about_us;

        $data->save();

        return $data->id;
    }
    public static function activeUserCount(){
        $query = User::where('status',config('const.statusActive'));
        return $query->count();
    }
}
