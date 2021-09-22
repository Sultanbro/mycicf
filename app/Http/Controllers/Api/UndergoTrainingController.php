<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\UndergoTrainingStoreRequest;
use App\Http\Resources\UndergoTrainingResource;
use App\Repository\UndergoTrainingRepositoryInterface;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UndergoTrainingController extends Controller
{

    private $undergoTrainingRepository;

    public function __construct(UndergoTrainingRepositoryInterface $undergoTrainingRepository)
    {
        $this->undergoTrainingRepository = $undergoTrainingRepository;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return UndergoTrainingResource::collection($this->undergoTrainingRepository->all());
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(UndergoTrainingStoreRequest $request)
    {
        $undergo = $request->validated();
//        $undergo['user_id'] = 18895;
        $user_id['user_id'] = Auth::user()->id;
        return $this->undergoTrainingRepository->create($undergo);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        return new UndergoTrainingResource($this->undergoTrainingRepository->find($id));
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
        return response()->json($this->undergoTrainingRepository->delete($id));
    }
}
