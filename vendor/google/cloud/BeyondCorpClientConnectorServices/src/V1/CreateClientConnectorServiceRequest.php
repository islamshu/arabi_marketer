<?php
# Generated by the protocol buffer compiler.  DO NOT EDIT!
# source: google/cloud/beyondcorp/clientconnectorservices/v1/client_connector_services_service.proto

namespace Google\Cloud\BeyondCorp\ClientConnectorServices\V1;

use Google\Protobuf\Internal\GPBType;
use Google\Protobuf\Internal\RepeatedField;
use Google\Protobuf\Internal\GPBUtil;

/**
 * Message for creating a ClientConnectorService.
 *
 * Generated from protobuf message <code>google.cloud.beyondcorp.clientconnectorservices.v1.CreateClientConnectorServiceRequest</code>
 */
class CreateClientConnectorServiceRequest extends \Google\Protobuf\Internal\Message
{
    /**
     * Required. Value for parent.
     *
     * Generated from protobuf field <code>string parent = 1 [(.google.api.field_behavior) = REQUIRED, (.google.api.resource_reference) = {</code>
     */
    private $parent = '';
    /**
     * Optional. User-settable client connector service resource ID.
     *  * Must start with a letter.
     *  * Must contain between 4-63 characters from `/[a-z][0-9]-/`.
     *  * Must end with a number or a letter.
     * A random system generated name will be assigned
     * if not specified by the user.
     *
     * Generated from protobuf field <code>string client_connector_service_id = 2 [(.google.api.field_behavior) = OPTIONAL];</code>
     */
    private $client_connector_service_id = '';
    /**
     * Required. The resource being created.
     *
     * Generated from protobuf field <code>.google.cloud.beyondcorp.clientconnectorservices.v1.ClientConnectorService client_connector_service = 3 [(.google.api.field_behavior) = REQUIRED];</code>
     */
    private $client_connector_service = null;
    /**
     * Optional. An optional request ID to identify requests. Specify a unique
     * request ID so that if you must retry your request, the server will know to
     * ignore the request if it has already been completed. The server will
     * guarantee that for at least 60 minutes since the first request.
     * For example, consider a situation where you make an initial request and t
     * he request times out. If you make the request again with the same request
     * ID, the server can check if original operation with the same request ID
     * was received, and if so, will ignore the second request. This prevents
     * clients from accidentally creating duplicate commitments.
     * The request ID must be a valid UUID with the exception that zero UUID is
     * not supported (00000000-0000-0000-0000-000000000000).
     *
     * Generated from protobuf field <code>string request_id = 4 [(.google.api.field_behavior) = OPTIONAL];</code>
     */
    private $request_id = '';
    /**
     * Optional. If set, validates request by executing a dry-run which would not
     * alter the resource in any way.
     *
     * Generated from protobuf field <code>bool validate_only = 5 [(.google.api.field_behavior) = OPTIONAL];</code>
     */
    private $validate_only = false;

    /**
     * Constructor.
     *
     * @param array $data {
     *     Optional. Data for populating the Message object.
     *
     *     @type string $parent
     *           Required. Value for parent.
     *     @type string $client_connector_service_id
     *           Optional. User-settable client connector service resource ID.
     *            * Must start with a letter.
     *            * Must contain between 4-63 characters from `/[a-z][0-9]-/`.
     *            * Must end with a number or a letter.
     *           A random system generated name will be assigned
     *           if not specified by the user.
     *     @type \Google\Cloud\BeyondCorp\ClientConnectorServices\V1\ClientConnectorService $client_connector_service
     *           Required. The resource being created.
     *     @type string $request_id
     *           Optional. An optional request ID to identify requests. Specify a unique
     *           request ID so that if you must retry your request, the server will know to
     *           ignore the request if it has already been completed. The server will
     *           guarantee that for at least 60 minutes since the first request.
     *           For example, consider a situation where you make an initial request and t
     *           he request times out. If you make the request again with the same request
     *           ID, the server can check if original operation with the same request ID
     *           was received, and if so, will ignore the second request. This prevents
     *           clients from accidentally creating duplicate commitments.
     *           The request ID must be a valid UUID with the exception that zero UUID is
     *           not supported (00000000-0000-0000-0000-000000000000).
     *     @type bool $validate_only
     *           Optional. If set, validates request by executing a dry-run which would not
     *           alter the resource in any way.
     * }
     */
    public function __construct($data = NULL) {
        \GPBMetadata\Google\Cloud\Beyondcorp\Clientconnectorservices\V1\ClientConnectorServicesService::initOnce();
        parent::__construct($data);
    }

    /**
     * Required. Value for parent.
     *
     * Generated from protobuf field <code>string parent = 1 [(.google.api.field_behavior) = REQUIRED, (.google.api.resource_reference) = {</code>
     * @return string
     */
    public function getParent()
    {
        return $this->parent;
    }

    /**
     * Required. Value for parent.
     *
     * Generated from protobuf field <code>string parent = 1 [(.google.api.field_behavior) = REQUIRED, (.google.api.resource_reference) = {</code>
     * @param string $var
     * @return $this
     */
    public function setParent($var)
    {
        GPBUtil::checkString($var, True);
        $this->parent = $var;

        return $this;
    }

