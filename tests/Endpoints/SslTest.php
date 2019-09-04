<?php

namespace nickurt\OpenProvider\Tests\Endpoints;

class SslTest extends BaseEndpointTest
{
    /** @test */
    public function it_can_do_a_cancel_ssl_cert_request()
    {
        $this->mockApiClientResponse(new \GuzzleHttp\Psr7\Response(200, [], '<?xml version="1.0" encoding="UTF-8"?><openXML><reply><code>0</code><desc></desc><data><id>12345</id></data></reply></openXML>'));

        $ssl = $this->openProvider->ssl()->cancelSslCert([
            'id' => 12345,
        ]);

        $this->assertSame(['reply' => ['code' => '0', 'desc' => [], 'data' => ['id' => '12345']]], $ssl);
    }

    /** @test */
    public function it_can_do_a_change_approver_email_address_ssl_cert_request()
    {
        $this->mockApiClientResponse(new \GuzzleHttp\Psr7\Response(200, [], '<?xml version="1.0" encoding="UTF-8"?><openXML><reply><code>0</code><desc></desc><data><id>12345</id></data></reply></openXML>'));

        $ssl = $this->openProvider->ssl()->changeApproverEmailAddressSslCert([
            'id' => 12345,
            'approverEmail' => 'info@openprovider.nl',
        ]);

        $this->assertSame(['reply' => ['code' => '0', 'desc' => [], 'data' => ['id' => '12345']]], $ssl);
    }

    /** @test */
    public function it_can_do_a_create_ssl_cert_request()
    {
        $this->mockApiClientResponse(new \GuzzleHttp\Psr7\Response(200, [], '<?xml version="1.0" encoding="UTF-8"?><openXML><reply><code>0</code><desc /><data><id>2480</id></data></reply></openXML>'));

        $ssl = $this->openProvider->ssl()->createSslCert([
            'productId' => 5,
            'period' => 2,
            'csr' => '-----BEGIN CERTIFICATE REQUEST-----
MIIBvzCCASgCAQAwfzELMAkGA1UEBhMCTkwxCzAJBgNVBAgTAlpIMQ0wCwYDVQQH
EwRSZGFtMQ8wDQYDVQQKEwZSb29yZGExHDAaBgNVBAMTE8d3dy5zaWVtZW5yb29y
ZGEubmwxJTAjBgkqhkiG9w0BCQEWFnNpZW1lbkBzbWVtZW5yb29yZGEubmwwgZ8w
DQYJKoZIhvcNAQEBBQADgY0AMIGJAoGBAKo5t1d4ka11M6NSUca2KBJS8d3a7lPh
7xlMAyNAvI68EQJEbPJ0UPxM9AiIS4HoVzXSGrP7lqwR8mQhM5HZkXAvvKfUnoN9
BD4/k9Z/uErqtED/FQuOknmnHvgvAJewfTaaSN4+tbs1d54Yux9B/XeIhqyiWv9o
cRNh+gBMW8OLAgMBAAGgADANBgkqhkiG9w0BAQQFAAOBgQBFTxJ12R6juNaWQtmm
JMWPrv0MDosDOIBZrCZoyF+VStANG8PoTg1VD7RgG+pZItCcp/X5MrHNsUUnySW5
kUaUx8Z21OOaoYjlHZTUaGfX5VKjjKH3NZ373Xms6Y9PcbX2nhvfo8IFSgnWKXD8
7Vyp67kPlzocoO3rcGd+PmU/aQ==
-----END CERTIFICATE REQUEST-----',
            'softwareId' => 'linux',
            'organizationHandle' => 'GA003358-NL',
            'technicalHandle' => 'GA003358-NL',
            'approverEmail' => 'info@openprovider.nl'
        ]);

        $this->assertSame(['reply' => ['code' => '0', 'desc' => [], 'data' => ['id' => '2480']]], $ssl);
    }

