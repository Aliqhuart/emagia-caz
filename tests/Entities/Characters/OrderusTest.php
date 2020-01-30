<?php

namespace Emagia\Entities\Characters;

use Emagia\Errors\CharacterCreationException;
use Emagia\Traits\TestValueProvider;
use PHPUnit\Framework\TestCase;

/**
 * Class OrderusTest
 *
 * @package Emagia\Entities\Characters
 * @author  Corin Zotica <corin.zotica@dcsplus.net>
 */
class OrderusTest extends TestCase
{
    use TestValueProvider;

    /**
     * @var Orderus
     */
    protected $orderus;

    /**
     * @throws CharacterCreationException
     */
    protected function setUp()
    {
        $this->orderus = new Orderus(0,0,0,0,0);
    }

    /**
     * @dataProvider provideForTestString
     *
     * @param $data
     * @param $expectedResult
     */
    public function testSetGetName($data, $expectedResult)
    {
        $this->orderus->setName($data);

        $this->assertSame($expectedResult, $this->orderus->getName());
    }

    /**
     * @dataProvider provideForTestExceptionString
     *
     * @param $data
     * @param $expectedError
     */
    public function testExceptionSetGetName($data, $expectedError)
    {
        $this->expectException($expectedError);
        $this->orderus->setName($data);
        $this->orderus->getName();
    }

    /**
     * @dataProvider provideForTestInt
     *
     * @param $data
     * @param $expectedResult
     */
    public function testSetGetHealth($data, $expectedResult)
    {
        $this->orderus->setHealth($data);

        $this->assertSame($expectedResult, $this->orderus->getHealth());
    }

    /**
     * @dataProvider provideForTestExceptionInt
     *
     * @param $data
     * @param $expectedError
     */
    public function testExceptionSetGetHealth($data, $expectedError)
    {
        $this->expectException($expectedError);
        $this->orderus->setHealth($data);
        $this->orderus->getHealth();
    }

    /**
     * @dataProvider provideForTestInt
     *
     * @param $data
     * @param $expectedResult
     */
    public function testSetGetStrength($data, $expectedResult)
    {
        $this->orderus->setStrength($data);

        $this->assertSame($expectedResult, $this->orderus->getStrength());
    }

    /**
     * @dataProvider provideForTestExceptionInt
     *
     * @param $data
     * @param $expectedError
     */
    public function testExceptionSetGetStrength($data, $expectedError)
    {
        $this->expectException($expectedError);
        $this->orderus->setStrength($data);
        $this->orderus->getStrength();
    }

    /**
 * @dataProvider provideForTestInt
 *
 * @param $data
 * @param $expectedResult
 */
    public function testSetGetDefence($data, $expectedResult)
    {
        $this->orderus->setDefence($data);

        $this->assertSame($expectedResult, $this->orderus->getDefence());
    }

    /**
     * @dataProvider provideForTestExceptionInt
     *
     * @param $data
     * @param $expectedError
     */
    public function testExceptionSetGetDefence($data, $expectedError)
    {
        $this->expectException($expectedError);
        $this->orderus->setDefence($data);
        $this->orderus->getDefence();
    }

    /**
     * @dataProvider provideForTestInt
     *
     * @param $data
     * @param $expectedResult
     */
    public function testSetGetSpeed($data, $expectedResult)
    {
        $this->orderus->setSpeed($data);

        $this->assertSame($expectedResult, $this->orderus->getSpeed());
    }

    /**
     * @dataProvider provideForTestExceptionInt
     *
     * @param $data
     * @param $expectedError
     */
    public function testExceptionSetGetSpeed($data, $expectedError)
    {
        $this->expectException($expectedError);
        $this->orderus->setSpeed($data);
        $this->orderus->getSpeed();
    }

    /**
     * @dataProvider provideForTestInt
     *
     * @param $data
     * @param $expectedResult
     */
    public function testSetGetLuck($data, $expectedResult)
    {
        $this->orderus->setLuck($data);

        $this->assertSame($expectedResult, $this->orderus->getLuck());
    }

    /**
     * @dataProvider provideForTestExceptionInt
     *
     * @param $data
     * @param $expectedError
     */
    public function testExceptionSetGetLuck($data, $expectedError)
    {
        $this->expectException($expectedError);
        $this->orderus->setLuck($data);
        $this->orderus->getLuck();
    }
}