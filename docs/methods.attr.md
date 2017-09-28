@since 0.7.1

These commands target html attributes.
This allows data-something=""" or "disable" to be manipulated, for example.

```php
/**
	 * Add an Attribute to an Html-Tag
	 *
	 * @since 0.7.1
	 *
	 * @param string $sTarget
	 * @param string $sAttribute
	 * @param string $sData
	 *
	 * @return \xajaxResponse
	 */
	public function attrAdd($sTarget = '', $sAttribute = '', $sData = ''): \xajaxResponse{}

// call
    $objResponse->attrAdd('elementID','data-container','was-not-set');
```

```php
/**
	 * Remove an Attribute from an Html-Tag
	 *
	 * @since 0.7.1
	 *
	 * @param string $sTarget
	 * @param string $sAttribute
	 *
	 * @return \xajaxResponse
	 */
	public function attrRemove($sTarget = '', $sAttribute = ''): \xajaxResponse {}

// call
    $objResponse->attrRemove('elementID','attributeName');
```

```php
    /**
	 * Replace an Attribute with an other attribute
	 *
	 * @example $objResponse->attrReplace('elementID','oldAttributeName','anValue','newAttributeName');
	 * @since   0.7.1
	 *
	 * @param string $sTarget
	 * @param string $sAttribute
	 * @param string $newAttribute
	 * @param string $sData
	 *
	 * @return \xajaxResponse
	 */
	public function attrReplace($sTarget = '', $sAttribute = '', $newAttribute = '', $sData = ''): \xajaxResponse {}

// call
    $objResponse->attrReplace('elementID','oldAttributeName','anValue','newAttributeName');
```