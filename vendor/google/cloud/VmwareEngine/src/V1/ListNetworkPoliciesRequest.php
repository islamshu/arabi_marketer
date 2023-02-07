<?php
# Generated by the protocol buffer compiler.  DO NOT EDIT!
# source: google/cloud/vmwareengine/v1/vmwareengine.proto

namespace Google\Cloud\VmwareEngine\V1;

use Google\Protobuf\Internal\GPBType;
use Google\Protobuf\Internal\RepeatedField;
use Google\Protobuf\Internal\GPBUtil;

/**
 * Request message for
 * [VmwareEngine.ListNetworkPolicies][google.cloud.vmwareengine.v1.VmwareEngine.ListNetworkPolicies]
 *
 * Generated from protobuf message <code>google.cloud.vmwareengine.v1.ListNetworkPoliciesRequest</code>
 */
class ListNetworkPoliciesRequest extends \Google\Protobuf\Internal\Message
{
    /**
     * Required. The resource name of the location (region) to query for
     * network policies. Resource names are schemeless URIs that follow the
     * conventions in https://cloud.google.com/apis/design/resource_names. For
     * example: `projects/my-project/locations/us-central1`
     *
     * Generated from protobuf field <code>string parent = 1 [(.google.api.field_behavior) = REQUIRED, (.google.api.resource_reference) = {</code>
     */
    private $parent = '';
    /**
     * The maximum number of network policies to return in one page.
     * The service may return fewer than this value.
     * The maximum value is coerced to 1000.
     * The default value of this field is 500.
     *
     * Generated from protobuf field <code>int32 page_size = 2;</code>
     */
    private $page_size = 0;
    /**
     * A page token, received from a previous `ListNetworkPolicies` call.
     * Provide this to retrieve the subsequent page.
     * When paginating, all other parameters provided to
     * `ListNetworkPolicies` must match the call that provided the page
     * token.
     *
     * Generated from protobuf field <code>string page_token = 3;</code>
     */
    private $page_token = '';
    /**
     * A filter expression that matches resources returned in the response.
     * The expression must specify the field name, a comparison
     * operator, and the value that you want to use for filtering. The value
     * must be a string, a number, or a boolean. The comparison operator
     * must be `=`, `!=`, `>`, or `<`.
     * For example, if you are filtering a list of network policies, you can
     * exclude the ones named `example-policy` by specifying
     * `name != "example-policy"`.
     * To filter on multiple expressions, provide each separate expression within
     * parentheses. For example:
     * ```
     * (name = "example-policy")
     * (createTime > "2021-04-12T08:15:10.40Z")
     * ```
     * By default, each expression is an `AND` expression. However, you
     * can include `AND` and `OR` expressions explicitly.
     * For example:
     * ```
     * (name = "example-policy-1") AND
     * (createTime > "2021-04-12T08:15:10.40Z") OR
     * (name = "example-policy-2")
     * ```
     *
     * Generated from protobuf field <code>string filter = 4;</code>
     */
    private $filter = '';
    /**
     * Sorts list results by a certain order. By default, returned results
     * are ordered by `name` in ascending order.
     * You can also sort results in descending order based on the `name` value
     * using `orderBy="name desc"`.
     * Currently, only ordering by `name` is supported.
     *
     * Generated from protobuf field <code>string order_by = 5;</code>
     */
    private $order_by = '';

    /**
     * Constructor.
     *
     * @param array $data {
     *     Optional. Data for populating the Message object.
     *
     *     @type string $parent
     *           Required. The resource name of the location (region) to query for
     *           network policies. Resource names are schemeless URIs that follow the
     *           conventions in https://cloud.google.com/apis/design/resource_names. For
     *           example: `projects/my-project/locations/us-central1`
     *     @type int $page_size
     *           The maximum number of network policies to return in one page.
     *           The service may return fewer than this value.
     *           The maximum value is coerced to 1000.
     *           The default value of this field is 500.
     *     @type string $page_token
     *           A page token, received from a previous `ListNetworkPolicies` call.
     *           Provide this to retrieve the subsequent page.
     *           When paginating, all other parameters provided to
     *           `ListNetworkPolicies` must match the call that provided the page
     *           token.
     *     @type string $filter
     *           A filter expression that matches resources returned in the response.
     *           The expression must specify the field name, a comparison
     *           operator, and the value that you want to use for filtering. The value
     *           must be a string, a number, or a boolean. The comparison operator
     *           must be `=`, `!=`, `>`, or `<`.
     *           For example, if you are filtering a list of network policies, you can
     *           exclude the ones named `example-policy` by specifying
     *           `name != "example-policy"`.
     *           To filter on multiple expressions, provide each separate expression within
     *           parentheses. For example:
     *           ```
     *           (name = "example-policy")
     *           (createTime > "2021-04-12T08:15:10.40Z")
     *           ```
     *           By default, each expression is an `AND` expression. However, you
     *           can include `AND` and `OR` expressions explicitly.
     *           For example:
     *           ```
     *           (name = "example-policy-1") AND
     *           (createTime > "2021-04-12T08:15:10.40Z") OR
     *           (name = "example-policy-2")
     *           ```
     *     @type string $order_by
     *           Sorts list results by a certain order. By default, returned results
     *           are ordered by `name` in ascending order.
     *           You can also sort results in descending order based on the `name` value
     *           using `orderBy="name desc"`.
     *           Currently, only ordering by `name` is supported.
     * }
     */
    public function __construct($data = NULL) {
        \GPBMetadata\Google\Cloud\Vmwareengine\V1\Vmwareengine::initOnce();
        parent::__construct($data);
    }

