## Laravel OpenProvider
[![Latest Stable Version](https://poser.pugx.org/nickurt/laravel-openprovider/v/stable?format=flat-square)](https://packagist.org/packages/nickurt/laravel-openprovider)
[![MIT Licensed](https://img.shields.io/badge/license-MIT-brightgreen.svg?style=flat-square)](LICENSE.md)
[![Build Status](https://img.shields.io/travis/nickurt/laravel-openprovider/master.svg?style=flat-square)](https://travis-ci.org/nickurt/laravel-openprovider)
[![Total Downloads](https://img.shields.io/packagist/dt/nickurt/laravel-openprovider.svg?style=flat-square)](https://packagist.org/packages/nickurt/laravel-openprovider)
### Table of contents
- [Installation](#installation)
- [Usage](#usage)
- [Tests](#tests)
### Installation
Install this package with composer:
```
composer require nickurt/laravel-openprovider
```
Add the provider to `config/app.php` file
```php
'nickurt\OpenProvider\ServiceProvider',
```
and the facade in the file
```php
'OpenProvider' => 'nickurt\OpenProvider\Facade',
```
Copy the config files for the OpenProvider-plugin
```
php artisan vendor:publish --provider="nickurt\OpenProvider\ServiceProvider" --tag="config"
```
Add the OpenProvider credentials to your .env file
```
OPENPROVIDER_DEFAULT_USERNAME=
OPENPROVIDER_DEFAULT_PASSWORD=
```
### Usage
#### Dependency injection [e.g. by using multiple connections]
```php
// Route
Route::get('/openprovider/{openProvider}/customers', ['as' => 'openprovider/customers', 'uses' => 'CustomersController@getIndex']);

Route::bind('openProvider', function ($value, $route) {
    app('OpenProvider')->connection($value);

    return app('OpenProvider');
});

// CustomersController
public function getIndex(OpenProvider $openProvider)
{
    $customers = $openProvider->customers()->searchCustomer([
        'limit' => 20,
    ]);

    //
}
```
#### Customers
```php
OpenProvider::customers()->createCustomer(array $params)
OpenProvider::customers()->deleteCustomer(array $params)
OpenProvider::customers()->modifyCustomer(array $params)
OpenProvider::customers()->retrieveCustomer(array $params)
OpenProvider::customers()->searchCustomer(array $params)
```
#### Domains
```php
OpenProvider::domains()->approveTransferDomain(array $params)
OpenProvider::domains()->checkDomain(array $params)
OpenProvider::domains()->createDomain(array $params)
OpenProvider::domains()->deleteDomain(array $params)
OpenProvider::domains()->modifyDomain(array $params)
OpenProvider::domains()->renewDomain(array $params)
OpenProvider::domains()->requestAuthCodeDomain(array $params)
OpenProvider::domains()->resetAuthCodeDomain(array $params)
OpenProvider::domains()->restoreDomain(array $params)
OpenProvider::domains()->retrieveAdditionalDataDomain(array $params)
OpenProvider::domains()->retrieveCustomerAdditionalDataDomain(array $params)
OpenProvider::domains()->retrieveDomain(array $params)
OpenProvider::domains()->retrievePriceDomain(array $params)
OpenProvider::domains()->searchDomain(array $params)
OpenProvider::domains()->sendFoa1Domain(array $params)
OpenProvider::domains()->tradeDomain(array $params)
OpenProvider::domains()->transferDomain(array $params)
OpenProvider::domains()->tryAgainDomain(array $params)
```
#### Emails
```php
OpenProvider::emails()->restartCustomerEmailVerification(array $params)
OpenProvider::emails()->searchEmailVerificationDomain(array $params)
OpenProvider::emails()->startCustomerEmailVerification(array $params)
```
#### Emails Templates
```php
OpenProvider::emailstemplates()->createEmailTemplate(array $params)
OpenProvider::emailstemplates()->deleteEmailTemplate(array $params)
OpenProvider::emailstemplates()->modifyEmailTemplate(array $params)
OpenProvider::emailstemplates()->searchEmailTemplate(array $params)
```
#### Extensions
```php
OpenProvider::extensions()->searchExtension(array $params)
OpenProvider::extensions()->retrieveExtension(array $params)
```
#### Financials
```php
OpenProvider::financials()->searchInvoiceReseller(array $params)
OpenProvider::financials()->searchPaymentReseller(array $params)
OpenProvider::financials()->searchTransactionReseller(array $params)
```
#### Licenses
```php
OpenProvider::licenses()->createPleskLicense(array $params)
OpenProvider::licenses()->createVirtuozzoLicense(array $params)
OpenProvider::licenses()->deletePleskLicense(array $params)
OpenProvider::licenses()->deleteVirtuozzoLicense(array $params)
OpenProvider::licenses()->modifyPleskLicense(array $params)
OpenProvider::licenses()->modifyVirtuozzoLicense(array $params)
OpenProvider::licenses()->resetLicenseHWID(array $params)
OpenProvider::licenses()->retrieveKeyPleskLicense(array $params)
OpenProvider::licenses()->retrieveKeyVirtuozzoLicense(array $params)
OpenProvider::licenses()->retrievePleskLicense(array $params)
OpenProvider::licenses()->retrieveVirtuozzoLicense(array $params)
OpenProvider::licenses()->searchPleskAndVirtuozzoItem(array $params)
OpenProvider::licenses()->searchPleskAndVirtuozzoLicense(array $params)
OpenProvider::licenses()->searchPleskLicense(array $params)
OpenProvider::licenses()->searchVirtuozzoLicense(array $params)
```
#### NameServers
```php
OpenProvider::nameservers()->createNs(array $params)
OpenProvider::nameservers()->createTemplateDns(array $params)
OpenProvider::nameservers()->createZoneDns(array $params)
OpenProvider::nameservers()->deleteNs(array $params)
OpenProvider::nameservers()->deleteTemplateDns(array $params)
OpenProvider::nameservers()->deleteZoneDns(array $params)
OpenProvider::nameservers()->modifyNs(array $params)
OpenProvider::nameservers()->modifyZoneDns(array $params)
OpenProvider::nameservers()->retrieveNs(array $params)
OpenProvider::nameservers()->retrieveTemplateDns(array $params)
OpenProvider::nameservers()->retrieveZoneDns(array $params)
OpenProvider::nameservers()->searchNs(array $params)
OpenProvider::nameservers()->searchTemplateDns(array $params)
OpenProvider::nameservers()->searchZoneDns(array $params)
OpenProvider::nameservers()->searchZoneRecordDns(array $params)
```
#### NameServers Groups
```php
OpenProvider::nameserversgroups()->createNsGroup(array $params)
OpenProvider::nameserversgroups()->deleteNsGroup(array $params)
OpenProvider::nameserversgroups()->modifyNsGroup(array $params)
OpenProvider::nameserversgroups()->retrieveNsGroup(array $params)
OpenProvider::nameserversgroups()->searchNsGroup(array $params)
```
#### Resellers
```php
OpenProvider::resellers()->createContactReseller(array $params)
OpenProvider::resellers()->deleteContactReseller(array $params)
OpenProvider::resellers()->modifyContactReseller(array $params)
OpenProvider::resellers()->modifyReseller(array $params)
OpenProvider::resellers()->retrieveContactReseller(array $params)
OpenProvider::resellers()->retrieveReseller()
OpenProvider::resellers()->retrieveSettingsReseller()
OpenProvider::resellers()->retrieveStatisticsReseller()
OpenProvider::resellers()->searchContactReseller(array $params)
```
#### Spam Experts 
```php
OpenProvider::spamexperts()->createDomainSe(array $params)
OpenProvider::spamexperts()->deleteDomainSe(array $params)
OpenProvider::spamexperts()->generateSeLoginUrl(array $params)
OpenProvider::spamexperts()->modifyDomainSe(array $params)
OpenProvider::spamexperts()->retrieveDomainSe(array $params)
```
#### SSL
```php
OpenProvider::ssl()->cancelSslCert(array $params)
OpenProvider::ssl()->changeApproverEmailAddressSslCert(array $params)
OpenProvider::ssl()->createSslCert(array $params)
OpenProvider::ssl()->decodeCsrSslCert(array $params)
OpenProvider::ssl()->generateCsrSslCert(array $params)
OpenProvider::ssl()->generateOtpTokenSslCert(array $params)
OpenProvider::ssl()->modifySslCert(array $params)
OpenProvider::ssl()->reissueSslCert(array $params)
OpenProvider::ssl()->renewSslCert(array $params)
OpenProvider::ssl()->resendApproverEmailSslCert(array $params)
OpenProvider::ssl()->retrieveApproverEmailListSslCert(array $params)
OpenProvider::ssl()->retrieveOrderSslCert(array $params)
OpenProvider::ssl()->retrieveProductSslCert(array $params)
OpenProvider::ssl()->retrieveReissueApproverEmailListSslCert(array $params)
OpenProvider::ssl()->searchOrderSslCert(array $params)
OpenProvider::ssl()->searchProductSslCert(array $params)
```
#### Tags 
```php
OpenProvider::tags()->createTag(array $params)
OpenProvider::tags()->deleteTag(array $params)
OpenProvider::tags()->searchTagRequest(array $params)
```
### Tests
```sh
composer test
```
- - - 