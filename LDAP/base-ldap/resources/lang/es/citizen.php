<?php

return [
    /*
    |--------------------------------------------------------------------------
    | Park Modules Lines
    |--------------------------------------------------------------------------
    |
    | The following language lines are used during park module access for various
    | messages that we need to display to the user. You are free to modify
    | these language lines according to your application's requirements.
    |
    */
    'menu'  =>  [
        'roles'         =>  'Roles y Permisos',
        'data-management'   => 'Administración de Datos',
        'status'        =>  'Estados del Sitema',
        'stages'        =>  'Escenarios',
        'programs'      =>  'Programas',
        'activities'    =>  'Actividades',
        'age_group'     =>  'Grupo Etario',
        'week_days'     =>  'Días',
        'daily_hours'   =>  'Horas',
        'file_types'     =>  'Tipos de Archivos',
        'profile_types'  =>  'Tipos de Perfiles',
        'schedules'     =>  'Horarios e Inscipciones',
        'dashboard'     =>  'Tablero',
        'user_validation'     =>  'Validación de Usuarios',
        'activities_records'     =>  'Registros a Actividades',
        'audit' =>  'Auditoría',
    ],

    'excel' => [
        'matches' => 'Se econtró una concidencia|Se encontraron :matches coincidencias de un total de :rows datos procesados del archivo cargado.',
        'row'   => ':attribute en la fila :row',
    ],

    'validations'   => [
        'activity_id' => 'Id actividad',
        'activity_name' => 'Nombre actividad',
        'full_name'     =>  'nombre',
        'file'  => 'archivo',
        'profile_type'  =>  'tipo de perfil',
        'document_type' =>  'tipo de documento',
        'document'  =>  'documento',
        's_name'        =>  'segundo nombre',
        'surnames'      =>  'Apellidos',
        'surname'       =>  'primer apellido',
        's_surname'     =>  'segundo apellido',
        'sex'   =>  'sexo',
        'birthdate'   =>  'fecha de nacimiento',
        'blood_type'    =>  'grupo sanguíneo',
        'country_birth' =>  'país de nacimiento',
        'state_birth'   =>  'departamento de nacimiento',
        'city_birth'    =>  'ciudad de nacimiento',
        'country_residence' =>  'país de residencia',
        'state_residence'   =>  'departamento de residencia',
        'city_residence'    =>  'ciudad de residencia',
        'locality'  =>  'localidad',
        'upz'   =>  'upz',
        'neighborhood'  =>  'barrio',
        'other_neighborhood_name'   =>  'otro nombre del barrio',
        'stratum'   =>  'estrato',
        'ethnic_group'  =>  'grupo étnico',
        'population_group'  =>  'grupo poblacional',
        'gender'    =>  'género',
        'sexual_orientation'    =>  'orientació sexual',
        'eps'   =>  'eps',
        'has_disability'    =>  'tiene discapacidad',
        'disability'    =>  'discapacidad',
        'contact_name'  =>  'nombre del contácto',
        'contact_phone' =>  'teléfono del contácto',
        'contact_relationship'  =>  'parentesco del contácto',
        'assignor_name' =>  'nombre asignador',
        'assignor_document' =>  'documento asignador',
        'assigned_at'   =>  'fecha de asignación',
        'checker_name'  =>  'nombre verificador',
        'checker_document'  =>  'documento verificador',
        'status'    =>  'estado',
        'status_citizen_schedule'    =>  'estado de inscripción',
        'name'          =>  'nombre',
        'date'          =>  'fecha',
        'content'       =>  'contenido',
        'start_time'    =>  'hora inicio',
        'end_time'      =>  'hora final',
        'program'       =>  'programa',
        'activity'      =>  'actividad',
        'stage'         =>  'escenario',
        'park_code'     =>  'codigo del parque',
        'park'          =>  'parque',
        'address'       =>  'dirección',
        'weekday'       =>  'día(s) de la semana',
        'daily'         =>  'horas',
        'min_age'       =>  'edad mínima',
        'max_age'       =>  'edad máxima',
        'quota'         =>  'cupos',
        'is_paid'       =>  'es pago',
        'is_initiate'   =>  'es iniciación',
        'start_date'    =>  'fecha de apertura',
        'final_date'     =>  'fecha de cierre',
        'start_date_filter'    =>  'fecha inicial de registro',
        'final_date_filter'     =>  'fecha final de registro',
        'is_activated'  =>  'está activo',
        'users_schedules_count'  =>  'usuarios inscritos',
        'created_at'    =>  'fecha de creación',
        'updated_at'    =>  'fecha de actualización',
        'actions'       =>  'acciones',
        'event'         =>  'evento',
        'type_trans'    =>  'tipo',
        'user'          =>  'usuario',
        'tags'          =>  'etiquetas',
        'url'           =>  'url',
        'age'          =>  'edad',
        'validator'          =>  'validador',
        'user_agent'          =>  'agente de usuario',
        'new_values'          =>  'valores nuevos',
        'old_values'          =>  'valores anteriores',
        'email'          =>  'email',
        'phone'          =>  'teléfono',
        'observations_count'          =>  'cantidad de observaciones',
        'files_count'          =>  'cantidad de archivos',
        'pending_files_count'          =>  'cantidad de archivos pendientes por validación',
        'verified_at'          =>  'verificado',
        'citizen_portal'      =>  'portal ciudadano',
        'generated_by' => 'generado por',
        'period' => 'periodo',
        'period_dates' => 'del :start_date al :final_date',
    ],

    'classes' => [
        'App\Modules\CitizenPortal\src\Models\Activity' => 'Actividades',
        'App\Modules\CitizenPortal\src\Models\AgeGroup' => 'Grupo Etario',
        'App\Modules\CitizenPortal\src\Models\Citizen' => 'Ciudadano',
        'App\Modules\CitizenPortal\src\Models\CitizenSchedule' => 'Ciudadano - Inscripciones',
        'App\Modules\CitizenPortal\src\Models\Day' => 'Días',
        'App\Modules\CitizenPortal\src\Models\File' => 'Archivos',
        'App\Modules\CitizenPortal\src\Models\FileType' => 'Tipos de Archivos',
        'App\Modules\CitizenPortal\src\Models\Hour' => 'Horas',
        'App\Modules\CitizenPortal\src\Models\Observation' => 'Observaciones',
        'App\Modules\CitizenPortal\src\Models\Profile' => 'Perfil',
        'App\Modules\CitizenPortal\src\Models\ProfileType' => 'Tipo de perfil',
        'App\Modules\CitizenPortal\src\Models\Program' => 'Programas',
        'App\Modules\CitizenPortal\src\Models\Schedule' => 'Horarios',
        'App\Modules\CitizenPortal\src\Models\ScheduleView' => 'Horarios',
        'App\Modules\CitizenPortal\src\Models\Stage' => 'Escenarios',
        'App\Modules\CitizenPortal\src\Models\Status' => 'Estados del Sistema',
    ]
];