    /**
     * Optional. User-settable client connector service resource ID.
     *  * Must start with a letter.
     *  * Must contain between 4-63 characters from `/[a-z][0-9]-/`.
     *  * Must end with a number or a letter.
     * A random system generated name will be assigned
     * if not specified by the user.
     *
     * Generated from protobuf field <code>string client_connector_service_id = 2 [(.google.api.field_behavior) = OPTIONAL];</code>
     * @return string
     */
    public function getClientConnectorServiceId()
    {
        return $this->client_connector_service_id;
    }

    /**
     * Optional. User-settable client connector service resource ID.
     *  * Must start with a letter.
     *  * Must contain between 4-63 characters from `/[a-z][0-9]-/`.
     *  * Must end with a number or a letter.
     * A random system generated name will be assigned
     * if not specified by the user.
     *
     * Generated from protobuf field <code>string client_connector_service_id = 2 [(.google.api.field_behavior) = OPTIONAL];</code>
     * @param string $var
     * @return $this
     */
    public function setClientConnectorServiceId($var)
    {
        GPBUtil::checkString($var, True);
        $this->client_connector_service_id = $var;

        return $this;
    }

    /**
     * Required. The resource being created.
     *
     * Generated from protobuf field <code>.google.cloud.beyondcorp.clientconnectorservices.v1.ClientConnectorService client_connector_service = 3 [(.google.api.field_behavior) = REQUIRED];</code>
     * @return \Google\Cloud\BeyondCorp\ClientConnectorServices\V1\ClientConnectorService|null
     */
    public function getClientConnectorService()
    {
        return $this->client_connector_service;
    }

    public function hasClientConnectorService()
    {
        return isset($this->client_connector_service);
    }

    public function clearClientConnectorService()
    {
        unset($this->client_connector_service);
    }

    /**
     * Required. The resource being created.
     *
     * Generated from protobuf field <code>.google.cloud.beyondcorp.clientconnectorservices.v1.ClientConnectorService client_connector_service = 3 [(.google.api.field_behavior) = REQUIRED];</code>
     * @param \Google\Cloud\BeyondCorp\ClientConnectorServices\V1\ClientConnectorService $var
     * @return $this
     */
    public function setClientConnectorService($var)
    {
        GPBUtil::checkMessage($var, \Google\Cloud\BeyondCorp\ClientConnectorServices\V1\ClientConnectorService::class);
        $this->client_connector_service = $var;

        return $this;
    }

    /**
     * Optional. An optional request ID to identify requests. Specify a unique
     * request ID so that if you must retry your request, the server will know to
     * ignore the request if it has already been completed. The server will
     * guarantee that for at least 60 minutes since the first request.
     * For example, consider a situation where you make an initial request and t
     * he request times out. If you make the request again with the same request
     * ID, the server can check if original operation with the same request ID
     * was received, and if so, will ignore the second request. This prevents
     * clients from accidentally creating duplicate commitments.
     * The request ID must be a valid UUID with the exception that zero UUID is
     * not supported (00000000-0000-0000-0000-000000000000).
     *
     * Generated from protobuf field <code>string request_id = 4 [(.google.api.field_behavior) = OPTIONAL];</code>
     * @return string
     */
    public function getRequestId()
    {
        return $this->request_id;
    }

    /**
     * Optional. An optional request ID to identify requests. Specify a unique
     * request ID so that if you must retry your request, the server will know to
     * ignore the request if it has already been completed. The server will
     * guarantee that for at least 60 minutes since the first request.
     * For example, consider a situation where you make an initial request and t
     * he request times out. If you make the request again with the same request
     * ID, the server can check if original operation with the same request ID
     * was received, and if so, will ignore the second request. This prevents
     * clients from accidentally creating duplicate commitments.
     * The request ID must be a valid UUID with the exception that zero UUID is
     * not supported (00000000-0000-0000-0000-000000000000).
     *
     * Generated from protobuf field <code>string request_id = 4 [(.google.api.field_behavior) = OPTIONAL];</code>
     * @param string $var
     * @return $this
     */
    public function setRequestId($var)
    {
        GPBUtil::checkString($var, True);
        $this->request_id = $var;

        return $this;
    }

    /**
     * Optional. If set, validates request by executing a dry-run which would not
     * alter the resource in any way.
     *
     * Generated from protobuf field <code>bool validate_only = 5 [(.google.api.field_behavior) = OPTIONAL];</code>
     * @return bool
     */
    public function getValidateOnly()
    {
        return $this->validate_only;
    }

    /**
     * Optional. If set, validates request by executing a dry-run which would not
     * alter the resource in any way.
     *
     * Generated from protobuf field <code>bool validate_only = 5 [(.google.api.field_behavior) = OPTIONAL];</code>
     * @param bool $var
     * @return $this
     */
    public function setValidateOnly($var)
    {
        GPBUtil::checkBool($var);
        $this->validate_only = $var;

        return $this;
    }

}