    /** @test */
    public function it_can_do_a_decode_csr_ssl_cert_request()
    {
        $this->mockApiClientResponse(new \GuzzleHttp\Psr7\Response(200, [], file_get_contents(__DIR__ . '/__snapshots__/it_can_do_a_decode_csr_ssl_cert_request.xml')));

        $ssl = $this->openProvider->ssl()->decodeCsrSslCert([
            'csr' => '-----BEGIN CERTIFICATE REQUEST-----
MIIDADCCAegCAQAwgboxCzAJBgNVBAYTAk5MMRUwEwYDVQQIDAxadWlkLUhvbGxh
bmQxEjAQBgNVBACMCVJvdHRlcmRhbTEtMCsGA1UECgwkT3BlbnByb3ZpZGVyIChI
b3N0aW5nIENvbmnlcHRzIEIuVi4pMQwwCgYDVQQLDANJQ1QxHDAaBgNVBAMME3d3
dy5vcGVucHJvdmlkZXIubmwxJTAjBgkqhkiG9w0BCQEWFmRvbXJlZ0BvcGVucHJv
dmlkZXIubmwwgdEiMA0GCSqGSIb3DQEBAQUAA4IBDwAwggEKAoIBAQChHX2breTh
JnSntQv3ZYnIC3FIHK/g8o08tgSJHTMk9tuQdULvdV43+46tq+cII/NAnUkWQfjr
rMof0SRxBvts92CT22R0L0k0CklggEJl7QxAfJu2qbMpMTU/1zQy9vogclh5RZRK
NY1pTC1rf8eMj/plCFioS3i3hzeRpXFbiqDVjzR1mF5o//xgTrf34uL4ar3z8ruA
O4xU8wWk4RZ8Q/nPyxHyoCvyBjvTmik/qJ7jyqxghE2aZl2MX3pGGbmoJoYDwC/T
v4krJfpZ0TrIJxc3Bwnv76/kLtPyHKpZiVWsAkOBoA5zzsPjR7sxyn+7k5ufgeZH
YR5FAIF02i/dAgMBAAGgADANBgkqhkiG9w0BAQUFAAOCAQEAaaonnVpqCfhgq7Cc
1p0J8BMu6TF6bxOzYa7JZNZu7IP167BRpzc4nItlDU0CQWTRjQmQGJq+CulpAgiC
ZOX3PRyIZ7DdIF8vfYX9ZCT7nZXeUA3p+wd9ifbhqHdoEnRv2qOepJwQXlBJFE5z
OJnPIgzNxei/HrqOFM6Z2+4HA6p8Kv6C0pLV/RADPE8FP48VgxHAHn8WWPR8lRUI
mQb5rHJYfiS9ate2vJB2YXEgtaUVG/8oe3ZbXlTFwBbd8Be25agI4quQw3l/7int
RNbG/0pqzKDEyj3mFVPa/1vgMBfqJ42rb2vcZKN7q0wSZ4YNdGwtfdPx4pGqA3Jl
WxwuLA==
-----END CERTIFICATE REQUEST-----',
        ]);

        $this->assertSame(json_decode(file_get_contents(__DIR__ . '/__snapshots__/it_can_do_a_decode_csr_ssl_cert_request.json'), true), $ssl);
    }

    /** @test */
    public function it_can_do_a_generate_csr_ssl_cert_request()
    {
        $this->mockApiClientResponse(new \GuzzleHttp\Psr7\Response(200, [], '<?xml version="1.0" encoding="UTF-8"?><openXML><reply><code>0</code><desc /><data><command>openssl req -new  -newkey rsa:2048 -nodes -out your.csr -keyout your.private.key -subj "/C=US/ST=/L=/O=/OU=/CN=test.com/emailAddress=""</command><key>-----BEGIN PRIVATE KEY-----BASE64PRIVATEKEYHERE-----END PRIVATE KEY-----</key><csr>-----BEGIN CERTIFICATE REQUEST-----BASE64CSRHERE-----END CERTIFICATE REQUEST-----</csr></data></reply></openXML>'));

        $ssl = $this->openProvider->ssl()->generateCsrSslCert([
            'bits' => '2048',
            'commonName' => 'test.com',
            'country' => 'US',
        ]);

        $this->assertSame(['reply' => ['code' => '0', 'desc' => [], 'data' => ['command' => 'openssl req -new  -newkey rsa:2048 -nodes -out your.csr -keyout your.private.key -subj "/C=US/ST=/L=/O=/OU=/CN=test.com/emailAddress=""', 'key' => '-----BEGIN PRIVATE KEY-----BASE64PRIVATEKEYHERE-----END PRIVATE KEY-----', 'csr' => '-----BEGIN CERTIFICATE REQUEST-----BASE64CSRHERE-----END CERTIFICATE REQUEST-----']]], $ssl);
    }

    /** @test */
    public function it_can_do_a_generate_otp_token_ssl_cert_request()
    {
        $this->mockApiClientResponse(new \GuzzleHttp\Psr7\Response(200, [], '<?xml version="1.0" encoding="UTF-8"?><openXML><reply><code>0</code><desc /><data><uri>https://sslpanel.io/auth-order-otp-token</uri><token>aqlFgU8wHHAD0fGCDvS2iUlsou5bq0LY</token><expireAt>2017-02-02 09:10:04</expireAt></data></reply></openXML>'));

        $ssl = $this->openProvider->ssl()->generateOtpTokenSslCert([
            'id' => 5,
        ]);

        $this->assertSame(['reply' => ['code' => '0', 'desc' => [], 'data' => ['uri' => 'https://sslpanel.io/auth-order-otp-token', 'token' => 'aqlFgU8wHHAD0fGCDvS2iUlsou5bq0LY', 'expireAt' => '2017-02-02 09:10:04']]], $ssl);
    }

    /** @test */
    public function it_can_do_a_modify_ssl_cert_request()
    {
        $this->mockApiClientResponse(new \GuzzleHttp\Psr7\Response(200, [], '<?xml version="1.0" encoding="UTF-8"?><openXML><reply><code>0</code><desc /><data><id>2480</id></data></reply></openXML>'));

        $ssl = $this->openProvider->ssl()->modifySslCert([
            'id' => 5,
            'domainValidationMethods' => [
                [
                    'hostName' => 'openprovider.nl',
                    'method' => 'admin@openprovider.nl'
                ],
            ],
        ]);

        $this->assertSame(['reply' => ['code' => '0', 'desc' => [], 'data' => ['id' => '2480']]], $ssl);
    }

