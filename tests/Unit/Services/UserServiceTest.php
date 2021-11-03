<?php

namespace Services;

use App\Models\User;
use App\Repositories\Contracts\RepositoryInterface\UserRepositoryInterface;
use App\Services\UserService;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;
use PHPUnit\Framework\TestCase;
use Mockery as m;
use Illuminate\Support\Facades\Hash;

class UserServiceTest extends TestCase
{
    use RefreshDatabase;
    use WithFaker;


    /**
     * @var UserRepositoryInterface|MockInterface
     */
    private $userRepository;

    /**
     * @var UserService
     */
    private $target;


    public function setUp(): void
    {
        parent::setUp();
        $this->userRepository = m::mock(UserRepositoryInterface::class);
        $this->target = new UserService($this->userRepository);
    }
    /**
     * @test
     * @covers ::create
     */
    public function testAdd()
    {
        $user = $this->addUser();
        $userOb = (object) $user;
        $this->userRepository->shouldReceive('create')->andReturnTrue();

        if($userOb->hasFile('image')){

        }
        $actual = $this->target->add($userOb);

        $this->assertTrue($actual);
    }

    public function tearDown(): void
    {
        parent::tearDown();
        m::close();
    }

    private function addUser(){
        return [
            'fullname' => 'adsfg',
            'email' => 'adsfg',
            'password' => '123',
            'phone_number' => 'adsfg',
            'address' => 'adsfg',
            'birth_date' => '2021-12-1',
            'gender' => 1,
            'role' => 0,

        ];
    }
}
