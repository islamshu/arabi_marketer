<?php
# Generated by the protocol buffer compiler.  DO NOT EDIT!
# source: google/cloud/compute/v1/compute.proto

namespace Google\Cloud\Compute\V1\UsableSubnetwork;

use UnexpectedValueException;

/**
 * The stack type for the subnet. If set to IPV4_ONLY, new VMs in the subnet are assigned IPv4 addresses only. If set to IPV4_IPV6, new VMs in the subnet can be assigned both IPv4 and IPv6 addresses. If not specified, IPV4_ONLY is used. This field can be both set at resource creation time and updated using patch.
 *
 * Protobuf type <code>google.cloud.compute.v1.UsableSubnetwork.StackType</code>
 */
class StackType
{
    /**
     * A value indicating that the enum field is not set.
     *
     * Generated from protobuf enum <code>UNDEFINED_STACK_TYPE = 0;</code>
     */
    const UNDEFINED_STACK_TYPE = 0;
    /**
     * New VMs in this subnet can have both IPv4 and IPv6 addresses.
     *
     * Generated from protobuf enum <code>IPV4_IPV6 = 22197249;</code>
     */
    const IPV4_IPV6 = 22197249;
    /**
     * New VMs in this subnet will only be assigned IPv4 addresses.
     *
     * Generated from protobuf enum <code>IPV4_ONLY = 22373798;</code>
     */
    const IPV4_ONLY = 22373798;

    private static $valueToName = [
        self::UNDEFINED_STACK_TYPE => 'UNDEFINED_STACK_TYPE',
        self::IPV4_IPV6 => 'IPV4_IPV6',
        self::IPV4_ONLY => 'IPV4_ONLY',
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