    /** @test */
    public function it_can_do_a_reissue_ssl_cert_request()
    {
        $this->mockApiClientResponse(new \GuzzleHttp\Psr7\Response(200, [], '<?xml version="1.0" encoding="UTF-8"?><openXML><reply><code>0</code><desc></desc><data><id>12345</id></data></reply></openXML>'));

        $ssl = $this->openProvider->ssl()->reissueSslCert([
            'id' => 12345,
            'csr' => '-----BEGIN CERTIFICATE REQUEST-----
MIIC1jCCAb4CAQAwgZAxCzAJBgNVBAYTAk5MMRUwEwYDVQQIEwxadWlkLUhvbGxh
bmQxEjAQBgNVBAcTCU1hYXNzbHVpczEPMA0GA1UEChMGUm9vcmRhMRgwFgYDVQQD
Ew91a2tpZXB1a2tpZXMubmwxKzApBgkqhkiG9w0BCQEWHG9wZW5wcm92aWRlckBz
aWVtZW5yb29yZGEubmwwggEiMA0GCSqGSIb3DQEBAQUAA4IBDwAwggEKAoIBAQCU
dalT1PfBYE0FuMMvcHwF7TCKD0lAAijpokwUza9U5BweUokN90WrjrGnEevPs5TR
Mu0gFk5gBBvREvTe14grcWmfnYrDA/C520f8rQbZ94usVDts6hEy5BcpB5yDbiIs
h/CJ/0KF47IIbqrt/uSEgSw8UBW4+RuGXl6SMaj+VCY9RPn2pNRecOjD4vD4XOjd
4/T04n/xwaFNBeoWnS82EK2mPFviPyhupxAUi45hGxI4ZOOz7xYFYsIBD8T3GvMh
8M/efgYlmcZtsrldF20LcO/XSPgtvxccIgnG8kDVgjHEExPQKSW5VJOPzRnZkbix
bgyeJ7eEafc6sHyHBodhAgMBAAGgADANBgkqhkiG9w0BAQQFAAOCAQEAVJwarWbE
pCRycZYU4RdBBfS0dPw5BscpyUIZr73c6u6UOQbBJXstpfNWCj+uq9B/O4Bwf82W
FBNN4HxCONXC9JllBA/GnaO79MUvDaeompsjOGz+lDW/hFJsfnpztOEk8s04tgz6
V+uXn0Qh7xPCrr5gbntE+N+3xKIOFX6nZBtahKPv240x3ts0FC1z4sPiIjI4P3f2
ql4PFDPxDgmaPGjXsSj1w/K28wTTiQxIxd8jvk9UJTKHTNB5dnQCafFzidkcWuQx
9DoEJsGCUgogPw==
-----END CERTIFICATE REQUEST-----',
            'softwareId' => 'linux',
            'hostNames' => [
                'www.openprovider.com',
                'www.openprovider.eu',
            ],
            'organizationHandle' => 'GA003358-NL',
            'technicalHandle' => 'GA003358-NL',
            'approverEmail' => 'info@openprovider.nl'
        ]);

        $this->assertSame(['reply' => ['code' => '0', 'desc' => [], 'data' => ['id' => '12345']]], $ssl);
    }

    /** @test */
    public function it_can_do_a_renew_ssl_cert_request()
    {
        $this->mockApiClientResponse(new \GuzzleHttp\Psr7\Response(200, [], '<?xml version="1.0" encoding="UTF-8"?><openXML><reply><code>0</code><desc /><data><id>5</id></data></reply></openXML>'));

        $ssl = $this->openProvider->ssl()->renewSslCert([
            'id' => 5,
        ]);

        $this->assertSame(['reply' => ['code' => '0', 'desc' => [], 'data' => ['id' => '5']]], $ssl);
    }

    /** @test */
    public function it_can_do_a_resend_approver_email_ssl_cert_request()
    {
        $this->mockApiClientResponse(new \GuzzleHttp\Psr7\Response(200, [], '<?xml version="1.0" encoding="UTF-8"?><openXML><reply><code>0</code><desc></desc><data><id>12345</id></data></reply></openXML>'));

        $ssl = $this->openProvider->ssl()->resendApproverEmailSslCert([
            'id' => 12345,
        ]);

        $this->assertSame(['reply' => ['code' => '0', 'desc' => [], 'data' => ['id' => '12345']]], $ssl);
    }

