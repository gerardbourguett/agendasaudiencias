<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Audiencia extends Model
{
    use HasFactory;


    static $rules = [
        'title' => 'required',
        'start' => 'required',
        'end' => 'required',
        'tipoAudiencia' => 'required',
        'sala' => 'required',
        'magis' => 'required',
        'textColor' => 'required',
        'backgroundColor' => 'required',
    ];

    protected $fillable = ['title', 'start', 'end', 'tipoAudiencia', 'sala', 'magis', 'observaciones', 'textColor', 'backgroundColor'];

    protected $primaryKey = 'id';
    public $incrementing = true;
}
