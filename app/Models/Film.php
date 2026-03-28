<?php

namespace App\Models;

use Carbon\Traits\Timestamp;
use Illuminate\Database\Eloquent\Model;

class Film extends Model
        {

            protected $table = 'film';

            protected $primaryKey = 'film_id';

            public $incrementing = true;
    
             protected $keyType = 'int';
                protected $fillable = [
                    'film_id',
                    'Title',
                    'Release_date',
                    'Company'
                ];//vao natao 11 March

                public $timestamps = false;

        }
