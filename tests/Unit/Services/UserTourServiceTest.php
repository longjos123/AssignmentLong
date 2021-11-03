<?php

namespace Services;

use App\Repositories\Contracts\RepositoryInterface\TourRepositoryInterface;
use App\Repositories\Contracts\RepositoryInterface\UserTourRepositoryInterface;
use App\Services\UserTourService;
use Mockery as m;
use Tests\TestCase;

class UserTourServiceTest extends TestCase
{
    /**
     * @var UserTourRepositoryInterface|m\LegacyMockInterface|m\MockInterface
     */
    private $userTourRepo;
    /**
     * @var UserTourService
     */
    private $userTourService;
    /**
     * @var TourRepositoryInterface|m\LegacyMockInterface|m\MockInterface
     */
    private $tourRepo;

    public function setUp(): void
    {
        parent::setUp();
        $this->userTourRepo = m::mock(UserTourRepositoryInterface::class);
        $this->tourRepo = m::mock(TourRepositoryInterface::class);
        $this->userTourService = new UserTourService($this->userTourRepo, $this->tourRepo);
    }

    /**
     * @test
     * @covers ::create
     */
    public function testAdd()
    {
        $request = [
            'user_id' => '1',
            'tour_id' => '2',
            'num_people' => '4',
            'hotel_id' => '2',
            'phone_number' => '02323132132',
            'start_date' => '2018-02-3',
            'name' => 'long'
        ];
        $booking = (object)$request;
        $this->userTourRepo->shouldReceive('find')->with('2')->andReturnTrue();
        $this->userTourRepo->shouldReceive('create')->with($booking)->andReturnTrue();
        $actual = $this->userTourService->add($booking);

        $this->assertTrue($actual);
    }

    /**
     * @test
     * @covers ::update
     */
    public function testUpdate()
    {
        $request = [
            'phone_number' => '023423424',
            'num_people' => '2',
            'hotel_id' => '2',
            'start_date' => '2019-03-05',
            'status' => 1
        ];
        $userTour = (object) $request;

        $this->userTourRepo->shouldReceive('update')->andReturnTrue();
        $actual = $this->userTourService->update(2, $userTour);

        $this->assertTrue($actual);
    }


    public function tearDown(): void
    {
        parent::tearDown();
        m::close();
    }
}
