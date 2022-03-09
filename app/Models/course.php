<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class course extends Model
{
    use HasFactory, SoftDeletes;

    // protected $fillable = [
    //     'name',
    //     'slug',
    //     'description',
    //     'level_id',
    //     'course_category_id',
    //     'image',
    //     'price',
    //     'discount',
    //     'discount_type',
    //     'discount_start',
    //     'discount_end',
    //     'status',
    //     'is_featured',
    //     'is_free',
    //     'is_popular',
    //     'is_trending',
    //     'is_new',
    //     'is_recommended',
    //     'is_live',
    //     'is_free_preview',
    //     'is_free_preview_available',
    //     'is_free_preview_available_from',
    //     'is_free_preview_available_to',
    //     'is_free_preview_available_for',
    //     'is_free_preview_available_for_all_users',
    //     'is_free_preview_available_for_all_users_from',
    //     'is_free_preview_available_for_all_users_to',
    //     'is_free_preview_available_for_all_users_for',
    //     'is_free_preview_available_for_all_users_for_all_users',
    //     'is_free_preview_available_for_all_users_for_all_users_from',
    //     'is_free_preview_available_for_all_users_for_all_users_to',
    //     'is_free_preview_available_for_all_users_for_all_users_for',
    //     'is_free_preview_available_for_all_users_for_all_users_for_all_users',
    //     'is_free_preview_available_for_all_users_for_all_users_for_all_users_from',
    //     'is_free_preview_available_for_all_users_for_all_users_for_all_users_to',
    //     'is_free_preview_available_for_all_users_for_all_users_for',
    // ];

    protected $fillable = [
        'user_id',
        'name',
        'slug',
        'course_category_id',
        'image',
        'price',
        'description',
        'level_id',
        'is_published',
        'is_active',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function level()
    {
        return $this->belongsTo(level::class);
    }

    public function course_category()
    {
        return $this->belongsTo(CourseCategory::class);
    }

    public function course_lessons()
    {
        return $this->hasMany(CourseLesson::class);
    }

}
