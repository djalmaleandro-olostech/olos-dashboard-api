<?php

namespace App\Http\Resources;

use App\Helpers\DatetHelper;
use App\Helpers\StatusHelper;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class EmployeeResource extends JsonResource
{
    public function toArray(Request $request): array
    {
        return [
            'id'               => $this->id,
            'name'             => $this->name,
            'email'            => $this->email,
            'jira_account_id'  => $this->jira_account_id,
            'status'           => [
                'id'   => $this->status,
                'name' => StatusHelper::getStatusName($this->status),
            ],
            'squads' => $this->whenLoaded('squads', function () {
                return $this->squads->map(function ($squad) {
                    return [
                        'id'   => $squad->id,
                        'name' => $squad->name,
                    ];
                });
            }),
            'updated_at'       => DatetHelper::toBR($this->updated_at),
            'created_at'       => DatetHelper::toBR($this->created_at),
        ];
    }
}
