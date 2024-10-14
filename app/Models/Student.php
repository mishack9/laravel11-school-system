<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Student extends Model
{
    use HasFactory;

    protected $fillable = [
            'parent_id',
            's_firstname',
            's_middlename',
            's_lastname',
            's_email',
            'dob',
            'gender',
            'image',
            'acedamic_year_id',
            'class_id',
            'section_id',
            'course_id',
            'status',
            'admission_number',
            'password'
    ];

    protected $hidden = [
        'password',
    ];

    public function parent()
    {
        return $this->hasOne(User::class,'id', 'parent_id');
    }

    public function class()
    {
        return $this->belongsTo(Classs::class,'class_id');
    }

    public function course()
    {
        return $this->belongsTo(Course::class,'course_id');
    }

    public function acedamic_year()
    {
        return $this->belongsTo(Acedamicyear::class,'acedamic_year_id');
    }

    public function Section()
    {
        return $this->belongsTo(Section::class,'section_id');
    }
}
