<?php namespace Tests\Repositories;

use App\Models\BannerImages;
use App\Repositories\BannerImagesRepository;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use Tests\TestCase;
use Tests\ApiTestTrait;

class BannerImagesRepositoryTest extends TestCase
{
    use ApiTestTrait, DatabaseTransactions;

    /**
     * @var BannerImagesRepository
     */
    protected $bannerImagesRepo;

    public function setUp() : void
    {
        parent::setUp();
        $this->bannerImagesRepo = \App::make(BannerImagesRepository::class);
    }

    /**
     * @test create
     */
    public function test_create_banner_images()
    {
        $bannerImages = BannerImages::factory()->make()->toArray();

        $createdBannerImages = $this->bannerImagesRepo->create($bannerImages);

        $createdBannerImages = $createdBannerImages->toArray();
        $this->assertArrayHasKey('id', $createdBannerImages);
        $this->assertNotNull($createdBannerImages['id'], 'Created BannerImages must have id specified');
        $this->assertNotNull(BannerImages::find($createdBannerImages['id']), 'BannerImages with given id must be in DB');
        $this->assertModelData($bannerImages, $createdBannerImages);
    }

    /**
     * @test read
     */
    public function test_read_banner_images()
    {
        $bannerImages = BannerImages::factory()->create();

        $dbBannerImages = $this->bannerImagesRepo->find($bannerImages->id);

        $dbBannerImages = $dbBannerImages->toArray();
        $this->assertModelData($bannerImages->toArray(), $dbBannerImages);
    }

    /**
     * @test update
     */
    public function test_update_banner_images()
    {
        $bannerImages = BannerImages::factory()->create();
        $fakeBannerImages = BannerImages::factory()->make()->toArray();

        $updatedBannerImages = $this->bannerImagesRepo->update($fakeBannerImages, $bannerImages->id);

        $this->assertModelData($fakeBannerImages, $updatedBannerImages->toArray());
        $dbBannerImages = $this->bannerImagesRepo->find($bannerImages->id);
        $this->assertModelData($fakeBannerImages, $dbBannerImages->toArray());
    }

    /**
     * @test delete
     */
    public function test_delete_banner_images()
    {
        $bannerImages = BannerImages::factory()->create();

        $resp = $this->bannerImagesRepo->delete($bannerImages->id);

        $this->assertTrue($resp);
        $this->assertNull(BannerImages::find($bannerImages->id), 'BannerImages should not exist in DB');
    }
}
