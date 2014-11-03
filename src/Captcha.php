<?php

namespace FedericoBiccheddu\AsciiCaptcha;

use FedericoBiccheddu\AsciiCaptcha\Alphabet\AlphabetInterface;

class Captcha {

    /**
     * Captcha length
     *
     * @var int
     */
    private $length = 5;

    /**
     * The generate string to display
     *
     * @var string
     */
    private $string;

    /**
     * All alphabets available
     *
     * @var array
     */
    private $alphabet = [];

    /**
     * @var array
     */
    private $grid = [];

    /**
     * @param \FedericoBiccheddu\AsciiCaptcha\Alphabet\AlphabetInterface $alphabet
     * @param int $length
     */
    public function __construct(AlphabetInterface $alphabet, $length = null)
    {
        $this->setAlphabet($alphabet);

        if ($length !== null) {
            $this->setLength($length);
        }
    }

    /**
     * @param boolean $html5
     * @return string
     */
    public function toHtml($html5 = true)
    {
        return str_replace('.', '&nbsp;', implode($html5 ? '<br />' : '<br>', $this->getGrid()));
    }

    /**
     * @return int
     */
    public function getLength()
    {
        return $this->length;
    }

    /**
     * @param int $length
     */
    public function setLength($length)
    {
        $this->length = $length;
    }

    /**
     * Get the generated string to display
     *
     * @return string
     */
    public function getString()
    {
        return $this->string;
    }

    /**
     * If you want, you can override the string
     *
     * @param string $string
     */
    public function setString($string)
    {
        $this->string = $string;
    }

    /**
     * Change the alphabet on the fly
     *
     * @param AlphabetInterface $alphabet
     *
     * @return void
     */
    public function setAlphabet(AlphabetInterface $alphabet)
    {
        $this->alphabet = $alphabet->getCharacters();
    }

    /**
     * Get alphabet array
     *
     * @return array
     */
    public function getAlphabet()
    {
        return $this->alphabet;
    }

    /**
     * Generate a random string to display by the same length as defined
     *
     * @return void
     */
    public function generateString()
    {
        $string = substr(str_shuffle(implode('', array_keys($this->getAlphabet()))), 0, $this->getLength());

        $this->setString($string);
    }

    /**
     * @return array
     */
    private function getGrid()
    {
        if ($this->grid === []) {
            $this->buildGrid();
        }

        return $this->grid;
    }

    private function buildGrid()
    {
        $string = $this->getString();

        if ($string === null) {
            throw new \LogicException('You need to call generateString().');
        }

        $alphabet = $this->getAlphabet();

        for ($i = 0, $lenght = strlen($string); $i < $lenght; ++$i) {
            $char = $alphabet[substr($string, $i, 1)];

            for ($r = 0, $s = sizeof($char); $r < $s; ++$r) {
                if (!isset($this->grid[$r])) {
                    $this->grid[$r] = '.'.$char[$r];
                } else {
                    $this->grid[$r] .= '.'.$char[$r];
                }
            }
        }
    }
}
