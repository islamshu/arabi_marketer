<?php
# Generated by the protocol buffer compiler.  DO NOT EDIT!
# source: google/cloud/binaryauthorization/v1beta1/resources.proto

namespace Google\Cloud\BinaryAuthorization\V1beta1;

use Google\Protobuf\Internal\GPBType;
use Google\Protobuf\Internal\RepeatedField;
use Google\Protobuf\Internal\GPBUtil;

/**
 * A public key in the PkixPublicKey format (see
 * https://tools.ietf.org/html/rfc5280#section-4.1.2.7 for details).
 * Public keys of this type are typically textually encoded using the PEM
 * format.
 *
 * Generated from protobuf message <code>google.cloud.binaryauthorization.v1beta1.PkixPublicKey</code>
 */
class PkixPublicKey extends \Google\Protobuf\Internal\Message
{
    /**
     * A PEM-encoded public key, as described in
     * https://tools.ietf.org/html/rfc7468#section-13
     *
     * Generated from protobuf field <code>string public_key_pem = 1;</code>
     */
    private $public_key_pem = '';
    /**
     * The signature algorithm used to verify a message against a signature using
     * this key.
     * These signature algorithm must match the structure and any object
     * identifiers encoded in `public_key_pem` (i.e. this algorithm must match
     * that of the public key).
     *
     * Generated from protobuf field <code>.google.cloud.binaryauthorization.v1beta1.PkixPublicKey.SignatureAlgorithm signature_algorithm = 2;</code>
     */
    private $signature_algorithm = 0;

    /**
     * Constructor.
     *
     * @param array $data {
     *     Optional. Data for populating the Message object.
     *
     *     @type string $public_key_pem
     *           A PEM-encoded public key, as described in
     *           https://tools.ietf.org/html/rfc7468#section-13
     *     @type int $signature_algorithm
     *           The signature algorithm used to verify a message against a signature using
     *           this key.
     *           These signature algorithm must match the structure and any object
     *           identifiers encoded in `public_key_pem` (i.e. this algorithm must match
     *           that of the public key).
     * }
     */
    public function __construct($data = NULL) {
        \GPBMetadata\Google\Cloud\Binaryauthorization\V1Beta1\Resources::initOnce();
        parent::__construct($data);
    }

    /**
     * A PEM-encoded public key, as described in
     * https://tools.ietf.org/html/rfc7468#section-13
     *
     * Generated from protobuf field <code>string public_key_pem = 1;</code>
     * @return string
     */
    public function getPublicKeyPem()
    {
        return $this->public_key_pem;
    }

    /**
     * A PEM-encoded public key, as described in
     * https://tools.ietf.org/html/rfc7468#section-13
     *
     * Generated from protobuf field <code>string public_key_pem = 1;</code>
     * @param string $var
     * @return $this
     */
    public function setPublicKeyPem($var)
    {
        GPBUtil::checkString($var, True);
        $this->public_key_pem = $var;

        return $this;
    }

    /**
     * The signature algorithm used to verify a message against a signature using
     * this key.
     * These signature algorithm must match the structure and any object
     * identifiers encoded in `public_key_pem` (i.e. this algorithm must match
     * that of the public key).
     *
     * Generated from protobuf field <code>.google.cloud.binaryauthorization.v1beta1.PkixPublicKey.SignatureAlgorithm signature_algorithm = 2;</code>
     * @return int
     */
    public function getSignatureAlgorithm()
    {
        return $this->signature_algorithm;
    }

    /**
     * The signature algorithm used to verify a message against a signature using
     * this key.
     * These signature algorithm must match the structure and any object
     * identifiers encoded in `public_key_pem` (i.e. this algorithm must match
     * that of the public key).
     *
     * Generated from protobuf field <code>.google.cloud.binaryauthorization.v1beta1.PkixPublicKey.SignatureAlgorithm signature_algorithm = 2;</code>
     * @param int $var
     * @return $this
     */
    public function setSignatureAlgorithm($var)
    {
        GPBUtil::checkEnum($var, \Google\Cloud\BinaryAuthorization\V1beta1\PkixPublicKey\SignatureAlgorithm::class);
        $this->signature_algorithm = $var;

        return $this;
    }

}

