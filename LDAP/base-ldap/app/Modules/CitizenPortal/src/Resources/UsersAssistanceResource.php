<?php

namespace App\Modules\CitizenPortal\src\Resources;

use Illuminate\Http\Resources\Json\JsonResource;
use App\Modules\CitizenPortal\src\Constants\Roles;
use App\Modules\CitizenPortal\src\Models\UsersAssistance;
use Illuminate\Support\Str;

class UsersAssistanceResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function toArray($request)
    {
        $arrays = [
            'id'            =>  isset($this->id) ? (int) $this->id : null,
            'activity_id'   =>  isset($this->activity_id) ? (int) $this->activity_id : null,
            'users_id'      =>  isset($this->users_id) ? (int) $this->users_id : null,
            /*
             */
            'created_at'    =>  isset($this->created_at) ? $this->created_at->format('Y-m-d H:i:s') : null,
            'updated_at'    =>  isset($this->updated_at) ? $this->updated_at->format('Y-m-d H:i:s') : null,
            'deleted_at'    =>  isset($this->deleted_at) ? $this->deleted_at->format('Y-m-d H:i:s') : null,
            'audits'        => $this->when(
                auth('api')->check() &&
                auth('api')->user()->can(Roles::can(UsersAssistance::class,'history'), UsersAssistance::class),
                AuditResource::collection($this->audits()->latest()->get()),
                []
            )
        ];
        return $arrays;
    }

    public static function headers()
    {
        return [
            [
                'align' => "right",
                'text' => "#",
                'value'  =>  "id",
                'sortable' => true
            ],
            [
                'align' => "left",
                'text' => Str::ucfirst(__('citizen.validations.activity_name')),
                'value'  =>  "activity_name",
                'sortable' => false
            ],
            [
                'align' => "left",
                'text' => Str::ucfirst(__('citizen.validations.user')),
                'value'  =>  "user_name",
                'sortable' => false
            ],
            [
                'align' => "right",
                'text' => Str::ucfirst(__('citizen.validations.actions')),
                'value'  =>  "actions",
                'sortable' => false
            ],
        ];
    }
}
