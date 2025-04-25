<?php

namespace App\Models;

// use Eloquent as Model;
use Illuminate\Database\Eloquent\Model;

use Illuminate\Database\Eloquent\Factories\HasFactory;

/**
 * Class Semester
 * @package App\Models
 * @version November 18, 2024, 12:59 am UTC
 *
 * @property string $name
 * @property string $status
 * @property string $start_date
 * @property string $end_date
 * @property integer $created_by
 * @property integer $program_id
 */
class Semester extends Model
{

    use HasFactory;

    public $table = 'semesters';
    



    public $fillable = [
        'name',
        'status',
        'start_date',
        'end_date',
        'created_by',
        'program'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'name' => 'string',
        'status' => 'string',
        'start_date' => 'date',
        'end_date' => 'date',
        'created_by' => 'integer',
        'program' => 'string',
    ];
   
    

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        'name' => 'required|min:3|max:100|unique:semesters,name' ,
        'status' => 'required|string',
        'start_date' => 'nullable',
        'end_date' => 'required',
        'created_by' => 'nullable',
        'program' => 'required|string'
    ];

    public function user()
    {
        return $this->belongsTo(User::class, 'created_by');
    }
    
    public function program()
{
    return $this->belongsTo(Program::class, 'program');
}

    
    

    
}