    /**
     * Required. The resource name of the location (region) to query for
     * network policies. Resource names are schemeless URIs that follow the
     * conventions in https://cloud.google.com/apis/design/resource_names. For
     * example: `projects/my-project/locations/us-central1`
     *
     * Generated from protobuf field <code>string parent = 1 [(.google.api.field_behavior) = REQUIRED, (.google.api.resource_reference) = {</code>
     * @return string
     */
    public function getParent()
    {
        return $this->parent;
    }

    /**
     * Required. The resource name of the location (region) to query for
     * network policies. Resource names are schemeless URIs that follow the
     * conventions in https://cloud.google.com/apis/design/resource_names. For
     * example: `projects/my-project/locations/us-central1`
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
     * The maximum number of network policies to return in one page.
     * The service may return fewer than this value.
     * The maximum value is coerced to 1000.
     * The default value of this field is 500.
     *
     * Generated from protobuf field <code>int32 page_size = 2;</code>
     * @return int
     */
    public function getPageSize()
    {
        return $this->page_size;
    }

    /**
     * The maximum number of network policies to return in one page.
     * The service may return fewer than this value.
     * The maximum value is coerced to 1000.
     * The default value of this field is 500.
     *
     * Generated from protobuf field <code>int32 page_size = 2;</code>
     * @param int $var
     * @return $this
     */
    public function setPageSize($var)
    {
        GPBUtil::checkInt32($var);
        $this->page_size = $var;

        return $this;
    }

    /**
     * A page token, received from a previous `ListNetworkPolicies` call.
     * Provide this to retrieve the subsequent page.
     * When paginating, all other parameters provided to
     * `ListNetworkPolicies` must match the call that provided the page
     * token.
     *
     * Generated from protobuf field <code>string page_token = 3;</code>
     * @return string
     */
    public function getPageToken()
    {
        return $this->page_token;
    }

    /**
     * A page token, received from a previous `ListNetworkPolicies` call.
     * Provide this to retrieve the subsequent page.
     * When paginating, all other parameters provided to
     * `ListNetworkPolicies` must match the call that provided the page
     * token.
     *
     * Generated from protobuf field <code>string page_token = 3;</code>
     * @param string $var
     * @return $this
     */
    public function setPageToken($var)
    {
        GPBUtil::checkString($var, True);
        $this->page_token = $var;

        return $this;
    }

    /**
     * A filter expression that matches resources returned in the response.
     * The expression must specify the field name, a comparison
     * operator, and the value that you want to use for filtering. The value
     * must be a string, a number, or a boolean. The comparison operator
     * must be `=`, `!=`, `>`, or `<`.
     * For example, if you are filtering a list of network policies, you can
     * exclude the ones named `example-policy` by specifying
     * `name != "example-policy"`.
     * To filter on multiple expressions, provide each separate expression within
     * parentheses. For example:
     * ```
     * (name = "example-policy")
     * (createTime > "2021-04-12T08:15:10.40Z")
     * ```
     * By default, each expression is an `AND` expression. However, you
     * can include `AND` and `OR` expressions explicitly.
     * For example:
     * ```
     * (name = "example-policy-1") AND
     * (createTime > "2021-04-12T08:15:10.40Z") OR
     * (name = "example-policy-2")
     * ```
     *
     * Generated from protobuf field <code>string filter = 4;</code>
     * @return string
     */
    public function getFilter()
    {
        return $this->filter;
    }

    /**
     * A filter expression that matches resources returned in the response.
     * The expression must specify the field name, a comparison
     * operator, and the value that you want to use for filtering. The value
     * must be a string, a number, or a boolean. The comparison operator
     * must be `=`, `!=`, `>`, or `<`.
     * For example, if you are filtering a list of network policies, you can
     * exclude the ones named `example-policy` by specifying
     * `name != "example-policy"`.
     * To filter on multiple expressions, provide each separate expression within
     * parentheses. For example:
     * ```
     * (name = "example-policy")
     * (createTime > "2021-04-12T08:15:10.40Z")
     * ```
     * By default, each expression is an `AND` expression. However, you
     * can include `AND` and `OR` expressions explicitly.
     * For example:
     * ```
     * (name = "example-policy-1") AND
     * (createTime > "2021-04-12T08:15:10.40Z") OR
     * (name = "example-policy-2")
     * ```
     *
     * Generated from protobuf field <code>string filter = 4;</code>
     * @param string $var
     * @return $this
     */
    public function setFilter($var)
    {
        GPBUtil::checkString($var, True);
        $this->filter = $var;

        return $this;
    }

    /**
     * Sorts list results by a certain order. By default, returned results
     * are ordered by `name` in ascending order.
     * You can also sort results in descending order based on the `name` value
     * using `orderBy="name desc"`.
     * Currently, only ordering by `name` is supported.
     *
     * Generated from protobuf field <code>string order_by = 5;</code>
     * @return string
     */
    public function getOrderBy()
    {
        return $this->order_by;
    }

    /**
     * Sorts list results by a certain order. By default, returned results
     * are ordered by `name` in ascending order.
     * You can also sort results in descending order based on the `name` value
     * using `orderBy="name desc"`.
     * Currently, only ordering by `name` is supported.
     *
     * Generated from protobuf field <code>string order_by = 5;</code>
     * @param string $var
     * @return $this
     */
    public function setOrderBy($var)
    {
        GPBUtil::checkString($var, True);
        $this->order_by = $var;

        return $this;
    }

}

