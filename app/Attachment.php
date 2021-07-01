<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Attachment extends Model
{
    protected $table = 'tbl_attachment';
    const CREATED_AT = 'create_time';
    const UPDATED_AT = 'update_time';
    protected $guarded = [];
    protected $attributes = [];
    protected $dateFormat = 'U';

    public function client()
    {
        return $this->belongsTo(Client::class , 'client_id');
    }
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'user_id'
    ];


    public function kiasAttachmentProxy(){
        return $this->hasOne(KiasAttachmentProxy::class);
    }
}
