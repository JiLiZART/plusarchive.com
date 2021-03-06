<?php

/*
 * This file is part of the plusarchive.com
 *
 * (c) Tomoki Morita <tmsongbooks215@gmail.com>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace app\tests\unit\helpers;

use Yii;
use Codeception\Test\Unit;

class FunctionsTest extends Unit
{
    public function testApp()
    {
        $this->assertSame(Yii::$app, app());
    }

    public function testDb()
    {
        $this->assertSame(Yii::$app->getDb(), db());
    }

    public function testFormatter()
    {
        $this->assertSame(Yii::$app->getFormatter(), formatter());
    }

    public function testRequest()
    {
        $this->assertSame(Yii::$app->getRequest(), request());
    }

    public function testResponse()
    {
        $this->assertSame(Yii::$app->getResponse(), response());
    }

    public function testSession()
    {
        $this->assertSame(Yii::$app->getSession(), session());
    }

    public function testSecurity()
    {
        $this->assertSame(Yii::$app->getSecurity(), security());
    }

    public function testUser()
    {
        $this->assertSame(Yii::$app->getUser(), user());
    }

    public function testHashids()
    {
        $this->assertSame(Yii::$app->hashids, hashids());
    }

    public function testUrl()
    {
        $this->assertSame('/index-test.php/foo/index?q=bar', url(['/foo/index', 'q' => 'bar']));
    }

    public function testH()
    {
        $this->assertSame('&lt;script&gt;alert(&#039;xss&#039;);&lt;/script&gt;', h("<script>alert('xss');</script>"));
    }

    public function testAsset()
    {
        $this->assertTrue((bool)preg_match('#\A\/assets/app-[0-9a-f]+\.css\z#', asset('app.css')));
        $this->assertTrue((bool)preg_match('#\A\/assets/app-[0-9a-f]+\.js\z#', asset('app.js')));
        $this->assertTrue((bool)preg_match('#\A\/assets/favicon-[0-9a-f]+\.png\z#', asset('favicon.png')));
        $this->assertTrue((bool)preg_match('#\A\/assets/apple-touch-icon-[0-9a-f]+\.png\z#', asset('apple-touch-icon.png')));

        $this->assertSame('/assets/foo.css', asset('foo.css'));

    }

    public function testCustomDomains()
    {
        $domains = custom_domains();
        $this->assertArrayHasKey('bandcamp.com', $domains);
        $this->assertArrayHasKey('botanicalhouse.net', $domains);
        $this->assertArrayHasKey('mamabirdrecordingco.com', $domains);
        $this->assertSame('bandcamp', $domains['bandcamp.com']);
        $this->assertSame('bandcamp', $domains['botanicalhouse.net']);
        $this->assertSame('bandcamp', $domains['mamabirdrecordingco.com']);
    }
}
