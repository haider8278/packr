<?php

namespace App\Models;

use App\Models\Traits\Attributes\PostAttributes;
use App\Models\Traits\ModelAttributes;
use App\Models\Traits\Relationships\PostRelationships;
use Illuminate\Database\Eloquent\SoftDeletes;

class Post extends BaseModel
{
    use SoftDeletes, ModelAttributes, PostRelationships, PostAttributes;

    protected $table = 'requests';

    /**
     * The guarded field which are not mass assignable.
     *
     * @var array
     */
    protected $guarded = ['id'];

    /**
     * Fillable.
     *
     * @var array
     */
    protected $fillable = [
        'title',
        'slug',
        'requester_id',
        'receiver_id',
        'source',
        'destination',
        'product_link',
        'details',
        'type',
        'created_by',
    ];


    public function day(){
        return date("d",strtotime($this->created_at));
    }

    public function month(){
        return date("M",strtotime($this->created_at));
    }

    public function excerpt(){
        return \Str::words(strip_tags($this->details), 10, ' ...');
    }
}
