<?php

namespace App\Http\Controllers\API;

use App\Http\Requests\API\CreateBannerImagesAPIRequest;
use App\Http\Requests\API\UpdateBannerImagesAPIRequest;
use App\Models\BannerImages;
use App\Repositories\BannerImagesRepository;
use Illuminate\Http\Request;
use App\Http\Controllers\AppBaseController;
use Response;

/**
 * Class BannerImagesController
 * @package App\Http\Controllers\API
 */

class BannerImagesAPIController extends AppBaseController
{
    /** @var  BannerImagesRepository */
    private $bannerImagesRepository;

    public function __construct(BannerImagesRepository $bannerImagesRepo)
    {
        $this->bannerImagesRepository = $bannerImagesRepo;
    }

    /**
     * Display a listing of the BannerImages.
     * GET|HEAD /bannerImages
     *
     * @param Request $request
     * @return Response
     */
    public function index(Request $request)
    {
        $bannerImages = $this->bannerImagesRepository->all(
            $request->except(['skip', 'limit']),
            $request->get('skip'),
            $request->get('limit')
        );

        return $this->sendResponse(
            $bannerImages->toArray(),
            __('messages.retrieved', ['model' => __('models/bannerImages.plural')])
        );
    }

    /**
     * Store a newly created BannerImages in storage.
     * POST /bannerImages
     *
     * @param CreateBannerImagesAPIRequest $request
     *
     * @return Response
     */
    public function store(CreateBannerImagesAPIRequest $request)
    {
        $input = $request->all();

        $bannerImages = $this->bannerImagesRepository->create($input);

        return $this->sendResponse(
            $bannerImages->toArray(),
            __('messages.saved', ['model' => __('models/bannerImages.singular')])
        );
    }

    /**
     * Display the specified BannerImages.
     * GET|HEAD /bannerImages/{id}
     *
     * @param int $id
     *
     * @return Response
     */
    public function show($id)
    {
        /** @var BannerImages $bannerImages */
        $bannerImages = $this->bannerImagesRepository->find($id);

        if (empty($bannerImages)) {
            return $this->sendError(
                __('messages.not_found', ['model' => __('models/bannerImages.singular')])
            );
        }

        return $this->sendResponse(
            $bannerImages->toArray(),
            __('messages.retrieved', ['model' => __('models/bannerImages.singular')])
        );
    }

    /**
     * Update the specified BannerImages in storage.
     * PUT/PATCH /bannerImages/{id}
     *
     * @param int $id
     * @param UpdateBannerImagesAPIRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateBannerImagesAPIRequest $request)
    {
        $input = $request->all();

        /** @var BannerImages $bannerImages */
        $bannerImages = $this->bannerImagesRepository->find($id);

        if (empty($bannerImages)) {
            return $this->sendError(
                __('messages.not_found', ['model' => __('models/bannerImages.singular')])
            );
        }

        $bannerImages = $this->bannerImagesRepository->update($input, $id);

        return $this->sendResponse(
            $bannerImages->toArray(),
            __('messages.updated', ['model' => __('models/bannerImages.singular')])
        );
    }

    /**
     * Remove the specified BannerImages from storage.
     * DELETE /bannerImages/{id}
     *
     * @param int $id
     *
     * @throws \Exception
     *
     * @return Response
     */
    public function destroy($id)
    {
        /** @var BannerImages $bannerImages */
        $bannerImages = $this->bannerImagesRepository->find($id);

        if (empty($bannerImages)) {
            return $this->sendError(
                __('messages.not_found', ['model' => __('models/bannerImages.singular')])
            );
        }

        $bannerImages->delete();

        return $this->sendResponse(
            $id,
            __('messages.deleted', ['model' => __('models/bannerImages.singular')])
        );
    }
}
