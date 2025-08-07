<?php

namespace App\Http\Controllers;

use App\Http\Requests\EmployeeStoreUpdateRequest;
use App\Http\Resources\EmployeeResource;
use App\Models\Employee;

class EmployeeController extends Controller
{
     public function __construct(
        protected Employee $model,
    ) {
    }
    public function index()
    {
        $perPage = request()->get('per_page', 10);
        $filter = request()->get('filter', '');
        $query = $this->model->with('squads');

        if (!empty($filter)) {
            $query->where('name', 'like', "%{$filter}%");
        }

        return EmployeeResource::collection(
            $query->paginate($perPage)
        );
    }

    public function show(string $id)
    {
        $employee = $this->model->with('squads')->findOrFail($id);
        return new EmployeeResource($employee);
    }

    public function store(EmployeeStoreUpdateRequest $request)
    {
        $data = $request->validated();
        $employee = $this->model->create($data);
        $employee->squads()->sync($request->squads);
        $employee->load('squads');

        return new EmployeeResource($employee);
    }

    public function update(EmployeeStoreUpdateRequest $request, string $id)
    {
        $employee = $this->model->findOrFail($id);
        $data = $request->validated();
        $employee->update($data);
        $employee->squads()->sync($request->squads);
        $employee->load('squads');

        return new EmployeeResource($employee);
    }

    public function destroy(string $id)
    {
        $employee = $this->model->findOrFail($id);
        $employee->roles()->detach();
        $employee->delete();
        return response()->noContent();
    }
}
