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
     * returns n results
     *
     * @param $query
     * @param $count
     * @return mixed
     */
    public function scopeLastNumbers($query, $count)
    {
        return $query->orderBy('created_at', 'desc')->take($count)->get();
    }


    /**
     * Validation rules
     * @var array
     */
    protected static $rules = [
        'number' => 'required|unique:numbers|numeric',
        'name' => 'required|alpha_dash'
    ];
}
