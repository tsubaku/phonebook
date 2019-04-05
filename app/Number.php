<?php

namespace App;

class Number extends BaseModel
{

    /**
     * Mass Assigned
     *
     * @var array
     */
    protected $fillable = ['number', 'name'];


    /**
     * Validation rules
     * @var array
     */
    protected static $rules = [
        'number' => 'required|unique:numbers|numeric',
        'name' => 'required|alpha_dash'
    ];
}
