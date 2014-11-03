<?php

namespace FedericoBiccheddu\AsciiCaptcha\Test\Alphabet;

use FedericoBiccheddu\AsciiCaptcha\Alphabet\DefaultAlphabet;
use FedericoBiccheddu\AsciiCaptcha\Test\TestCase;

/**
 * @coversDefaultClass \FedericoBiccheddu\AsciiCaptcha\Alphabet\DefaultAlphabet
 */
class DefaultAlphabetTest extends TestCase {

    public function testReturnedCharactersHasAValidStructure()
    {
        $alphabet = new DefaultAlphabet;

        $characters = $alphabet->getCharacters();

        foreach ($characters as $char => $ascii) {
            assertInternalType('array', $ascii);
        }
    }

}
