<?php

namespace App\Models;
use App\Models\Berita;

use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Concerns\HasUuids;

class User extends Authenticatable
{
     /** @use HasFactory<UserFactory> */
            use HasFactory, Notifiable, HasUuids;

            /**
             * The attributes that are mass assignable.
             *
             * @var list<string>
             */
            protected $table = "users";
            protected $primaryKey = 'id_user';
            protected $keyType = 'string';

            protected $fillable = [
                'id_user',
                'name',
                'username',
                'password',
                'role',
            ];

            /**
             * The attributes that should be hidden for serialization.
             *
             * @var list<string>
             */
            protected $hidden = [
                'password', 
                'remember_token',
            ];

            /**
             * Get the attributes that should be cast.
             *
             * @return array<string, string>
             */
            protected function casts(): array
            {
                return [
                    'password' => 'hashed',
                ];
            }
}
