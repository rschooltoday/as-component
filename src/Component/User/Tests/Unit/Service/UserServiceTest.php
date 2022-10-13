<?php

namespace Rst\AsComponent\User\Tests\Unit\Service;

use PHPUnit\Framework\TestCase;
use Rst\AsComponent\User\Application\Service\UserService;

class UserServiceTest extends TestCase
{
    public function testInitService()
    {
        $userService = new UserService();
        $this->assertInstanceOf(UserService::class, $userService);
    }

    public function testGetListUsers()
    {
        $userService = new UserService();
        $this->assertInstanceOf(UserService::class, $userService);
    }
}
