<?php
# Generated by the protocol buffer compiler.  DO NOT EDIT!
# source: google/cloud/run/v2/k8s.min.proto

namespace Google\Cloud\Run\V2;

use Google\Protobuf\Internal\GPBType;
use Google\Protobuf\Internal\RepeatedField;
use Google\Protobuf\Internal\GPBUtil;

/**
 * HTTPGetAction describes an action based on HTTP Get requests.
 *
 * Generated from protobuf message <code>google.cloud.run.v2.HTTPGetAction</code>
 */
class HTTPGetAction extends \Google\Protobuf\Internal\Message
{
    /**
     * Path to access on the HTTP server. Defaults to '/'.
     *
     * Generated from protobuf field <code>string path = 1;</code>
     */
    private $path = '';
    /**
     * Custom headers to set in the request. HTTP allows repeated headers.
     *
     * Generated from protobuf field <code>repeated .google.cloud.run.v2.HTTPHeader http_headers = 4;</code>
     */
    private $http_headers;

    /**
     * Constructor.
     *
     * @param array $data {
     *     Optional. Data for populating the Message object.
     *
     *     @type string $path
     *           Path to access on the HTTP server. Defaults to '/'.
     *     @type array<\Google\Cloud\Run\V2\HTTPHeader>|\Google\Protobuf\Internal\RepeatedField $http_headers
     *           Custom headers to set in the request. HTTP allows repeated headers.
     * }
     */
    public function __construct($data = NULL) {
        \GPBMetadata\Google\Cloud\Run\V2\K8SMin::initOnce();
        parent::__construct($data);
    }

    /**
     * Path to access on the HTTP server. Defaults to '/'.
     *
     * Generated from protobuf field <code>string path = 1;</code>
     * @return string
     */
    public function getPath()
    {
        return $this->path;
    }

    /**
     * Path to access on the HTTP server. Defaults to '/'.
     *
     * Generated from protobuf field <code>string path = 1;</code>
     * @param string $var
     * @return $this
     */
    public function setPath($var)
    {
        GPBUtil::checkString($var, True);
        $this->path = $var;

        return $this;
    }

    /**
     * Custom headers to set in the request. HTTP allows repeated headers.
     *
     * Generated from protobuf field <code>repeated .google.cloud.run.v2.HTTPHeader http_headers = 4;</code>
     * @return \Google\Protobuf\Internal\RepeatedField
     */
    public function getHttpHeaders()
    {
        return $this->http_headers;
    }

    /**
     * Custom headers to set in the request. HTTP allows repeated headers.
     *
     * Generated from protobuf field <code>repeated .google.cloud.run.v2.HTTPHeader http_headers = 4;</code>
     * @param array<\Google\Cloud\Run\V2\HTTPHeader>|\Google\Protobuf\Internal\RepeatedField $var
     * @return $this
     */
    public function setHttpHeaders($var)
    {
        $arr = GPBUtil::checkRepeatedField($var, \Google\Protobuf\Internal\GPBType::MESSAGE, \Google\Cloud\Run\V2\HTTPHeader::class);
        $this->http_headers = $arr;

        return $this;
    }

}

