<?php

namespace App\Http\Controllers\Api;

use App\Http\Requests\SignatureRequest;
use App\Http\Resources\SignatureResource;
use App\Repositories\SignatureRepository;
use App\Signature;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class SignatureController extends Controller
{
    /**
     * @var SignatureRepository
     */
    protected $signatureRepository;

    /**
     * SignatureController constructor.
     *
     * @param SignatureRepository $signatureRepository
     */
    public function __construct(SignatureRepository $signatureRepository)
    {
        $this->signatureRepository = $signatureRepository;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Resources\Json\AnonymousResourceCollection
     */
    public function index()
    {
        $signatures = $this->signatureRepository
            ->ignoreFlagged()
            ->paginate(20);

        return SignatureResource::collection($signatures);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param SignatureRequest $request
     *
     * @return SignatureResource
     */
    public function store(SignatureRequest $request)
    {
        $signature = $request->only(['name', 'email', 'body']);
        $signature = $this->signatureRepository->create($signature);

        return new SignatureResource($signature);
    }

    /**
     * Display the specified resource.
     *
     * @param Signature $signature
     *
     * @return \Illuminate\Http\Resources\Json\AnonymousResourceCollection
     */
    public function show(Signature $signature)
    {
        return new SignatureResource($signature);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
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
        //
    }
}
