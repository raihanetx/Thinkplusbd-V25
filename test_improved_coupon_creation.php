<?php
// Simulate the input stream
$input_data = json_encode(array(
    "code" => "IMPROVED",
    "discount_type" => "percentage",
    "discount_value" => 20,
    "category" => "Subscription",
    "product_ids" => array("4", "6")
));

// Use a stream wrapper to simulate php://input
$stream = fopen('php://memory', 'r+');
fwrite($stream, $input_data);
rewind($stream);

// Replace the real php://input with our simulated stream
$GLOBALS['HTTP_RAW_POST_DATA'] = $input_data;
$GLOBALS['HTTP_RAW_POST_DATA_STREAM'] = $stream;

// Define a custom stream wrapper to override php://input
class MockPhpInputStream extends php_user_filter {
    private $data;
    private $position;

    public function __construct() {
        $this->data = $GLOBALS['HTTP_RAW_POST_DATA'];
        $this->position = 0;
    }

    public function stream_open($path, $mode, $options, &$opened_path) {
        return true;
    }

    public function stream_read($count) {
        $ret = substr($this->data, $this->position, $count);
        $this->position += strlen($ret);
        return $ret;
    }

    public function stream_tell() {
        return $this->position;
    }

    public function stream_eof() {
        return $this->position >= strlen($this->data);
    }

    public function stream_stat() {
        return array();
    }
}

stream_wrapper_unregister('php');
stream_wrapper_register('php', 'MockPhpInputStream');

// Now, include the script to be tested
include 'create_coupon.php';

// Clean up
stream_wrapper_restore('php');
fclose($stream);
?>
