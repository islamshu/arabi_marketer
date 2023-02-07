<?php
# Generated by the protocol buffer compiler.  DO NOT EDIT!
# source: google/privacy/dlp/v2/dlp.proto

namespace Google\Cloud\Dlp\V2;

use Google\Protobuf\Internal\GPBType;
use Google\Protobuf\Internal\RepeatedField;
use Google\Protobuf\Internal\GPBUtil;

/**
 * The response message for listing DLP jobs.
 *
 * Generated from protobuf message <code>google.privacy.dlp.v2.ListDlpJobsResponse</code>
 */
class ListDlpJobsResponse extends \Google\Protobuf\Internal\Message
{
    /**
     * A list of DlpJobs that matches the specified filter in the request.
     *
     * Generated from protobuf field <code>repeated .google.privacy.dlp.v2.DlpJob jobs = 1;</code>
     */
    private $jobs;
    /**
     * The standard List next-page token.
     *
     * Generated from protobuf field <code>string next_page_token = 2;</code>
     */
    private $next_page_token = '';

    /**
     * Constructor.
     *
     * @param array $data {
     *     Optional. Data for populating the Message object.
     *
     *     @type array<\Google\Cloud\Dlp\V2\DlpJob>|\Google\Protobuf\Internal\RepeatedField $jobs
     *           A list of DlpJobs that matches the specified filter in the request.
     *     @type string $next_page_token
     *           The standard List next-page token.
     * }
     */
    public function __construct($data = NULL) {
        \GPBMetadata\Google\Privacy\Dlp\V2\Dlp::initOnce();
        parent::__construct($data);
    }

    /**
     * A list of DlpJobs that matches the specified filter in the request.
     *
     * Generated from protobuf field <code>repeated .google.privacy.dlp.v2.DlpJob jobs = 1;</code>
     * @return \Google\Protobuf\Internal\RepeatedField
     */
    public function getJobs()
    {
        return $this->jobs;
    }

    /**
     * A list of DlpJobs that matches the specified filter in the request.
     *
     * Generated from protobuf field <code>repeated .google.privacy.dlp.v2.DlpJob jobs = 1;</code>
     * @param array<\Google\Cloud\Dlp\V2\DlpJob>|\Google\Protobuf\Internal\RepeatedField $var
     * @return $this
     */
    public function setJobs($var)
    {
        $arr = GPBUtil::checkRepeatedField($var, \Google\Protobuf\Internal\GPBType::MESSAGE, \Google\Cloud\Dlp\V2\DlpJob::class);
        $this->jobs = $arr;

        return $this;
    }

    /**
     * The standard List next-page token.
     *
     * Generated from protobuf field <code>string next_page_token = 2;</code>
     * @return string
     */
    public function getNextPageToken()
    {
        return $this->next_page_token;
    }

    /**
     * The standard List next-page token.
     *
     * Generated from protobuf field <code>string next_page_token = 2;</code>
     * @param string $var
     * @return $this
     */
    public function setNextPageToken($var)
    {
        GPBUtil::checkString($var, True);
        $this->next_page_token = $var;

        return $this;
    }

}

