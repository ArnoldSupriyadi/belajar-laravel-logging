<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Support\Facades\Log;
use Tests\TestCase;

class LoggingTest extends TestCase
{
    public function testLogging()
    {
        Log::info("Hello Info");
        Log::warning("Hello Info");
        Log::error("Hello Info");
        Log::critical("Hello Info");

        self::assertTrue(true);
    }

    public function testContext()
    {
        Log::info("Hello Info", ["user" => "arnold"]);

        self::assertTrue(true);
    }

    public function testWithContext()
    {
        Log::withContext(["user" => "arnold"]);

        Log::info("Hello Info");
        Log::info("Hello Info");
        Log::info("Hello Info");

        self::assertTrue(true);
    }

    public function testWithChannel()
    {
        $slackLogger = Log::channel('slack');
        $slackLogger->error("Hello Slack");

        Log::info("Hello Laravel"); //mengirim ke default channel

        self::assertTrue(true);
    }

    public function testChannel()
    {
        $slackLogger = Log::channel("slack");
        $slackLogger->error("Hello Slack");

        Log::info("Helo Laravel");
        self::assertTrue(true);
    }

    public function testFileHandler()
    {
        $filelogger = Log::channel("file");
        $filelogger->info("Hello File Handler");
        $filelogger->warning("Hello File Handler");
        $filelogger->error("Hello File Handler");
        $filelogger->info("Hello File Handler");

        self::assertTrue(true);
    }
}
