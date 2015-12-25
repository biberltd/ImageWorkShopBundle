<?php
/**
 * @author		Can Berkol
 *
 * @copyright   Biber Ltd. (http://www.biberltd.com) (C) 2015
 * @license     GPLv3
 *
 * @date        23.12.2015
 *
 * @link http://phpimageworkshop.com
 * @author Sybio (Clément Guillemain / @Sybio01)
 * @license http://en.wikipedia.org/wiki/MIT_License
 * @copyright Clément Guillemain
 *
 */

namespace BiberLtd\Bundle\ImageWorkshopBundle\Services;

use PHPImageWorkshop\ImageWorkshop as PIW;

class ImageWorkshop
{
    /**
     * @var \PHPImageWorkshop\ImageWorkshop
     */
    private $iw;

    /**
     * ImageWorkshop constructor.
     */
    public function __construct()
    {
        $this->iw = null;
    }

    /**
     * @param string $path
     *
     * @return bool|\PHPImageWorkshop\Core\ImageWorkshopLayer
     * @throws \PHPImageWorkshop\Exception\ImageWorkshopException
     */
    public function initFromPath(\string $path)
    {
        if (file_exists($path)) {
            return $this->iw = PIW::initFromPath($path);
        }
        return false;
    }

    /**
     * @param string      $text
     * @param string      $fontPath
     * @param int         $fontSize
     * @param string      $fontColor
     * @param float       $textRotation
     * @param string|null $backgroundColor
     *
     * @return bool|\PHPImageWorkshop\Core\ImageWorkshopLayer
     */
    public function initTextLayer(\string $text, \string $fontPath, \integer $fontSize = 13, \string $fontColor = 'ffffff', \float $textRotation = 0, \string $backgroundColor = null)
    {
        if (!file_exists($fontPath)) {
            return false;
        }
        return $this->iw = PIW::initTextLayer($text, $fontPath, $fontSize, $fontColor, $textRotation, $backgroundColor);
    }

    /**
     * @param int         $width
     * @param int         $height
     * @param string|null $backgroundColor
     *
     * @return \PHPImageWorkshop\Core\ImageWorkshopLayer
     */
    public function initVirginLayer(\integer $width = 100, \integer $height = 100, \string $backgroundColor = null)
    {
        return $this->iw = PIW::initVirginLayer($width, $height, $backgroundColor);
    }

    /**
     * @param resource $image
     *
     * @return bool|\PHPImageWorkshop\Core\ImageWorkshopLayer
     */
    public function initFromResourceVar($image)
    {
        if (!is_resource($image)) {
            /**
             * @todo Exception
             */
            return false;
        }
        return $this->iw = PIW::initFromResourceVar($image);
    }

    /**
     * @param string $imageString
     *
     * @return \PHPImageWorkshop\Core\ImageWorkshopLayer
     * @throws \PHPImageWorkshop\Exception\ImageWorkshopException
     */
    public function initFromString(\string $imageString)
    {
        return $this->iw = PIW::initFromString($imageString);
    }

    /**
     * @return null|\PHPImageWorkshop\ImageWorkshop
     */
    public function getImageWorkshop()
    {
        return $this->iw;
    }
}