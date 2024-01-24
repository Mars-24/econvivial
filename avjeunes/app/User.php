<?php

namespace App;

use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use Notifiable;

    protected $fillable = [
        'codeUser',
        'username',
        'email',
        'numero',
        'datenaissance',
        'sexe',
        'nationalite',
        'password',
        'activation',
        'code',
        'codeRecuperation',
        'type_user_id',
        'remember_token',
        'formation_sanitaire_id',
        'profession_conseiller_id',
        'pair_educateur_id',
        'profession',
        'region_id',
        'actif',
        'source',
        'teleconseiller_service_type',
    ];

    protected $hidden = [
        'password', 'remember_token',
    ];
    
    protected $dates = [
        // 'datenaissance',
    ];
    
    // protected $dateFormat = 'Y-m-d';

    public function setPasswordAttribute($password)
    {
        $this->attributes['password'] = bcrypt($password);
    }

    public function typeuser()
    {
        return $this->belongsTo(TypeUser::class, 'type_user_id');
    }

    public function paireducateur()
    {
        return $this->belongsTo(PairEducateur::class, 'pair_educateur_id')->withDefault();
    }
    
    public function professionconseiller()
    {
        return $this->belongsTo(ProfessionConseiller::class , 'profession_conseiller_id');
    }
    
    public function rapportPE()
    {
        return $this->hasMany(RapportPE::class);
    }
    
    public function region()
    {
       return $this->belongsTo(Region::class, 'region_id')->withDefault(['libelle' => '']);
    }
    
    public function chatTimeLines()
    {
        return $this->hasMany(ChatTimeLine::class);
    }
    
    // chat message send
    public function chatsendMessages()
    {
        return $this->hasMany(Chat::class, 'sender_id');
    }
    
    // message received
    public function receiveMessages()
    {
        return $this->hasMany(Chat::class, 'receiver_id');
    }
    
    public function hasAccess($type)
    {
        $role = DB::select("select * from affecter_roles a, roles r , users u 
            where r.code = '".$type."'
            and a.user_id = ".Auth::user()->id." 
            and a.role_id = r.id
            and a.user_id = u.id");
        
        return count($role) > 0;
    }
    
    // get user avatar
    public function getAvatarAttribute()
    {
        if (!$this->profil) {
            if ($this->sexe === 'F') {
                return 'images/profil/profil2.png';
            }
            
            return 'images/profil/profil.png';
        }
        
        return "images/profil/{$this->profil}";
    }
    
    public function scopeCovid19($query)
    {
        return $query->where('teleconseiller_service_type', 'COVID-19');
    }
}
