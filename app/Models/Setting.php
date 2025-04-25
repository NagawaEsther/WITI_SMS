<?php

namespace App\Models;

use Eloquent as Model;

use Illuminate\Database\Eloquent\Factories\HasFactory;

/**
 * Class Setting
 * @package App\Models
 * @version November 15, 2024, 6:47 pm UTC
 *
 * @property string $institution_name
 * @property string $copyright
 * @property string $system_logo
 * @property string $motto
 * @property string $address
 * @property string $contact_one
 * @property string $contact_two
 */
class Setting extends Model
{
   

    use HasFactory;

    public $table = 'settings';
    




    public $fillable = [
        'institution_name',
        'copyright',
        'system_logo',
        'motto',
        'address',
        'contact_one',
        'contact_two'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'institution_name' => 'string',
        'copyright' => 'string',
        'system_logo' => 'string',
        'motto' => 'string',
        'address' => 'string',
        'contact_one' => 'string',
        'contact_two' => 'string'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        'institution_name' => 'required|string|min:4|max:150|unique:settings,institution_name',
        'copyright' => 'nullable|string|min:5|max:150',
        'system_logo' => 'required|image|mimes:jpeg,png,jpg|max:2048',
        'motto' => 'required|string|min:5|max:150',
        'address' => 'required|string|min:5|max:150',
        'contact_one' => 'required|min:10|max:10|string',
        'contact_two' => 'nullable|min:10|max:10|unique:settings,contact_two'
    ];

    
}
