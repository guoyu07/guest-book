<?php

namespace App\Http\Controllers\Api;

use App\Http\Resources\SignatureResource;
use App\Repositories\SignatureRepository;
use App\Signature;
use Carbon\Carbon;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class ReportSignatureController extends Controller
{
    /**
     * @var SignatureRepository
     */
    protected $signatureRepository;

    /**
     * ReportSignatureController constructor.
     *
     * @param SignatureRepository $signatureRepository
     */
    public function __construct(SignatureRepository $signatureRepository)
    {
        $this->signatureRepository = $signatureRepository;
    }

    /**
     * Update the specified resource in storage.
     *
     * @param Signature $signature
     *
     * @return SignatureResource
     */
    public function update(Signature $signature)
    {
        $attributes = [
            'flagged_at' => Carbon::now()
        ];

        $this->signatureRepository->update($signature->id, $attributes);

        $signature = $this->signatureRepository->getById($signature->id);

        return new SignatureResource($signature);
    }
}
