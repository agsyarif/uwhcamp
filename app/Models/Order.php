<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Order extends Model
{
    use HasFactory, SoftDeletes;

    // protected $fillable = [
        // 'member_id',
        // 'mentor_id',
        // 'course_id',
        // 'midtrans_url',
        // 'midtrans_token',
        // 'midtrans_status',
        // 'expired_at'


        // 'status',

        // 'payment_method',
        // 'payment_id',
        // 'payment_status',
        // 'payment_amount',
        // 'payment_currency',
        // 'payment_details',
        // 'payment_created_at',
        // 'payment_updated_at',
        // 'payment_deleted_at',
    // ];

    protected $guarded = ['id'];

    public function orderCourse()
    {
        return $this->hasMany(OrderCourse::class);
    }

    public function orderWebinar()
    {
        return $this->hasMany(OrderWebinar::class);
    }

}
