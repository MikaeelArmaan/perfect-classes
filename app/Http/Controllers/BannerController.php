<?php

namespace App\Http\Controllers;

use App\DataTables\BannerDataTable;
use App\Http\Requests;
use App\Http\Requests\CreateBannerRequest;
use App\Http\Requests\UpdateBannerRequest;
use App\Repositories\BannerRepository;
use Flash;
use App\Http\Controllers\AppBaseController;
use Response;
use App\Repositories\BannerImagesRepository;
use DB;

class BannerController extends AppBaseController
{
    /** @var BannerRepository $bannerRepository*/
    private $bannerRepository;

    /** @var BannerImagesRepository $bannerImagesRepository*/
    private $bannerImagesRepository;

    public function __construct(BannerRepository $bannerRepo, BannerImagesRepository $bannerImagesRepo)
    {
        $this->bannerRepository = $bannerRepo;
        $this->bannerImagesRepository = $bannerImagesRepo;
    }

    /**
     * Display a listing of the Banner.
     *
     * @param BannerDataTable $bannerDataTable
     *
     * @return Response
     */
    public function index(BannerDataTable $bannerDataTable)
    {
        return $bannerDataTable->render('banners.index');
    }

    /**
     * Show the form for creating a new Banner.
     *
     * @return Response
     */
    public function create()
    {
        return view('banners.create');
    }

    /**
     * Store a newly created Banner in storage.
     *
     * @param CreateBannerRequest $request
     *
     * @return Response
     */
    public function store(CreateBannerRequest $request)
    {
        $input = $request->all();
        DB::beginTransaction();
         try{
            $banner = $this->bannerRepository->create($input);
            if($banner && count($input['slider']) > 0){
                $input['banner_id'] = $banner->id;
                $fileInput = [];
                foreach($input['slider'] as $_key => $slide){
                    $file_upload            = $slide['image'];
                    $name                   = time() . '_' . $file_upload->getClientOriginalName();
                    $filePath               = $file_upload->storeAs('uploads', $name, 'public');
                    unset($slide['image']);
                    $slide['image']         = $filePath;
                    $slide['banner_id']     = $banner->id;
                    $fileInput[$_key] = $slide;
                } 
                $bannerImages = $this->bannerImagesRepository->insert($fileInput);
            }
            DB::commit();
         }catch (\Exception $e) {
             \Illuminate\Support\Facades\Log::error($e->getMessage());
                DB::rollBack();
         }
        Flash::success(__('messages.saved', ['model' => __('models/banners.singular')]));

        return redirect(route('banners.index'));
    }

    /**
     * Display the specified Banner.
     *
     * @param int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $banner = $this->bannerRepository->find($id);

        if (empty($banner)) {
            Flash::error(__('messages.not_found', ['model' => __('models/banners.singular')]));

            return redirect(route('banners.index'));
        }

        return view('banners.show')->with('banner', $banner);
    }

    /**
     * Show the form for editing the specified Banner.
     *
     * @param int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $banner = $this->bannerRepository->find($id);
        //$bannerImages = $this->bannerImagesRepository->getAllByBannerId($id);
        if (empty($banner)) {
            Flash::error(__('messages.not_found', ['model' => __('models/banners.singular')]));

            return redirect(route('banners.index'));
        }

        return view('banners.edit')->with('banner', $banner);
    }

    /**
     * Update the specified Banner in storage.
     *
     * @param int $id
     * @param UpdateBannerRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateBannerRequest $request)
    {
        $banner = $this->bannerRepository->find($id);

        if (empty($banner)) {
            Flash::error(__('messages.not_found', ['model' => __('models/banners.singular')]));

            return redirect(route('banners.index'));
        }

        $banner = $this->bannerRepository->update($request->all(), $id);

        Flash::success(__('messages.updated', ['model' => __('models/banners.singular')]));

        return redirect(route('banners.index'));
    }

    /**
     * Remove the specified Banner from storage.
     *
     * @param int $id
     *
     * @return Response
     */
    public function destroy($id)
    {
        $banner = $this->bannerRepository->find($id);

        if (empty($banner)) {
            Flash::error(__('messages.not_found', ['model' => __('models/banners.singular')]));

            return redirect(route('banners.index'));
        }

        $this->bannerRepository->delete($id);

        Flash::success(__('messages.deleted', ['model' => __('models/banners.singular')]));

        return redirect(route('banners.index'));
    }
}
