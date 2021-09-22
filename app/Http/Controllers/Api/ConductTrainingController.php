<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\ConductTrainingStoreRequest;
use App\Http\Resources\ConductTrainingResource;
use App\Repository\ConductTrainingRepositoryInterface;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ConductTrainingController extends Controller
{

    private $conductTrainingRepository;

    public function __construct(ConductTrainingRepositoryInterface $conductTrainingRepository)
    {
        $this->conductTrainingRepository = $conductTrainingRepository;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return ConductTrainingResource::collection($this->conductTrainingRepository->all());
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(ConductTrainingStoreRequest $request)
    {
        $conduct = $request->validated();
        $conduct['user_id'] = Auth::user()->id;
//        $conduct['user_id'] = 23771;
        return $this->conductTrainingRepository->create($conduct);

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        return new ConductTrainingResource($this->conductTrainingRepository->find($id));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        return response()->json($this->conductTrainingRepository->delete($id));
    }
}
