<?php

namespace Services;

use App\Repositories\Contracts\RepositoryInterface\TourRepositoryInterface;
use App\Services\TourService;
use Illuminate\Http\UploadedFile;
use PHPUnit\Framework\TestCase;
use Mockery as m;

class TourServiceTest extends TestCase
{
    /**
     * @var TourRepositoryInterface|m\LegacyMockInterface|m\MockInterface
     */
    private $tourRepo;

    /**
     * @var TourService
     */
    private $tourService;

    public function setUp(): void
    {
        parent::setUp();
        $this->tourRepo = m::mock(TourRepositoryInterface::class);
        $this->tourService = new TourService($this->tourRepo);
    }

    public function test_add_tour_when_image_null()
    {
        $data = [
            'name' => 'adsads',
            'num_day' => '3',
            'transport_id' => '2',
            'description' => 'daasd',
            'price' => 3323,
            'countries_id' => '2',
        ];

        $this->tourRepo->shouldReceive('create')->andReturnTrue();
        $actual = $this->tourService->addTour($data);

        $this->assertTrue($actual);
    }

    public function test_add_tour_when_image_not_null()
    {
        $data = [
            'name' => 'adsads',
            'num_day' => '3',
            'transport_id' => '2',
            'description' => 'daasd',
            'price' => 3323,
            'countries_id' => '2',
            'image' => UploadedFile::fake()->image('aaa.jpg')
        ];
        $this->tourRepo->shouldReceive('create')->andReturnTrue();
        $actual = $this->tourService->addTour($data);

        $this->assertTrue($actual);
    }


}
