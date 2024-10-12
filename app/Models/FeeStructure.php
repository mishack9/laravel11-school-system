<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class FeeStructure extends Model
{
    use HasFactory;

    protected $fillable = [
        'class_id',
        'fee_head_id',
        'acedamic_year_id',
        'october',
        'november',
        'december',
        'january',
        'february',
        'march',
        'april',
        'may',
        'june',
        'july',
        'august',
        'september',
    ];

    public function Feehead()
    {
        return $this->belongsTo(FeeHead::class,'fee_head_id');
    }

    public function Acedamic_Year()
    {
        return $this->belongsTo(Acedamicyear::class,'acedamic_year_id');
    }

    public function Class()
    {
        return $this->belongsTo(Classs::class,'class_id');
    }

}