    /** @test */
    public function it_can_do_a_retrieve_approver_email_list_ssl_cert_request()
    {
        $this->mockApiClientResponse(new \GuzzleHttp\Psr7\Response(200, [], '<?xml version="1.0" encoding="UTF-8"?><openXML><reply><code>0</code><desc /><data><array><item>admin@openprovider.com</item><item>webmaster@openprovider.com</item><item>hostmaster@openprovider.com</item></array></data></reply></openXML>'));

        $ssl = $this->openProvider->ssl()->retrieveApproverEmailListSslCert([
            'domain' => 'openprovider.com',
            'productId' => 1,
        ]);

        $this->assertSame(['reply' => ['code' => '0', 'desc' => [], 'data' => ['array' => ['item' => [0 => 'admin@openprovider.com', 1 => 'webmaster@openprovider.com', 2 => 'hostmaster@openprovider.com']]]]], $ssl);
    }

    /** @test */
    public function it_can_do_a_retrieve_order_ssl_cert_request()
    {
        $this->mockApiClientResponse(new \GuzzleHttp\Psr7\Response(200, [], file_get_contents(__DIR__ . '/__snapshots__/it_can_do_a_retrieve_order_ssl_cert_request.xml')));

        $ssl = $this->openProvider->ssl()->retrieveOrderSslCert([
            'id' => 1864
        ]);

        $this->assertSame(json_decode(file_get_contents(__DIR__ . '/__snapshots__/it_can_do_a_retrieve_order_ssl_cert_request.json'), true), $ssl);
    }

