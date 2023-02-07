<?php
# Generated by the protocol buffer compiler.  DO NOT EDIT!
# source: google/cloud/compute/v1/compute.proto

namespace Google\Cloud\Compute\V1;

use Google\Protobuf\Internal\GPBType;
use Google\Protobuf\Internal\RepeatedField;
use Google\Protobuf\Internal\GPBUtil;

/**
 * Represents a textual expression in the Common Expression Language (CEL) syntax. CEL is a C-like expression language. The syntax and semantics of CEL are documented at https://github.com/google/cel-spec. Example (Comparison): title: "Summary size limit" description: "Determines if a summary is less than 100 chars" expression: "document.summary.size() < 100" Example (Equality): title: "Requestor is owner" description: "Determines if requestor is the document owner" expression: "document.owner == request.auth.claims.email" Example (Logic): title: "Public documents" description: "Determine whether the document should be publicly visible" expression: "document.type != 'private' && document.type != 'internal'" Example (Data Manipulation): title: "Notification string" description: "Create a notification string with a timestamp." expression: "'New message received at ' + string(document.create_time)" The exact variables and functions that may be referenced within an expression are determined by the service that evaluates it. See the service documentation for additional information.
 *
 * Generated from protobuf message <code>google.cloud.compute.v1.Expr</code>
 */
class Expr extends \Google\Protobuf\Internal\Message
{
    /**
     * Optional. Description of the expression. This is a longer text which describes the expression, e.g. when hovered over it in a UI.
     *
     * Generated from protobuf field <code>optional string description = 422937596;</code>
     */
    private $description = null;
    /**
     * Textual representation of an expression in Common Expression Language syntax.
     *
     * Generated from protobuf field <code>optional string expression = 352031384;</code>
     */
    private $expression = null;
    /**
     * Optional. String indicating the location of the expression for error reporting, e.g. a file name and a position in the file.
     *
     * Generated from protobuf field <code>optional string location = 290430901;</code>
     */
    private $location = null;
    /**
     * Optional. Title for the expression, i.e. a short string describing its purpose. This can be used e.g. in UIs which allow to enter the expression.
     *
     * Generated from protobuf field <code>optional string title = 110371416;</code>
     */
    private $title = null;

    /**
     * Constructor.
     *
     * @param array $data {
     *     Optional. Data for populating the Message object.
     *
     *     @type string $description
     *           Optional. Description of the expression. This is a longer text which describes the expression, e.g. when hovered over it in a UI.
     *     @type string $expression
     *           Textual representation of an expression in Common Expression Language syntax.
     *     @type string $location
     *           Optional. String indicating the location of the expression for error reporting, e.g. a file name and a position in the file.
     *     @type string $title
     *           Optional. Title for the expression, i.e. a short string describing its purpose. This can be used e.g. in UIs which allow to enter the expression.
     * }
     */
    public function __construct($data = NULL) {
        \GPBMetadata\Google\Cloud\Compute\V1\Compute::initOnce();
        parent::__construct($data);
    }

    /**
     * Optional. Description of the expression. This is a longer text which describes the expression, e.g. when hovered over it in a UI.
     *
     * Generated from protobuf field <code>optional string description = 422937596;</code>
     * @return string
     */
    public function getDescription()
    {
        return isset($this->description) ? $this->description : '';
    }

    public function hasDescription()
    {
        return isset($this->description);
    }

    public function clearDescription()
    {
        unset($this->description);
    }

    /**
     * Optional. Description of the expression. This is a longer text which describes the expression, e.g. when hovered over it in a UI.
     *
     * Generated from protobuf field <code>optional string description = 422937596;</code>
     * @param string $var
     * @return $this
     */
    public function setDescription($var)
    {
        GPBUtil::checkString($var, True);
        $this->description = $var;

        return $this;
    }

    /**
     * Textual representation of an expression in Common Expression Language syntax.
     *
     * Generated from protobuf field <code>optional string expression = 352031384;</code>
     * @return string
     */
    public function getExpression()
    {
        return isset($this->expression) ? $this->expression : '';
    }

    public function hasExpression()
    {
        return isset($this->expression);
    }

    public function clearExpression()
    {
        unset($this->expression);
    }

    /**
     * Textual representation of an expression in Common Expression Language syntax.
     *
     * Generated from protobuf field <code>optional string expression = 352031384;</code>
     * @param string $var
     * @return $this
     */
    public function setExpression($var)
    {
        GPBUtil::checkString($var, True);
        $this->expression = $var;

        return $this;
    }

    /**
     * Optional. String indicating the location of the expression for error reporting, e.g. a file name and a position in the file.
     *
     * Generated from protobuf field <code>optional string location = 290430901;</code>
     * @return string
     */
    public function getLocation()
    {
        return isset($this->location) ? $this->location : '';
    }

    public function hasLocation()
    {
        return isset($this->location);
    }

    public function clearLocation()
    {
        unset($this->location);
    }

    /**
     * Optional. String indicating the location of the expression for error reporting, e.g. a file name and a position in the file.
     *
     * Generated from protobuf field <code>optional string location = 290430901;</code>
     * @param string $var
     * @return $this
     */
    public function setLocation($var)
    {
        GPBUtil::checkString($var, True);
        $this->location = $var;

        return $this;
    }

    /**
     * Optional. Title for the expression, i.e. a short string describing its purpose. This can be used e.g. in UIs which allow to enter the expression.
     *
     * Generated from protobuf field <code>optional string title = 110371416;</code>
     * @return string
     */
    public function getTitle()
    {
        return isset($this->title) ? $this->title : '';
    }

    public function hasTitle()
    {
        return isset($this->title);
    }

    public function clearTitle()
    {
        unset($this->title);
    }

    /**
     * Optional. Title for the expression, i.e. a short string describing its purpose. This can be used e.g. in UIs which allow to enter the expression.
     *
     * Generated from protobuf field <code>optional string title = 110371416;</code>
     * @param string $var
     * @return $this
     */
    public function setTitle($var)
    {
        GPBUtil::checkString($var, True);
        $this->title = $var;

        return $this;
    }

}
