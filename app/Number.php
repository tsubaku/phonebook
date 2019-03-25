<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Number extends Model
{
    //Mass Assigned
    protected $fillable = ['number', 'name'];

    //Mutators
    public function setSlugAttribute($value)
    {
        //todo mb_substr не вытаскивает title, если он на китайском, пока что добавил рандомную часть
        $this->attributes['slug'] = Str::slug(mb_substr($this->title, 0, 40) . "-" . \Carbon\Carbon::now()->format('dmyHi'), '-') . "-" . $dateOfBirth = rand(101, 999);
    }


    public function children()
    {
        //ссылка на текущую модель и поле по которому будет идти поиск вложенных категорий
        return $this->hasMany(self::class, 'parent_id');
    }



    //скоуп (заготовка. динамическая. возвращает n результатов)
    public function scopeLastNumbers($query, $count){
        return $query->orderBy('created_at', 'desc')->take($count)->get();
    }
}
