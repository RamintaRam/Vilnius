<?php

namespace App\Models;


use Illuminate\Database\Eloquent\Model;
use Ramsey\Uuid\Uuid;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Notifications\Notifiable;

class Inhabitants extends Model
{

    use Notifiable;
    use SoftDeletes;
    public $incrementing = false;

    protected $table = 'gyventojai';
    protected $fillable = ['id', 'gimimo_metai', 'gimimo_valstybe', 'lytis', 'seimos_padetis', 'vaiku_skaicius', 'seniunija', 'gatve'];



    protected static function boot() {
        parent::boot();

        static::creating(function($model) {

            if(!isset($model->attributes['id'])) {
                $model->attributes['id'] = Uuid::uuid4();
            } else {
                $model->{$model->getKeyName()} = $model->attributes['id'];
            }
        });


    }


    protected $with = ['metai','valstybe', 'lytis', 'seima', 'vaikai', 'seniunija', 'gatve'];

//    protected $hidden = ['created_at', 'deleted_at', 'count', 'updated_at', 'gimimo'];


    public function metai()
    {
        return $this->hasOne(YearOfBirth::class, 'id', 'gimimo_metai');
    }

    public function valstybe()
    {
        return $this->hasOne(CountryOfBirth::class, 'id', 'gimimo_valstybe');
    }

    public function lytis()
    {
        return $this->hasOne(Gender::class, 'id', 'lytis');
    }

    public function seima()
    {
        return $this->hasOne(FamilyStatus::class, 'id', 'seimos_padetis');
    }

    public function vaikai()
    {
        return $this->hasOne(NumberOfKids::class, 'id', 'vaiku_skaicius');
    }

    public function seniunija()
    {
        return $this->hasOne(Ward::class, 'id', 'seniunija');
    }
    public function gatve()
    {
        return $this->hasOne(Street::class, 'id', 'gatve');
    }





}
