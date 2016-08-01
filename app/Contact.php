<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Contact extends Model
{
    protected $fillable = ['first_name', 'last_name', 'email', 'user_id', 'phone', 'notes'];


    public function getNameAttribute($value)
    {
        return trim($this->first_name . ' ' . $this->last_name);
    }

    public function getProfileImageAttribute($value)
    {
        if (!$value) {
            $value = '//www.gravatar.com/avatar/' . md5(strtolower(trim($this->email)));
        }
        return $value;
    }

    public function scopeSearch($query, $term)
    {
        $term = '%' . $term . '%';

        return $query->where(function ($q) use ($term) {
            $q->where('first_name', 'like', $term);
            $q->orWhere('last_name', 'like', $term);
            $q->orWhere('email', 'like', $term);
            $q->orWhere('phone', 'like', $term);
            $q->orWhere('notes', 'like', $term);
            return $q;
        });
    }

    public function owner()
    {
        return $this->belongsTo(User::class, 'user_id');
    }
}
