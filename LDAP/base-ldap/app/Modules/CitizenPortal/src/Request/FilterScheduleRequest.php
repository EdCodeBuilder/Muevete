<?php


namespace App\Modules\CitizenPortal\src\Request;



use App\Modules\CitizenPortal\src\Constants\Roles;
use App\Modules\CitizenPortal\src\Models\ActivityAsisstance;
use App\Modules\CitizenPortal\src\Models\CitizenSchedule;
use App\Modules\CitizenPortal\src\Models\Day;
use App\Modules\CitizenPortal\src\Models\Hour;
use App\Modules\CitizenPortal\src\Models\Program;
use App\Modules\CitizenPortal\src\Models\Schedule;
use App\Modules\CitizenPortal\src\Models\Stage;
use Illuminate\Foundation\Http\FormRequest;

class FilterScheduleRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return auth('api')->user()->hasAnyPermission(
            Roles::canAny([
                [
                    'actions'   => 'view_or_manage',
                    'model'     => CitizenSchedule::class
                ],
                [
                    'actions'   => 'status',
                    'model'     => CitizenSchedule::class
                ],
                [
                    'actions'   => 'view_or_manage',
                    'model'     => Schedule::class
                ],
            ], false, true)
        );
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        $weekday = new Day();
        $daily = new Hour();
        $program = new Program();
        $activity = new ActivityAsisstance();
        $stage = new Stage();
        return [
            'program_id' => 'nullable|array',
            'program_id.*'     =>  [
                'required',
                'numeric',
                "exists:{$program->getConnectionName()}.{$program->getTable()},{$program->getKeyName()}"
            ],
            'activity_id' => 'nullable|array',
            'activity_id.*'    =>  [
                'required',
                'numeric',
                "exists:{$activity->getConnectionName()}.{$activity->getTable()},{$activity->getKeyName()}"
            ],
            'stage_id' => 'nullable|array',
            'stage_id.*'       =>  [
                'required',
                'numeric',
                "exists:{$stage->getConnectionName()}.{$stage->getTable()},{$stage->getKeyName()}"
            ],
            'weekday_id' => 'nullable|array',
            'weekday_id.*'     =>  [
                'required',
                'numeric',
                "exists:{$weekday->getConnectionName()}.{$weekday->getTable()},{$weekday->getKeyName()}"
            ],
            'daily_id' => 'nullable|array',
            'daily_id.*'       =>  [
                'required',
                'numeric',
                "exists:{$daily->getConnectionName()}.{$daily->getTable()},{$daily->getKeyName()}"
            ],
            'is_paid'        =>  'nullable|boolean',
            'start_date'     =>  'nullable|date|before_or_equal:final_date',
            'final_date'      =>  'nullable|date|after_or_equal:start_date',
            'is_activated'   =>  'nullable|boolean',
        ];
    }

    /**
     * Get custom attributes for validator errors.
     *
     * @return array
     */
    public function attributes()
    {
        return [
            'weekday_id'    =>  __('citizen.validations.weekday'),
            'daily_id'      =>  __('citizen.validations.daily'),
            'min_age'       =>  __('citizen.validations.min_age'),
            'max_age'       =>  __('citizen.validations.max_age'),
            'quota'         =>  __('citizen.validations.quota'),
            'activity_id'   =>  __('citizen.validations.activity'),
            'stage_id'      =>  __('citizen.validations.stage'),
            'is_paid'       =>  __('citizen.validations.is_paid'),
            'program_id'    =>  __('citizen.validations.program'),
            'start_date'    =>  __('citizen.validations.start_date'),
            'final_date'     =>  __('citizen.validations.final_date'),
            'is_activated'  =>  __('citizen.validations.is_activated'),
        ];
    }
}
