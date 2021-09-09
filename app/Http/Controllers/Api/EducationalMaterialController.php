<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\EducationalMaterialStoreRequest;
use App\Http\Requests\EducationalMaterialUpdateRequest;
use App\Http\Resources\EducationalMaterialResource;
use App\Repository\EducationalMaterialRepositoryInterface;
use App\Repository\Eloquent\EducationalMaterialRepository;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class EducationalMaterialController extends Controller
{

    /**
     * @var
     */
    private $educationalMaterialRepository;

    /**
     * EducationalMaterialController constructor.
     * @param EducationalMaterialRepositoryInterface $educationalMaterialRepository
     */
    public function __construct(EducationalMaterialRepositoryInterface $educationalMaterialRepository)
    {
        $this->educationalMaterialRepository = $educationalMaterialRepository;
    }


    /**
     * Выводит все материалы для учебы
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Resources\Json\AnonymousResourceCollection
     */
    public function index()
    {
        return EducationalMaterialResource::collection($this->educationalMaterialRepository->all());
    }

    /**
     * Сохраняет материал для учебы
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Database\Eloquent\Model
     */
    public function store(EducationalMaterialStoreRequest $request)
    {
        $result = Storage::disk('local')->put("/public/education/{$request->type}", $request->file);
        $material = $request->validated();
        $material['link'] = $result;
        unset($material['file']);
        return $this->educationalMaterialRepository->create($material);
    }

    /**
     * Показывает МдУ по id
     * Display the specified resource.
     *
     * @param int $id
     * @return EducationalMaterialResource
     */
    public function show($id)
    {
        return new EducationalMaterialResource($this->educationalMaterialRepository->find($id));
    }

    /**
     * Меняет садержание Мду принимает id и изменения
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function update(EducationalMaterialUpdateRequest $request, $id)
    {
        return $this->educationalMaterialRepository->update($id, $request->validated());
    }

    /**
     * Удаляет Мду принимает id
     * Remove the specified resource from storage.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        if ($material = $this->educationalMaterialRepository->find($id)) {
            $this->educationalMaterialRepository->delete($material->id);
            if (Storage::delete($material->link)) {
                return response()->json(true);
            }
            return response()->json('Нет файла');
        }
        return response()->json('Нет файла');
    }
}
