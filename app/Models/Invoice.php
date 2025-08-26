<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Invoice extends Model
{
    use HasFactory;
    protected $table = 'invoices';

    protected $fillable = [
        'user_id',
        'invoice_no',
        'amount',
        'invoice_date',
        'qr_token',
    ];



    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function rewardPoint()
    {
        return $this->hasOne(RewardPoint::class);
    }

}
