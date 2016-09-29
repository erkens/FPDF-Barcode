<?php

namespace Fpdf\Type;

use Fpdf\FPDF;

/**
 * Class Code39
 *
 * Based upon: http://www.fpdf.org/en/script/script46.php
 *
 * @package Fpdf\Type
 */
class Code39
{
    /** @var FPDF */
    protected $fpdf;
    /** @var string[] */
    private $chars;

    public function __construct(FPDF $fpdf)
    {
        $this->fpdf = $fpdf;
        $this->init();
    }

    /**
     * @param float $xpos
     * @param float $ypos
     * @param string $code
     * @param float $baseline
     * @param float $height
     */
    public function drawCode($xpos, $ypos, $code, $baseline=0.5, $height=5.0)
    {
        $wide = $baseline;
        $narrow = $baseline / 3 ;
        $gap = $narrow;

        $this->fpdf->SetFillColor(0);

        $code = '*'.strtoupper($code).'*';
        for($i=0; $i<strlen($code); $i++){
            $char = $code[$i];
            if(!isset($this->chars[$char])){
                $this->fpdf->Error('Invalid character in barcode: '.$char);
            }
            $seq = $this->chars[$char];
            for($bar=0; $bar<9; $bar++){
                if($seq[$bar] == 'n'){
                    $lineWidth = $narrow;
                }else{
                    $lineWidth = $wide;
                }
                if($bar % 2 == 0){
                    $this->fpdf->Rect($xpos, $ypos, $lineWidth, $height, 'F');
                }
                $xpos += $lineWidth;
            }
            $xpos += $gap;
        }
    }

    private function init()
    {
        $this->chars = array();
        $this->chars['0'] = 'nnnwwnwnn';
        $this->chars['1'] = 'wnnwnnnnw';
        $this->chars['2'] = 'nnwwnnnnw';
        $this->chars['3'] = 'wnwwnnnnn';
        $this->chars['4'] = 'nnnwwnnnw';
        $this->chars['5'] = 'wnnwwnnnn';
        $this->chars['6'] = 'nnwwwnnnn';
        $this->chars['7'] = 'nnnwnnwnw';
        $this->chars['8'] = 'wnnwnnwnn';
        $this->chars['9'] = 'nnwwnnwnn';
        $this->chars['A'] = 'wnnnnwnnw';
        $this->chars['B'] = 'nnwnnwnnw';
        $this->chars['C'] = 'wnwnnwnnn';
        $this->chars['D'] = 'nnnnwwnnw';
        $this->chars['E'] = 'wnnnwwnnn';
        $this->chars['F'] = 'nnwnwwnnn';
        $this->chars['G'] = 'nnnnnwwnw';
        $this->chars['H'] = 'wnnnnwwnn';
        $this->chars['I'] = 'nnwnnwwnn';
        $this->chars['J'] = 'nnnnwwwnn';
        $this->chars['K'] = 'wnnnnnnww';
        $this->chars['L'] = 'nnwnnnnww';
        $this->chars['M'] = 'wnwnnnnwn';
        $this->chars['N'] = 'nnnnwnnww';
        $this->chars['O'] = 'wnnnwnnwn';
        $this->chars['P'] = 'nnwnwnnwn';
        $this->chars['Q'] = 'nnnnnnwww';
        $this->chars['R'] = 'wnnnnnwwn';
        $this->chars['S'] = 'nnwnnnwwn';
        $this->chars['T'] = 'nnnnwnwwn';
        $this->chars['U'] = 'wwnnnnnnw';
        $this->chars['V'] = 'nwwnnnnnw';
        $this->chars['W'] = 'wwwnnnnnn';
        $this->chars['X'] = 'nwnnwnnnw';
        $this->chars['Y'] = 'wwnnwnnnn';
        $this->chars['Z'] = 'nwwnwnnnn';
        $this->chars['-'] = 'nwnnnnwnw';
        $this->chars['.'] = 'wwnnnnwnn';
        $this->chars[' '] = 'nwwnnnwnn';
        $this->chars['*'] = 'nwnnwnwnn';
        $this->chars['$'] = 'nwnwnwnnn';
        $this->chars['/'] = 'nwnwnnnwn';
        $this->chars['+'] = 'nwnnnwnwn';
        $this->chars['%'] = 'nnnwnwnwn';
    }
}