    /** @test */
    public function it_can_do_a_retrieve_product_ssl_cert_request()
    {
        $this->mockApiClientResponse(new \GuzzleHttp\Psr7\Response(200, [], '<?xml version="1.0" encoding="UTF-8"?><openXML><reply><code>0</code><desc /><data><id>8</id><name>QuickSSL Premium</name><brandName>GeoTrust</brandName><category>domain_validation</category><isMobileSupported>1</isMobileSupported><isIdnSupported>0</isIdnSupported><isSgcSupported>0</isSgcSupported><isWildcardSupported>0</isWildcardSupported><isExtendedValidationSupported>0</isExtendedValidationSupported><deliveryTime>10m</deliveryTime><freeRefundPeriod>7d</freeRefundPeriod><freeReissuePeriod>lifetime</freeReissuePeriod><maxPeriod>5</maxPeriod><numberOfDomains>1</numberOfDomains><encryption>40/256 bits</encryption><root>Equifax Secure CA</root><warranty><product><price>100000.00</price><currency>USD</currency></product><reseller><price>77207.91</price><currency>EUR</currency></reseller></warranty><supportedSoftware><array><item><id>apachessl</id><title>Apache + MOD SSL</title></item><item><id>apacheraven</id><title>Apache + Raven</title></item><item><id>apachessleay</id><title>Apache + SSLeay</title></item><item><id>c2net</id><title>C2Net Stronghold</title></item><item><id>Ibmhttp</id><title>IBM HTTP</title></item><item><id>Iplanet</id><title>iPlanet Server 4.1</title></item><item><id>Dominogo4625</id><title>Lotus Domino Go 4.6.2.51</title></item><item><id>Dominogo4626</id><title>Lotus Domino Go 4.6.2.6+</title></item><item><id>Domino</id><title>Lotus Domino 4.6+</title></item><item><id>iis4</id><title>Microsoft IIS 4.0</title></item><item><id>iis5</id><title>Microsoft IIS 5.0</title></item><item><id>Netscape</id><title>Netscape Enterprise/FastTrack</title></item><item><id>zeusv3</id><title>Zeus v3+</title></item><item><id>Other</id><title>Other</title></item><item><id>apacheopenssl</id><title>Apache + OpenSSL</title></item><item><id>apache2</id><title>Apache 2</title></item><item><id>apacheapachessl</id><title>Apache + ApacheSSL</title></item><item><id>cobaltseries</id><title>Cobalt Series</title></item><item><id>cpanel</id><title>Cpanel</title></item><item><id>ensim</id><title>Ensim</title></item><item><id>hsphere</id><title>Hsphere</title></item><item><id>ipswitch </id><title>Ipswitch</title></item><item><id>plesk</id><title>Plesk</title></item><item><id>tomcat</id><title>Jakart-Tomcat</title></item><item><id>WebLogic</id><title>WebLogic - all versions</title></item><item><id>website</id><title>O\'Reilly WebSite Professional</title></item><item><id>webstar</id><title>WebStar</title></item><item><id>iis</id><title>Microsoft Internet Information Server</title></item></array></supportedSoftware><description>A QuickSSL Premium SSL certificate exactly does what its name suggests: securing your website without having to wait for a long validation process. This SSL certificate also secures connections with most mobile browsers. The warranty of a QuickSSL Premium certificate is $ 100.000.</description><prices><array><item><period>1</period><price><product><price>79.00</price><currency>EUR</currency></product><reseller><price>79.00</price><currency>EUR</currency></reseller></price></item><item><period>2</period><price><product><price>139.00</price><currency>EUR</currency></product><reseller><price>139.00</price><currency>EUR</currency></reseller></price></item><item><period>3</period><price><product><price>199.00</price><currency>EUR</currency></product><reseller><price>199.00</price><currency>EUR</currency></reseller></price></item></array></prices></data></reply></openXML>'));

        $ssl = $this->openProvider->ssl()->retrieveProductSslCert([
            'id' => 8
        ]);

        $this->assertSame(['reply' => ['code' => '0', 'desc' => [], 'data' => ['id' => '8', 'name' => 'QuickSSL Premium', 'brandName' => 'GeoTrust', 'category' => 'domain_validation', 'isMobileSupported' => '1', 'isIdnSupported' => '0', 'isSgcSupported' => '0', 'isWildcardSupported' => '0', 'isExtendedValidationSupported' => '0', 'deliveryTime' => '10m', 'freeRefundPeriod' => '7d', 'freeReissuePeriod' => 'lifetime', 'maxPeriod' => '5', 'numberOfDomains' => '1', 'encryption' => '40/256 bits', 'root' => 'Equifax Secure CA', 'warranty' => ['product' => ['price' => '100000.00', 'currency' => 'USD'], 'reseller' => ['price' => '77207.91', 'currency' => 'EUR']], 'supportedSoftware' => ['array' => ['item' => [0 => ['id' => 'apachessl', 'title' => 'Apache + MOD SSL'], 1 => ['id' => 'apacheraven', 'title' => 'Apache + Raven'], 2 => ['id' => 'apachessleay', 'title' => 'Apache + SSLeay'], 3 => ['id' => 'c2net', 'title' => 'C2Net Stronghold'], 4 => ['id' => 'Ibmhttp', 'title' => 'IBM HTTP'], 5 => ['id' => 'Iplanet', 'title' => 'iPlanet Server 4.1'], 6 => ['id' => 'Dominogo4625', 'title' => 'Lotus Domino Go 4.6.2.51'], 7 => ['id' => 'Dominogo4626', 'title' => 'Lotus Domino Go 4.6.2.6+'], 8 => ['id' => 'Domino', 'title' => 'Lotus Domino 4.6+'], 9 => ['id' => 'iis4', 'title' => 'Microsoft IIS 4.0'], 10 => ['id' => 'iis5', 'title' => 'Microsoft IIS 5.0'], 11 => ['id' => 'Netscape', 'title' => 'Netscape Enterprise/FastTrack'], 12 => ['id' => 'zeusv3', 'title' => 'Zeus v3+'], 13 => ['id' => 'Other', 'title' => 'Other'], 14 => ['id' => 'apacheopenssl', 'title' => 'Apache + OpenSSL'], 15 => ['id' => 'apache2', 'title' => 'Apache 2'], 16 => ['id' => 'apacheapachessl', 'title' => 'Apache + ApacheSSL'], 17 => ['id' => 'cobaltseries', 'title' => 'Cobalt Series'], 18 => ['id' => 'cpanel', 'title' => 'Cpanel'], 19 => ['id' => 'ensim', 'title' => 'Ensim'], 20 => ['id' => 'hsphere', 'title' => 'Hsphere'], 21 => ['id' => 'ipswitch ', 'title' => 'Ipswitch'], 22 => ['id' => 'plesk', 'title' => 'Plesk'], 23 => ['id' => 'tomcat', 'title' => 'Jakart-Tomcat'], 24 => ['id' => 'WebLogic', 'title' => 'WebLogic - all versions'], 25 => ['id' => 'website', 'title' => 'O\'Reilly WebSite Professional'], 26 => ['id' => 'webstar', 'title' => 'WebStar'], 27 => ['id' => 'iis', 'title' => 'Microsoft Internet Information Server']]]], 'description' => 'A QuickSSL Premium SSL certificate exactly does what its name suggests: securing your website without having to wait for a long validation process. This SSL certificate also secures connections with most mobile browsers. The warranty of a QuickSSL Premium certificate is $ 100.000.', 'prices' => ['array' => ['item' => [0 => ['period' => '1', 'price' => ['product' => ['price' => '79.00', 'currency' => 'EUR'], 'reseller' => ['price' => '79.00', 'currency' => 'EUR']]], 1 => ['period' => '2', 'price' => ['product' => ['price' => '139.00', 'currency' => 'EUR'], 'reseller' => ['price' => '139.00', 'currency' => 'EUR']]], 2 => ['period' => '3', 'price' => ['product' => ['price' => '199.00', 'currency' => 'EUR'], 'reseller' => ['price' => '199.00', 'currency' => 'EUR']]]]]]]]], $ssl);
    }

    /** @test */
    public function it_can_do_a_retrieve_reissue_approver_email_list_ssl_cert_request()
    {
        $this->mockApiClientResponse(new \GuzzleHttp\Psr7\Response(200, [], '<?xml version="1.0" encoding="UTF-8"?><openXML><reply><code>0</code><desc /><data><array><item>admin@openprovider.com</item><item>domreg@openprovider.com</item></array></data></reply></openXML>'));

        $ssl = $this->openProvider->ssl()->retrieveReissueApproverEmailListSslCert([
            'id' => 12345,
        ]);

        $this->assertSame(['reply' => ['code' => '0', 'desc' => [], 'data' => ['array' => ['item' => [0 => 'admin@openprovider.com', 1 => 'domreg@openprovider.com']]]]], $ssl);
    }

