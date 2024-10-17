<?php

namespace App\Http\Controllers;

use App\DataTables\imageDataTable;
use App\Http\Requests;
use App\Http\Requests\CreateimageRequest;
use App\Http\Requests\UpdateimageRequest;
use App\Repositories\imageRepository;
use Flash;
use App\Http\Controllers\AppBaseController;
use Response;

class imageController extends AppBaseController
{
    /** @var imageRepository $imageRepository*/
    private $imageRepository;

    public function __construct(imageRepository $imageRepo)
    {
        $this->imageRepository = $imageRepo;
    }

    /**
     * Display a listing of the image.
     *
     * @param imageDataTable $imageDataTable
     *
     * @return Response
     */
    public function index(imageDataTable $imageDataTable)
    {
        return $imageDataTable->render('images.index');
    }

    /**
     * Show the form for creating a new image.
     *
     * @return Response
     */
    public function create()
    {
        return view('images.create');
    }

    /**
     * Store a newly created image in storage.
     *
     * @param CreateimageRequest $request
     *
     * @return Response
     */
    public function store(CreateimageRequest $request)
    {
        $input = $request->all();

        $image = $this->imageRepository->create($input);

        Flash::success(__('messages.saved', ['model' => __('models/images.singular')]));

        return redirect(route('images.index'));
    }

    /**
     * Display the specified image.
     *
     * @param int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $image = $this->imageRepository->find($id);

        if (empty($image)) {
            Flash::error(__('messages.not_found', ['model' => __('models/images.singular')]));

            return redirect(route('images.index'));
        }

        return view('images.show')->with('image', $image);
    }

    /**
     * Show the form for editing the specified image.
     *
     * @param int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $image = $this->imageRepository->find($id);

        if (empty($image)) {
            Flash::error(__('messages.not_found', ['model' => __('models/images.singular')]));

            return redirect(route('images.index'));
        }

        return view('images.edit')->with('image', $image);
    }

    /**
     * Update the specified image in storage.
     *
     * @param int $id
     * @param UpdateimageRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateimageRequest $request)
    {
        $image = $this->imageRepository->find($id);

        if (empty($image)) {
            Flash::error(__('messages.not_found', ['model' => __('models/images.singular')]));

            return redirect(route('images.index'));
        }

        $image = $this->imageRepository->update($request->all(), $id);

        Flash::success(__('messages.updated', ['model' => __('models/images.singular')]));

        return redirect(route('images.index'));
    }

    /**
     * Remove the specified image from storage.
     *
     * @param int $id
     *
     * @return Response
     */
    public function destroy($id)
    {
        $image = $this->imageRepository->find($id);

        if (empty($image)) {
            Flash::error(__('messages.not_found', ['model' => __('models/images.singular')]));

            return redirect(route('images.index'));
        }

        $this->imageRepository->delete($id);

        Flash::success(__('messages.deleted', ['model' => __('models/images.singular')]));

        return redirect(route('images.index'));
    }
}
