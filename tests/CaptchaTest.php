<?php

namespace FedericoBiccheddu\AsciiCaptcha\Test;

use Mockery;
use FedericoBiccheddu\AsciiCaptcha\Captcha;

/**
 * @coversDefaultClass FedericoBiccheddu\AsciiCaptcha\Captcha
 */
class CaptchaTest extends TestCase {

    public function testAlphabetWasSet()
    {
        $alphabet = $this->getAlphabetStub(['foo' => 'bar']);

        $captcha = new Captcha($alphabet);

        assertSame(['foo' => 'bar'], $captcha->getAlphabet());
    }

    public function testLengthWasSetInConstructor()
    {
        $alphabet = $this->getAlphabetStub();

        $captcha = new Captcha($alphabet, 10);

        assertSame(10, $captcha->getLength());
    }

    public function testStringHasTheCorrectLength()
    {
        $alphabet = $this->getAlphabetStub(['foo' => 'bar']);

        $captcha = new Captcha($alphabet, 1);

        $captcha->generateString();

        assertEquals(1, strlen($captcha->getString()));
    }

    public function testLengthWasOverrided()
    {
        $alphabet = $this->getAlphabetStub();

        $captcha = new Captcha($alphabet, 10);

        $captcha->setLength(20);

        assertSame(20, $captcha->getLength());
    }

    public function testAlphabetWasOverrided()
    {
        $alphabet = $this->getAlphabetStub();

        $captcha = new Captcha($alphabet);

        $newAlphabet = $this->getAlphabetStub([
            'bar'   => 'foo'
        ]);

        $captcha->setAlphabet($newAlphabet);

        assertSame(['bar' => 'foo'], $captcha->getAlphabet());
    }

    public function testThrowExceptionIfStringWasNotGenerated()
    {
        $this->setExpectedException('\\LogicException', 'You need to call generateString().');

        $alphabet = $this->getAlphabetStub();

        $captcha = new Captcha($alphabet, 1);

        $captcha->toHtml();
    }

    public function testToHtml()
    {
        $alphabet = $this->getAlphabetStub([
            'A'	=> [
                '.*.',
                '.*.'
            ]
        ]);

        $captcha = new Captcha($alphabet, 1);

        $captcha->generateString();

        assertSame('&nbsp;&nbsp;*&nbsp;<br />&nbsp;&nbsp;*&nbsp;', $captcha->toHtml());
    }

    public function testToHTML5SettedToFalse()
    {
        $alphabet = $this->getAlphabetStub([
            'A'	=> [
                '.*.',
                '.*.'
            ]
        ]);

        $captcha = new Captcha($alphabet, 1);

        $captcha->generateString();

        assertSame('&nbsp;&nbsp;*&nbsp;<br>&nbsp;&nbsp;*&nbsp;', $captcha->toHtml(false));
    }

    private function getAlphabetStub(array $characters = [])
    {
        $alphabet = Mockery::mock('FedericoBiccheddu\\AsciiCaptcha\\Alphabet\\AlphabetInterface');

        $alphabet->shouldReceive('getCharacters')->once()->andReturn($characters);

        return $alphabet;
    }

    public function tearDown()
    {
        Mockery::close();
    }
}
