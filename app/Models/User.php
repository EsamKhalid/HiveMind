<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    /** @use HasFactory<\Database\Factories\UserFactory> */
    use HasFactory, Notifiable;

    protected $table = 'users';

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'first_name',
        'last_name',
        'email_address',
        'phone_number',
        'password',
        'permission_level',
        'memorable_question',
        'memorable_answer',
    ];
    
    /** (Default method)
     * Get the attributes that should be cast.
     *
     * @return array<string, string>
     */
    protected function casts(): array
    {
        return [
            'email_verified_at' => 'datetime',
            'password' => 'hashed',
        ];
    }

    // A user has many orders
    public function orders()
    {
        return $this->hasMany(Order::class, 'user_id');
    }

    // A user can have many addresses
    public function addresses()
    {
        return $this->hasMany(Address::class, 'user_id', 'id');
    }

    // A user can write many reviews
    public function reviews()
    {
        return $this->hasMany(Reviews::class, 'user_id');
    }
}