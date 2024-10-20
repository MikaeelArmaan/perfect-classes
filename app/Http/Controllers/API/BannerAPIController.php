<?php

namespace App\Http\Controllers\API;

use App\Http\Requests\API\CreateBannerAPIRequest;
use App\Http\Requests\API\UpdateBannerAPIRequest;
use App\Models\Banner;
use App\Repositories\BannerRepository;
use Illuminate\Http\Request;
use App\Http\Controllers\AppBaseController;
use Response;

/**
 * Class BannerController
 * @package App\Http\Controllers\API
 */

class BannerAPIController extends AppBaseController
{
    /** @var  BannerRepository */
    private $bannerRepository;

    public function __construct(BannerRepository $bannerRepo)
    {
        $this->bannerRepository = $bannerRepo;
    }

    /**
     * Display a listing of the Banner.
     * GET|HEAD /banners
     *
     * @param Request $request
     * @return Response
     */
    public function index(Request $request)
    {
        $banners = $this->bannerRepository->all(
            $request->except(['skip', 'limit']),
            $request->get('skip'),
            $request->get('limit')
        );

        return $this->sendResponse(
            $banners->toArray(),
            __('messages.retrieved', ['model' => __('models/banners.plural')])
        );
    }

    /**
     * Store a newly created Banner in storage.
     * POST /banners
     *
     * @param CreateBannerAPIRequest $request
     *
     * @return Response
     */
    public function store(CreateBannerAPIRequest $request)
    {
        $input = $request->all();

        $banner = $this->bannerRepository->create($input);

        return $this->sendResponse(
            $banner->toArray(),
            __('messages.saved', ['model' => __('models/banners.singular')])
        );
    }

    /**
     * Display the specified Banner.
     * GET|HEAD /banners/{id}
     *
     * @param int $id
     *
     * @return Response
     */
    public function show($id)
    {
        /** @var Banner $banner */
        $banner = $this->bannerRepository->find($id);

        if (empty($banner)) {
            return $this->sendError(
                __('messages.not_found', ['model' => __('models/banners.singular')])
            );
        }

        return $this->sendResponse(
            $banner->toArray(),
            __('messages.retrieved', ['model' => __('models/banners.singular')])
        );
    }

    /**
     * Update the specified Banner in storage.
     * PUT/PATCH /banners/{id}
     *
     * @param int $id
     * @param UpdateBannerAPIRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateBannerAPIRequest $request)
    {
        $input = $request->all();

        /** @var Banner $banner */
        $banner = $this->bannerRepository->find($id);

        if (empty($banner)) {
            return $this->sendError(
                __('messages.not_found', ['model' => __('models/banners.singular')])
            );
        }

        $banner = $this->bannerRepository->update($input, $id);

        return $this->sendResponse(
            $banner->toArray(),
            __('messages.updated', ['model' => __('models/banners.singular')])
        );
    }

    /**
     * Remove the specified Banner from storage.
     * DELETE /banners/{id}
     *
     * @param int $id
     *
     * @throws \Exception
     *
     * @return Response
     */
    public function destroy($id)
    {
        /** @var Banner $banner */
        $banner = $this->bannerRepository->find($id);

        if (empty($banner)) {
            return $this->sendError(
                __('messages.not_found', ['model' => __('models/banners.singular')])
            );
        }

        $banner->delete();

        return $this->sendResponse(
            $id,
            __('messages.deleted', ['model' => __('models/banners.singular')])
        );
    }
}
