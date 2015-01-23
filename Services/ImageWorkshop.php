<?php
    /**
     * ImageWorkshop Class
     *
     * This class is a wrapper for PHPImageWorkshop Library.
     *
     * @package         ImageWorkshopBundle
     * @subpackage      Services
     * @name	        ImageWorkshop
     *
     * @author          Can Berkol
     *
     * @copyright       Biber Ltd. (www.biberltd.com)
     *
     * @date            11.02.2014
     * @version         1.0.0
     *
     * **********************************************************
     * @link http://phpimageworkshop.com
     * @author Sybio (Clément Guillemain / @Sybio01)
     * @license http://en.wikipedia.org/wiki/MIT_License
     * @copyright Clément Guillemain
     *
     */

    namespace BiberLtd\Bundle\ImageWorkshopBundle\Services;

    use PHPImageWorkshop\ImageWorkshop as PIW;

    class ImageWorkshop {
        private $iw;

        public function __construct(){
            $this->iw = null;
        }
        /**
         * @name            initFromPath()
         *                  Initializes a new layer from an existing file, if file is not found returns false.
         *
         * @author          Can Berkol
         *
         * @since           1.0.0
         * @version         1.0.0
         *
         * @param           string              $path
         *
         * @return          PIW::ImageWorkshopLayer | bool
         */
        public function initFromPath($path) {
            if(file_exists($path)){
                return $this->iw = PIW::initFromPath($path);
            }
            return false;
        }
        /**
         * @name            initTextLayer()
         *                  Initializes a new text layer.
         *
         * @author          Can Berkol
         *
         * @since           1.0.0
         * @version         1.0.0
         *
         * @param           string              $text
         * @param           string              $fontPath
         * @param           string              $fontColor          Hexadecimal
         * @param           decimal             $textRotation
         * @param           string              $backgroundColor
         *
         * @return          PIW::ImageWorkshopLayer | bool
         */
        public function initTextLayer($text, $fontPath, $fontSize = 13, $fontColor = 'ffffff', $textRotation = 0, $backgroundColor = null) {
            if(!file_exists($fontPath)){
                /**
                 * @todo: Exception to be added.
                 */
                return false;
            }
            return $this->iw = PIW::initTextLayer($text, $fontPath, $fontSize, $fontColor, $textRotation, $backgroundColor);
        }
        /**
         * @name            initVirginLayer()
         *                  Initializes a new empty layer.
         *
         * @author          Can Berkol
         *
         * @since           1.0.0
         * @version         1.0.0
         *
         * @param           integer             $width
         * @param           integer             $height
         * @param           integer             $backgroundColor
         *
         * @return          PIW::ImageWorkshopLayer
         */
        public function initVirginLayer($width = 100, $height = 100, $backgroundColor = null) {
            return $this->iw = PIW::initVirginLayer($width, $height, $backgroundColor);
        }
        /**
         * @name            initFromResourceVar()
         *                  Initializes a new layer from resource.
         *
         * @author          Can Berkol
         *
         * @since           1.0.0
         * @version         1.0.0
         *
         * @param           resource            $image
         *
         * @return          PIW::ImageWorkshopLayer
         */
        public function initFromResourceVar($image) {
            if(!is_resource($image)){
                /**
                 * @todo Exception
                 */
                return false;
            }
            return $this->iw = PIW::initFromResourceVar($image);
        }
        /**
         * @name            initFromString()
         *                  Initializes a new layer from a string representation.
         *
         * @author          Can Berkol
         *
         * @since           1.0.0
         * @version         1.0.0
         *
         * @param           string            $imageString
         *
         * @return          PIW::ImageWorkshopLayer
         */
        public function initFromString($imageString) {
            return $this->iw = PIW::initFromString($imageString);
        }
        /**
         * @name            getImageWorkshop()
         *                  Returns imageworkshop object.
         *
         * @author          Can Berkol
         *
         * @since           1.0.0
         * @version         1.0.0
         *
         * @param           string            $imageString
         *
         * @return          PIW::ImageWorkshopLayer
         */
        public function getImageWorkshop() {
            return $this->iw;
        }
    }
    /**
     * Change Log:
     * **************************************
     * v1.0.0                      Can Berkol
     * 11.02.2014
     * **************************************
     * A __construct()
     * A getImageWorkshop()
     * A initFromPath()
     * A initFromResourceVar()
     * A initFromString()
     * A initTextLayer()
     * A initVirginLayer()
     */
