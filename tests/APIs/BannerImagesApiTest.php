<?php namespace Tests\APIs;

use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use Tests\TestCase;
use Tests\ApiTestTrait;
use App\Models\BannerImages;

class BannerImagesApiTest extends TestCase
{
    use ApiTestTrait, WithoutMiddleware, DatabaseTransactions;

    /**
     * @test
     */
    public function test_create_banner_images()
    {
        $bannerImages = BannerImages::factory()->make()->toArray();

        $this->response = $this->json(
            'POST',
            '/api/banner_images', $bannerImages
        );

        $this->assertApiResponse($bannerImages);
    }

    /**
     * @test
     */
    public function test_read_banner_images()
    {
        $bannerImages = BannerImages::factory()->create();

        $this->response = $this->json(
            'GET',
            '/api/banner_images/'.$bannerImages->id
        );

        $this->assertApiResponse($bannerImages->toArray());
    }

    /**
     * @test
     */
    public function test_update_banner_images()
    {
        $bannerImages = BannerImages::factory()->create();
        $editedBannerImages = BannerImages::factory()->make()->toArray();

        $this->response = $this->json(
            'PUT',
            '/api/banner_images/'.$bannerImages->id,
            $editedBannerImages
        );

        $this->assertApiResponse($editedBannerImages);
    }

    /**
     * @test
     */
    public function test_delete_banner_images()
    {
        $bannerImages = BannerImages::factory()->create();

        $this->response = $this->json(
            'DELETE',
             '/api/banner_images/'.$bannerImages->id
         );

        $this->assertApiSuccess();
        $this->response = $this->json(
            'GET',
            '/api/banner_images/'.$bannerImages->id
        );

        $this->response->assertStatus(404);
    }
}
