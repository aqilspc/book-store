<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;
use DB;
class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'email',
        'password',
        'role'
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function getItemOrder($id)
    {
        $data = DB::table('book_order_item as boi')
        ->join('book as bo','bo.id','=','boi.book_id')
        ->join('book_category as bct','bct.id','=','bo.category_id')
        ->where('boi.book_order_id',$id)
        ->select('bo.name','bct.name as category','bo.price')
        ->get();
        $html = '<ul>';
        foreach ($data as $key => $value) {
            $html .='<li> Book :'.$value->name.' | Category : '.$value->category.' | Price : Rp.'.number_format(floatval($value->price)).'</li>';
        }
        $html .= '</ul>';
        return $html;
    }
}
