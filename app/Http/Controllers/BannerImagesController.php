<?php

namespace App\Http\Controllers;

use App\DataTables\BannerImagesDataTable;
use App\Http\Requests;
use App\Http\Requests\CreateBannerImagesRequest;
use App\Http\Requests\UpdateBannerImagesRequest;
use App\Repositories\BannerImagesRepository;
use Flash;
use App\Http\Controllers\AppBaseController;
use Response;

class BannerImagesController extends AppBaseController
{
    /** @var BannerImagesRepository $bannerImagesRepository*/
    private $bannerImagesRepository;

    public function __construct(BannerImagesRepository $bannerImagesRepo)
    {
        $this->bannerImagesRepository = $bannerImagesRepo;
    }

    /**
     * Display a listing of the BannerImages.
     *
     * @param BannerImagesDataTable $bannerImagesDataTable
     *
     * @return Response
     */
    public function index(BannerImagesDataTable $bannerImagesDataTable)
    {
        return $bannerImagesDataTable->render('banner_images.index');
    }

    /**
     * Show the form for creating a new BannerImages.
     *
     * @return Response
     */
    public function create()
    {
        return view('banner_images.create');
    }

    /**
     * Store a newly created BannerImages in storage.
     *
     * @param CreateBannerImagesRequest $request
     *
     * @return Response
     */
    public function store(CreateBannerImagesRequest $request)
    {
        $input = $request->all();

        $bannerImages = $this->bannerImagesRepository->create($input);

        Flash::success(__('messages.saved', ['model' => __('models/bannerImages.singular')]));

        return redirect(route('bannerImages.index'));
    }

    /**
     * Display the specified BannerImages.
     *
     * @param int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $bannerImages = $this->bannerImagesRepository->find($id);

        if (empty($bannerImages)) {
            Flash::error(__('messages.not_found', ['model' => __('models/bannerImages.singular')]));

            return redirect(route('bannerImages.index'));
        }

        return view('banner_images.show')->with('bannerImages', $bannerImages);
    }

    /**
     * Show the form for editing the specified BannerImages.
     *
     * @param int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $bannerImages = $this->bannerImagesRepository->find($id);

        if (empty($bannerImages)) {
            Flash::error(__('messages.not_found', ['model' => __('models/bannerImages.singular')]));

            return redirect(route('bannerImages.index'));
        }

        return view('banner_images.edit')->with('bannerImages', $bannerImages);
    }

    /**
     * Update the specified BannerImages in storage.
     *
     * @param int $id
     * @param UpdateBannerImagesRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateBannerImagesRequest $request)
    {
        $bannerImages = $this->bannerImagesRepository->find($id);

        if (empty($bannerImages)) {
            Flash::error(__('messages.not_found', ['model' => __('models/bannerImages.singular')]));

            return redirect(route('bannerImages.index'));
        }

        $bannerImages = $this->bannerImagesRepository->update($request->all(), $id);

        Flash::success(__('messages.updated', ['model' => __('models/bannerImages.singular')]));

        return redirect(route('bannerImages.index'));
    }

    /**
     * Remove the specified BannerImages from storage.
     *
     * @param int $id
     *
     * @return Response
     */
    public function destroy($id)
    {
        $bannerImages = $this->bannerImagesRepository->find($id);

        if (empty($bannerImages)) {
            Flash::error(__('messages.not_found', ['model' => __('models/bannerImages.singular')]));

            return redirect(route('bannerImages.index'));
        }

        $this->bannerImagesRepository->delete($id);

        Flash::success(__('messages.deleted', ['model' => __('models/bannerImages.singular')]));

        return redirect(route('bannerImages.index'));
    }
}
