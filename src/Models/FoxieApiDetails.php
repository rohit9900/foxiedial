<?php

namespace Xoyal\Foxiedial\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class FoxieApiDetails extends Model
{
    use HasFactory;

    protected $table        = "foxie_api_details";
    protected $primaryKey   = "id";
    public $timestamps      = false;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [

        'id',
        'requested_by',  
        'auth_token',
        'api_key',
        'active',
        'created_on',
        'modified_on',
   ];

   public function add_foxie_api_details($input)
    {
        $requested_by                   =   $input['requested_by'];
        $auth_token                     =   Str::random(9);
        $api_key                        =   Str::random(32);
        $active                         =   $input['active'];

        $FoxieApiDetails                =   new FoxieApiDetails;

        $FoxieApiDetails->requested_by  =   $requested_by;
        $FoxieApiDetails->auth_token    =   $auth_token;
        $FoxieApiDetails->api_key       =   $api_key;
        $FoxieApiDetails->active        =   $active;

        $FoxieApiDetails->save();

        return $FoxieApiDetails;
    }
}
