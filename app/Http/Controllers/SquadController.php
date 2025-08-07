<?php

namespace App\Http\Controllers;

use App\Helpers\StatusHelper;
use App\Http\Requests\SquadStoreUpdateRequest;
use App\Http\Resources\SquadResource;
use App\Models\Squad;

class SquadController extends Controller
{
    public function __construct(
        protected Squad $model,
    ) {
    }

    public function index()
    {
        $perPage = request()->get('per_page', 10);
        $name = request()->get('name', '');
        $query = $this->model->with('employees');

        if (!empty($name)) {
            $query->where('name', 'like', "%{$name}%");
        }

        return SquadResource::collection(
            $query->paginate($perPage)
        );
    }

    public function getActive()
    {
        $query = $this->model->where('status', StatusHelper::ACTIVE);
        return SquadResource::collection($query->get());
    }

    public function show(string $id)
    {
        $squad = $this->model->with('employees')->findOrFail($id);
        return new SquadResource($squad);
    }

    public function store(SquadStoreUpdateRequest $request)
    {
        $data = $request->validated();
        $squad = $this->model->create($data);

        if ($request->has('employees')) {
            $squad->employees()->sync($request->employees);
        }

        $squad->load('employees');

        return new SquadResource($squad);
    }

    public function update(SquadStoreUpdateRequest $request, string $id)
    {
        $squad = $this->model->findOrFail($id);
        $data = $request->validated();
        $squad->update($data);

        if ($request->has('employees')) {
            $squad->employees()->sync($request->employees);
        }

        $squad->load('employees');

        return new SquadResource($squad);
    }

    public function destroy(string $id)
    {
        $squad = $this->model->findOrFail($id);
        $squad->employees()->detach();
        $squad->delete();

        return response()->noContent();
    }
}