    /** @test */
    public function it_can_do_a_search_order_ssl_cert_request()
    {
        $this->mockApiClientResponse(new \GuzzleHttp\Psr7\Response(200, [], file_get_contents(__DIR__ . '/__snapshots__/it_can_do_a_search_order_ssl_cert_request.xml')));

        $ssl = $this->openProvider->ssl()->searchOrderSslCert([
            'orderBy' => [
                'expirationDate' => 'asc'
            ]
        ]);

        $this->assertSame(json_decode(file_get_contents(__DIR__ . '/__snapshots__/it_can_do_a_search_order_ssl_cert_request.json'), true), $ssl);
    }

    /** @test */
    public function it_can_do_a_search_product_ssl_cert_request()
    {
        $this->mockApiClientResponse(new \GuzzleHttp\Psr7\Response(200, [], '<?xml version="1.0" encoding="UTF-8"?><openXML><reply><code>0</code><desc /><data><results><array><item><id>25</id><name>Instant SGC SSL</name><brandName>Comodo</brandName><category>organization_validation</category><isMobileSupported>0</isMobileSupported><isIdnSupported>0</isIdnSupported><isSgcSupported>1</isSgcSupported><isWildcardSupported>0</isWildcardSupported><isExtendedValidationSupported>0</isExtendedValidationSupported><deliveryTime>2d</deliveryTime><freeRefundPeriod>30d</freeRefundPeriod><freeReissuePeriod>lifetime</freeReissuePeriod><maxPeriod>5</maxPeriod><numberOfDomains>1</numberOfDomains><encryption>40/256 bits</encryption><root>Chained root</root><warranty><product><price>250000.00</price><currency>USD</currency></product><reseller><price>193019.77</price><currency>EUR</currency></reseller></warranty><prices><array><item><period>1</period><price><product><price>249.00</price><currency>EUR</currency></product><reseller><price>249.00</price><currency>EUR</currency></reseller></price></item><item><period>2</period><price><product><price>429.00</price><currency>EUR</currency></product><reseller><price>429.00</price><currency>EUR</currency></reseller></price></item><item><period>3</period><price><product><price>599.00</price><currency>EUR</currency></product><reseller><price>599.00</price><currency>EUR</currency></reseller></price></item><item><period>4</period><price><product><price>749.00</price><currency>EUR</currency></product><reseller><price>749.00</price><currency>EUR</currency></reseller></price></item><item><period>5</period><price><product><price>849.00</price><currency>EUR</currency></product><reseller><price>849.00</price><currency>EUR</currency></reseller></price></item></array></prices></item><item><id>18</id><name>SGC SuperCert</name><brandName>thawte</brandName><category>organization_validation</category><isMobileSupported>1</isMobileSupported><isIdnSupported>1</isIdnSupported><isSgcSupported>1</isSgcSupported><isWildcardSupported>0</isWildcardSupported><isExtendedValidationSupported>0</isExtendedValidationSupported><deliveryTime>48h</deliveryTime><freeRefundPeriod>30d</freeRefundPeriod><freeReissuePeriod>lifetime</freeReissuePeriod><maxPeriod>5</maxPeriod><numberOfDomains>1</numberOfDomains><encryption>40/256 bits</encryption><root>Primary certification aut</root><warranty><product><price>0.00</price><currency>USD</currency></product><reseller><price>0.00</price><currency>EUR</currency></reseller></warranty><prices><array><item><period>1</period><price><product><price>279.00</price><currency>EUR</currency></product><reseller><price>279.00</price><currency>EUR</currency></reseller></price></item><item><period>2</period><price><product><price>479.00</price><currency>EUR</currency></product><reseller><price>479.00</price><currency>EUR</currency></reseller></price></item><item><period>3</period><price><product><price>679.00</price><currency>EUR</currency></product><reseller><price>679.00</price><currency>EUR</currency></reseller></price></item><item><period>4</period><price><product><price>869.00</price><currency>EUR</currency></product><reseller><price>869.00</price><currency>EUR</currency></reseller></price></item><item><period>5</period><price><product><price>999.00</price><currency>EUR</currency></product><reseller><price>999.00</price><currency>EUR</currency></reseller></price></item></array></prices></item><item><id>1</id><name>Secure Site</name><brandName>VeriSign</brandName><category>organization_validation</category><isMobileSupported>1</isMobileSupported><isIdnSupported>1</isIdnSupported><isSgcSupported>0</isSgcSupported><isWildcardSupported>0</isWildcardSupported><isExtendedValidationSupported>0</isExtendedValidationSupported><deliveryTime>2d</deliveryTime><freeRefundPeriod>30d</freeRefundPeriod><freeReissuePeriod>lifetime</freeReissuePeriod><maxPeriod>5</maxPeriod><numberOfDomains>1</numberOfDomains><encryption>40/256 bits</encryption><root>Class 3 Public Primary CA</root><warranty><product><price>100000.00</price><currency>USD</currency></product><reseller><price>77207.91</price><currency>EUR</currency></reseller></warranty><prices><array><item><period>1</period><price><product><price>275.00</price><currency>EUR</currency></product><reseller><price>275.00</price><currency>EUR</currency></reseller></price></item><item><period>2</period><price><product><price>499.00</price><currency>EUR</currency></product><reseller><price>499.00</price><currency>EUR</currency></reseller></price></item><item><period>3</period><price><product><price>699.00</price><currency>EUR</currency></product><reseller><price>699.00</price><currency>EUR</currency></reseller></price></item><item><period>4</period><price><product><price>879.00</price><currency>EUR</currency></product><reseller><price>879.00</price><currency>EUR</currency></reseller></price></item><item><period>5</period><price><product><price>1049.00</price><currency>EUR</currency></product><reseller><price>1049.00</price><currency>EUR</currency></reseller></price></item></array></prices></item><item><id>2</id><name>Secure Site Pro</name><brandName>VeriSign</brandName><category>organization_validation</category><isMobileSupported>1</isMobileSupported><isIdnSupported>1</isIdnSupported><isSgcSupported>1</isSgcSupported><isWildcardSupported>0</isWildcardSupported><isExtendedValidationSupported>0</isExtendedValidationSupported><deliveryTime>2d</deliveryTime><freeRefundPeriod>30d</freeRefundPeriod><freeReissuePeriod>lifetime</freeReissuePeriod><maxPeriod>5</maxPeriod><numberOfDomains>1</numberOfDomains><encryption>128/256 bits</encryption><root>Class 3 Public Primary CA</root><warranty><product><price>100000.00</price><currency>USD</currency></product><reseller><price>77207.91</price><currency>EUR</currency></reseller></warranty><prices><array><item><period>1</period><price><product><price>599.00</price><currency>EUR</currency></product><reseller><price>599.00</price><currency>EUR</currency></reseller></price></item><item><period>2</period><price><product><price>1049.00</price><currency>EUR</currency></product><reseller><price>1049.00</price><currency>EUR</currency></reseller></price></item><item><period>3</period><price><product><price>1499.00</price><currency>EUR</currency></product><reseller><price>1499.00</price><currency>EUR</currency></reseller></price></item><item><period>4</period><price><product><price>1899.00</price><currency>EUR</currency></product><reseller><price>1899.00</price><currency>EUR</currency></reseller></price></item><item><period>5</period><price><product><price>2199.00</price><currency>EUR</currency></product><reseller><price>2199.00</price><currency>EUR</currency></reseller></price></item></array></prices></item></array></results><total>4</total></data></reply></openXML>'));

        $ssl = $this->openProvider->ssl()->searchProductSslCert([
            'orderBy' => 'brandName',
            'withPrice' => true
        ]);

        $this->assertSame(['reply' => ['code' => '0', 'desc' => [], 'data' => ['results' => ['array' => ['item' => [0 => ['id' => '25', 'name' => 'Instant SGC SSL', 'brandName' => 'Comodo', 'category' => 'organization_validation', 'isMobileSupported' => '0', 'isIdnSupported' => '0', 'isSgcSupported' => '1', 'isWildcardSupported' => '0', 'isExtendedValidationSupported' => '0', 'deliveryTime' => '2d', 'freeRefundPeriod' => '30d', 'freeReissuePeriod' => 'lifetime', 'maxPeriod' => '5', 'numberOfDomains' => '1', 'encryption' => '40/256 bits', 'root' => 'Chained root', 'warranty' => ['product' => ['price' => '250000.00', 'currency' => 'USD'], 'reseller' => ['price' => '193019.77', 'currency' => 'EUR']], 'prices' => ['array' => ['item' => [0 => ['period' => '1', 'price' => ['product' => ['price' => '249.00', 'currency' => 'EUR'], 'reseller' => ['price' => '249.00', 'currency' => 'EUR']]], 1 => ['period' => '2', 'price' => ['product' => ['price' => '429.00', 'currency' => 'EUR'], 'reseller' => ['price' => '429.00', 'currency' => 'EUR']]], 2 => ['period' => '3', 'price' => ['product' => ['price' => '599.00', 'currency' => 'EUR'], 'reseller' => ['price' => '599.00', 'currency' => 'EUR']]], 3 => ['period' => '4', 'price' => ['product' => ['price' => '749.00', 'currency' => 'EUR'], 'reseller' => ['price' => '749.00', 'currency' => 'EUR']]], 4 => ['period' => '5', 'price' => ['product' => ['price' => '849.00', 'currency' => 'EUR'], 'reseller' => ['price' => '849.00', 'currency' => 'EUR']]]]]]], 1 => ['id' => '18', 'name' => 'SGC SuperCert', 'brandName' => 'thawte', 'category' => 'organization_validation', 'isMobileSupported' => '1', 'isIdnSupported' => '1', 'isSgcSupported' => '1', 'isWildcardSupported' => '0', 'isExtendedValidationSupported' => '0', 'deliveryTime' => '48h', 'freeRefundPeriod' => '30d', 'freeReissuePeriod' => 'lifetime', 'maxPeriod' => '5', 'numberOfDomains' => '1', 'encryption' => '40/256 bits', 'root' => 'Primary certification aut', 'warranty' => ['product' => ['price' => '0.00', 'currency' => 'USD'], 'reseller' => ['price' => '0.00', 'currency' => 'EUR']], 'prices' => ['array' => ['item' => [0 => ['period' => '1', 'price' => ['product' => ['price' => '279.00', 'currency' => 'EUR'], 'reseller' => ['price' => '279.00', 'currency' => 'EUR']]], 1 => ['period' => '2', 'price' => ['product' => ['price' => '479.00', 'currency' => 'EUR'], 'reseller' => ['price' => '479.00', 'currency' => 'EUR']]], 2 => ['period' => '3', 'price' => ['product' => ['price' => '679.00', 'currency' => 'EUR'], 'reseller' => ['price' => '679.00', 'currency' => 'EUR']]], 3 => ['period' => '4', 'price' => ['product' => ['price' => '869.00', 'currency' => 'EUR'], 'reseller' => ['price' => '869.00', 'currency' => 'EUR']]], 4 => ['period' => '5', 'price' => ['product' => ['price' => '999.00', 'currency' => 'EUR'], 'reseller' => ['price' => '999.00', 'currency' => 'EUR']]]]]]], 2 => ['id' => '1', 'name' => 'Secure Site', 'brandName' => 'VeriSign', 'category' => 'organization_validation', 'isMobileSupported' => '1', 'isIdnSupported' => '1', 'isSgcSupported' => '0', 'isWildcardSupported' => '0', 'isExtendedValidationSupported' => '0', 'deliveryTime' => '2d', 'freeRefundPeriod' => '30d', 'freeReissuePeriod' => 'lifetime', 'maxPeriod' => '5', 'numberOfDomains' => '1', 'encryption' => '40/256 bits', 'root' => 'Class 3 Public Primary CA', 'warranty' => ['product' => ['price' => '100000.00', 'currency' => 'USD'], 'reseller' => ['price' => '77207.91', 'currency' => 'EUR']], 'prices' => ['array' => ['item' => [0 => ['period' => '1', 'price' => ['product' => ['price' => '275.00', 'currency' => 'EUR'], 'reseller' => ['price' => '275.00', 'currency' => 'EUR']]], 1 => ['period' => '2', 'price' => ['product' => ['price' => '499.00', 'currency' => 'EUR'], 'reseller' => ['price' => '499.00', 'currency' => 'EUR']]], 2 => ['period' => '3', 'price' => ['product' => ['price' => '699.00', 'currency' => 'EUR'], 'reseller' => ['price' => '699.00', 'currency' => 'EUR']]], 3 => ['period' => '4', 'price' => ['product' => ['price' => '879.00', 'currency' => 'EUR'], 'reseller' => ['price' => '879.00', 'currency' => 'EUR']]], 4 => ['period' => '5', 'price' => ['product' => ['price' => '1049.00', 'currency' => 'EUR'], 'reseller' => ['price' => '1049.00', 'currency' => 'EUR']]]]]]], 3 => ['id' => '2', 'name' => 'Secure Site Pro', 'brandName' => 'VeriSign', 'category' => 'organization_validation', 'isMobileSupported' => '1', 'isIdnSupported' => '1', 'isSgcSupported' => '1', 'isWildcardSupported' => '0', 'isExtendedValidationSupported' => '0', 'deliveryTime' => '2d', 'freeRefundPeriod' => '30d', 'freeReissuePeriod' => 'lifetime', 'maxPeriod' => '5', 'numberOfDomains' => '1', 'encryption' => '128/256 bits', 'root' => 'Class 3 Public Primary CA', 'warranty' => ['product' => ['price' => '100000.00', 'currency' => 'USD'], 'reseller' => ['price' => '77207.91', 'currency' => 'EUR']], 'prices' => ['array' => ['item' => [0 => ['period' => '1', 'price' => ['product' => ['price' => '599.00', 'currency' => 'EUR'], 'reseller' => ['price' => '599.00', 'currency' => 'EUR']]], 1 => ['period' => '2', 'price' => ['product' => ['price' => '1049.00', 'currency' => 'EUR'], 'reseller' => ['price' => '1049.00', 'currency' => 'EUR']]], 2 => ['period' => '3', 'price' => ['product' => ['price' => '1499.00', 'currency' => 'EUR'], 'reseller' => ['price' => '1499.00', 'currency' => 'EUR']]], 3 => ['period' => '4', 'price' => ['product' => ['price' => '1899.00', 'currency' => 'EUR'], 'reseller' => ['price' => '1899.00', 'currency' => 'EUR']]], 4 => ['period' => '5', 'price' => ['product' => ['price' => '2199.00', 'currency' => 'EUR'], 'reseller' => ['price' => '2199.00', 'currency' => 'EUR']]]]]]]]]], 'total' => '4']]], $ssl);
    }
}
