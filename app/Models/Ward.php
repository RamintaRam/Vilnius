<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Ramsey\Uuid\Uuid;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Notifications\Notifiable;

class Ward extends Model
{
//    use Notifiable;
    use SoftDeletes;
    public $incrementing = false;


    protected $table = 'seniunija';
    protected $fillable = ['id', 'name'];

    protected $hidden = ['created_at', 'deleted_at', 'count', 'updated_at'];

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

}
