<?php

namespace App\Utilities;

/**
 * Reads a CSV File!!
 * Uses the Iterator Interface to keep everything civilized :-)
 *
 * @author mikcy
 */
class File_CSV_DataSource implements \Iterator {

    public
    /**
     * csv parsing default-settings
     *
     * @var array
     * @access public
     */
            $settings = array(
        'delimiter' => ',',
        'eol' => ";",
        'length' => 999999,
        'escape' => '"'
    );
    protected
    /**
     * imported data from csv, one row
     *
     * @var array
     * @access protected
     */
            $row = null,
            /**
             * csv file to parse
             *
             * @var string
             * @access protected
             */
            $_filename = '',
            /**
             * file offset
             */
            $_offset = null,
            /**
             * entries count
             *
             * @var integer row count
             * @access protected
             */
            $_c = null,
            /**
             * file resource handle
             * @var handle
             * @access protected
             */
            $_res = null,
            /**
             * csv headers to parse
             *
             * @var array
             * @access protected
             */
            $headers = array(),
            /**
             * end of file
             *
             * @var boolean
             * @access protected
             */
            $_eof = false;

    /**
     * Constructor
     *
     * @access public
     * @param string $fileName
     */
    public function File_CSV_DataSource($fileName = '', $offset = null) {
        if (!empty($fileName)) {
            $this->__openFile($fileName, $offset);
        }
    }

    /**
     * Opens a given file
     *
     * @access public
     * @param string $fileName
     * @throws RuntimeException
     */
    private function __openFile($fileName, $offset = null) {
        if (!$this->_res = fopen($fileName, 'r')) {
            throw new RuntimeException('Couldn\'t open file "' . $fileName . '"');
        }
        $this->_filename = $fileName;
        $this->_offset = $offset;
        //parse the first line, the header line
        $this->parseLine();
        //parse the second line, the first data line
        //$this->parseLine();
    }

    /**
     * Rewind the Iterator, ie start of file
     *
     * @access public
     */
    public function rewind() {
        fseek($this->_res, 0);
        $this->_c = 0;
    }

    /**
     * Is the iterator still valid? ie have we reached EOF
     *
     * @access public
     * @return boolean
     */
    public function valid() {
        return true !== $this->_eof;
    }

    /**
     * Return the Current Element
     *
     * @access public
     * @return mixed, array
     */
    public function current() {
        return $this->row;
    }

    /**
     * Returns the item number, here the line number
     *
     * @access public
     * @return integer
     */
    public function key() {
        return $this->_c;
    }

    /**
     * Get next item
     *
     * @access public
     */
    public function next() {
        if (false == $this->_eof) {
            $this->row = $this->parseLine();
            $this->_c++;
        }
    }

    /**
     * Destructor
     *
     * @access public
     */
    public function __destruct() {
        fclose($this->_res);
    }

    /**
     * Load File
     *
     * @access public
     * @param string $fileName
     */
    public function load($fileName, $offset = null) {
        $this->__openFile($fileName, $offset);
    }

    /**
     * csv line parser
     *
     * reads csv data and transforms it into an array
     *
     * @access protected
     * @return array
     */
    protected function parseLine() {

        $d = $this->settings['delimiter'];
        $e = $this->settings['escape'];
        $l = $this->settings['length'];
        $this->row = null;

        if (!empty($this->_res) && false == $this->_eof) {
            if (($keys = fgetcsv($this->_res, $l, $d, $e))) {

                $this->row = $keys;
                //its the file line
                if ($this->_c == 0) {
                    $this->headers = $this->row;
                    //set the offset position
                    if (isset($this->_offset) && !empty($this->_offset) && $this->_offset > 0) {
                        fseek($this->_res, $this->_offset);
                    }
                }
                //row id
                $this->_c++;
            } else {
                $this->_eof = true;
            }
        }

        return $this->row;
    }

    /**
     * data length/symmetry checker
     *
     * tells if the headers and all of the contents length match.
     *
     * @access public
     * @return boolean
     * @see symmetrize(), getAsymmetricRows(), isSymmetric()
     */
    public function isSymmetric() {
        if (count($this->row) != count($this->headers)) {
            return false;
        }
        return true;
    }

    //read entries
    /**
     * Match the headers with the row
     *
     * @access public
     * @param mixed $columns
     * @return mixed
     */
    public function connect($columns = array()) {
        if (!$this->isSymmetric()) {
            return array();
        }
        if (!is_array($columns)) {
            return array();
        }
        if ($columns === array()) {
            $columns = $this->headers;
        }

        $item_array = array();
        foreach ($this->row as $column => $value) {
            $header = $this->headers[$column];
            if (in_array($header, $columns)) {
                $item_array[$header] = $value;
            }
        }

        return $item_array;
    }

    /**
     * Returns the array of the headers, basically the first line
     *
     * @access public
     * @return mixed, headers
     */
    public function getHeaders() {
        return $this->headers;
    }

    /**
     * Returns the file offset
     *
     * @access public
     * @return mixed, headers
     */
    public function getOffset() {
        return ftell($this->_res);
    }

}

?>
