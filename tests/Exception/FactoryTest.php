<?php

declare(strict_types=1);

namespace Tests\Exception;

use GuzzleHttp\Psr7\Response;
use Monobank\Exception\Factory;
use Monobank\Exception\InternalErrorException;
use Monobank\Exception\InvalidAccountException;
use Monobank\Exception\MonobankException;
use Monobank\Exception\TooManyRequestsException;
use Monobank\Exception\UnknownTokenException;
use PHPUnit\Framework\TestCase;

final class FactoryTest extends TestCase
{
    public function testInvalidAccountException(): void
    {
        $response = new Response(400, [], json_encode(['errorDescription' => 'invalid account']));
        $exception = Factory::createFromResponse($response);
        $this->assertInstanceOf(InvalidAccountException::class, $exception);
    }

    public function testUnknownTokenException(): void
    {
        $response = new Response(400, [], json_encode(['errorDescription' => 'Unknown \'X-Token\'']));
        $exception = Factory::createFromResponse($response);
        $this->assertInstanceOf(UnknownTokenException::class, $exception);
    }

    public function testTooManyRequestsException(): void
    {
        $response = new Response(429, [], json_encode(['errorDescription' => 'Too many requests']));
        $exception = Factory::createFromResponse($response);
        $this->assertInstanceOf(TooManyRequestsException::class, $exception);
    }

    public function testInternalErrorException(): void
    {
        $response = new Response(500, [], json_encode(['errorDescription' => 'internal error']));
        $exception = Factory::createFromResponse($response);
        $this->assertInstanceOf(InternalErrorException::class, $exception);
    }

    public function testMonobankException(): void
    {
        $response = new Response(400, [], json_encode(['errorDescription' => 'any other text']));
        $exception = Factory::createFromResponse($response);
        $this->assertInstanceOf(MonobankException::class, $exception);
    }
}
