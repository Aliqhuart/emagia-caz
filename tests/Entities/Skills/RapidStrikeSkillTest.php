<?php

namespace Emagia\Entities\Skills;

use Emagia\Traits\TestValueProvider;
use PHPUnit\Framework\TestCase;

/**
 * Class RapidStrikeSkillTest
 *
 * @package Emagia\Entities\Skills
 * @author  Corin Zotica <alexandru.corin.zotica@gmail.com>
 */
class RapidStrikeSkillTest extends TestCase
{
    use TestValueProvider;

    /**
     * @var RapidStrikeSkill
     */
    protected $skill;

    protected function setUp()
    {
        $this->skill = new RapidStrikeSkill();
    }

    /**
     * @dataProvider provideForTestString
     *
     * @param $data
     * @param $expectedResult
     */
    public function testSetGetName($data, $expectedResult)
    {
        $this->skill->setName($data);

        $this->assertSame($expectedResult, $this->skill->getName());
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
        $this->skill->setName($data);
        $this->skill->getName();
    }

    /**
     * @dataProvider provideForTestString
     *
     * @param $data
     * @param $expectedResult
     */
    public function testSetGetModifiedSkill($data, $expectedResult)
    {
        $this->skill->setModifiedSkill($data);

        $this->assertSame($expectedResult, $this->skill->getModifiedSkill());
    }

    /**
     * @dataProvider provideForTestExceptionString
     *
     * @param $data
     * @param $expectedError
     */
    public function testExceptionSetGetModifiedSkill($data, $expectedError)
    {
        $this->expectException($expectedError);
        $this->skill->setModifiedSkill($data);
        $this->skill->getModifiedSkill();
    }

    /**
     * @dataProvider provideForTestFloat
     *
     * @param $data
     * @param $expectedResult
     */
    public function testSetGetModifier($data, $expectedResult)
    {
        $this->skill->setModifier($data);

        $this->assertSame($expectedResult, $this->skill->getModifier());
    }

    /**
     * @dataProvider provideForTestExceptionFloat
     *
     * @param $data
     * @param $expectedError
     */
    public function testExceptionSetGetModifier($data, $expectedError)
    {
        $this->expectException($expectedError);
        $this->skill->setModifier($data);
        $this->skill->getModifier();
    }

    /**
     * @dataProvider provideForTestInt
     *
     * @param $data
     * @param $expectedResult
     */
    public function testSetGetChange($data, $expectedResult)
    {
        $this->skill->setChance($data);

        $this->assertSame($expectedResult, $this->skill->getChance());
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
        $this->skill->setChance($data);
        $this->skill->getChance();
    }
}