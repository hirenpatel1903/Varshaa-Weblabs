<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Technology extends Model
{
    use HasFactory, SoftDeletes;

    protected $table = 'technology';
    protected $fillable = [
        'name'
    ];

    public static function technologyUpdate($id,$request){
        $data = Technology::find($id);
        $data->name = $request->name;
        $data->save();

        return $data;
    }
}
