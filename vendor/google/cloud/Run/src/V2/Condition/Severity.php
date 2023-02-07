<?php
# Generated by the protocol buffer compiler.  DO NOT EDIT!
# source: google/cloud/run/v2/condition.proto

namespace Google\Cloud\Run\V2\Condition;

use UnexpectedValueException;

/**
 * Represents the severity of the condition failures.
 *
 * Protobuf type <code>google.cloud.run.v2.Condition.Severity</code>
 */
class Severity
{
    /**
     * Unspecified severity
     *
     * Generated from protobuf enum <code>SEVERITY_UNSPECIFIED = 0;</code>
     */
    const SEVERITY_UNSPECIFIED = 0;
    /**
     * Error severity.
     *
     * Generated from protobuf enum <code>ERROR = 1;</code>
     */
    const ERROR = 1;
    /**
     * Warning severity.
     *
     * Generated from protobuf enum <code>WARNING = 2;</code>
     */
    const WARNING = 2;
    /**
     * Info severity.
     *
     * Generated from protobuf enum <code>INFO = 3;</code>
     */
    const INFO = 3;

    private static $valueToName = [
        self::SEVERITY_UNSPECIFIED => 'SEVERITY_UNSPECIFIED',
        self::ERROR => 'ERROR',
        self::WARNING => 'WARNING',
        self::INFO => 'INFO',
    ];

    public static function name($value)
    {
        if (!isset(self::$valueToName[$value])) {
            throw new UnexpectedValueException(sprintf(
                    'Enum %s has no name defined for value %s', __CLASS__, $value));
        }
        return self::$valueToName[$value];
    }


    public static function value($name)
    {
        $const = __CLASS__ . '::' . strtoupper($name);
        if (!defined($const)) {
            throw new UnexpectedValueException(sprintf(
                    'Enum %s has no value defined for name %s', __CLASS__, $name));
        }
        return constant($const);
    }
}


