<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;
use PHPUnit\Framework\MockObject\ReturnValueNotConfiguredException;

class ActiveCode extends Model
{
    protected $fillable = [
        'id',
        'user_id',
        'code',
        'expired_at'
    ];

    public $timestamps = false;


    public function user(): \Illuminate\Database\Eloquent\Relations\BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    public function scopeVerifyCode($query , $code,  $user)
    {
        return !! $user->activeCode()->whereCode($code)->where('expired_at' , '>' , now())->first();
    }

    public function scopeGenerateCodeByUserId($query , $user): int
    {

        $user->activeCode()->delete();

        do {
            $code = mt_rand(10000, 99999);
        } while($this->checkCodeIsUnique($user , $code));

        // store the code
        $user->activeCode()->create([
            'code' => $code,
            'expired_at' => now()->addMinutes(5)
        ]);

        return $code;
    }

    public function scopeGenerateCode($user , $phoneNumber): int
    {
        $findActiveCode=ActiveCode::where('phoneNumber','=',$phoneNumber)->first();

        if ($findActiveCode){
            $vendor = ActiveCode::find($findActiveCode['id']);
            $vendor->delete();
        }
         do {

             $code = mt_rand(100000, 999999);
        }
         while($this->checkCodeIsUnique($findActiveCode , $code));

        $activeCodes = new ActiveCode();
        $activeCodes->code = $code;
        $activeCodes->expired_at = now()->addMinutes(10);
        $activeCodes->phoneNumber = $phoneNumber;
        $activeCodes->save();

        return $code;
    }

    public function scopeGenerateCode4($user , $phoneNumber): int
    {
        $findActiveCode=ActiveCode::where('phoneNumber','=',$phoneNumber)->first();

        if ($findActiveCode){
            $vendor = ActiveCode::find($findActiveCode['id']);
            $vendor->delete();
        }
        do {

            $code = mt_rand(1000, 9999);
        }
        while($this->checkCodeIsUnique($findActiveCode , $code));

        $activeCodes = new ActiveCode();
        $activeCodes->code = $code;
        $activeCodes->expired_at = now()->addMinutes(10);
        $activeCodes->phoneNumber = $phoneNumber;
        $activeCodes->save();

        return $code;
    }

    private function checkCodeIsUnique($phoneNumber, int $code): bool
    {
//        return !! $user->activeCode()->whereCode($code)->first();
        return !! ActiveCode::where('phoneNumber','=',$phoneNumber)
            ->where('code','=',$code)
            ->first();
    }

    private function getAliveCodeForUser($user)
    {
        return $user->activeCode()->where('expired_at' , '>' , now())->first();
    }
}
