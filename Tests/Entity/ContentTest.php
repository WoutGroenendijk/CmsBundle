<?php

namespace Opifer\CmsBundle\Tests\Entity;

use Opifer\CmsBundle\Entity\Content;
use Opifer\CmsBundle\Entity\Directory;
use Opifer\CmsBundle\Entity\Site;
use Opifer\CmsBundle\Entity\User;
use Opifer\CmsBundle\Entity\ValueSet;
use Opifer\EavBundle\Entity\NestedValue;

class ContentTest extends \PHPUnit_Framework_TestCase
{
    public function testSite()
    {
        $expected = new Site();
        $content = new Content();

        $content->setSite($expected);
        $actual = $content->getSite();

        $this->assertSame($expected, $actual);
    }

    public function testDirectory()
    {
        $expected = new Directory();
        $content = new Content();

        $content->setDirectory($expected);
        $actual = $content->getDirectory();

        $this->assertSame($expected, $actual);
    }

    public function testAuthor()
    {
        $expected = new User();
        $content = new Content();

        $content->setAuthor($expected);
        $actual = $content->getAuthor();

        $this->assertSame($expected, $actual);
    }

    public function testValueSet()
    {
        $expected = new ValueSet();
        $content = new Content();

        $content->setValueSet($expected);
        $actual = $content->getValueSet();

        $this->assertSame($expected, $actual);
    }

    public function testTitle()
    {
        $expected = 'Some Title';
        $content = new Content();

        $content->setTitle($expected);
        $actual = $content->getTitle();

        $this->assertSame($expected, $actual);
    }

    public function testDescription()
    {
        $expected = 'Some Description';
        $content = new Content();

        $content->setDescription($expected);
        $actual = $content->getDescription();

        $this->assertSame($expected, $actual);
    }

    public function testActive()
    {
        $expected = true;
        $content = new Content();

        $content->setActive($expected);
        $actual = $content->getActive();

        $this->assertSame($expected, $actual);
    }

    public function testIndexable()
    {
        $expected = true;
        $content = new Content();

        $content->setIndexable($expected);
        $actual = $content->getIndexable();

        $this->assertSame($expected, $actual);
        $this->assertTrue($content->isIndexable());
    }

    public function testSearchable()
    {
        $expected = true;
        $content = new Content();

        $content->setSearchable($expected);
        $actual = $content->getSearchable();

        $this->assertSame($expected, $actual);
        $this->assertTrue($content->isSearchable());
    }

    public function testIsPublic()
    {
        $content = new Content();
        $this->assertTrue($content->isPublic());

        $nestedValue = new NestedValue();
        $content->setNestedIn($nestedValue);
        $this->assertFalse($content->isPublic());
    }

    public function testIsPrivate()
    {
        $content = new Content();
        $this->assertFalse($content->isPrivate());

        $nestedValue = new NestedValue();
        $content->setNestedIn($nestedValue);
        $this->assertTrue($content->isPrivate());
    }

    public function testSetNestedDefaults()
    {
        $content = new Content();
        $content->setNestedDefaults();

        $this->assertFalse($content->getIndexable());
        $this->assertFalse($content->getSearchable());
    }
}
