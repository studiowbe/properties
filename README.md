# properties
A convenient way to store and retrieve properties and values

## Usage
### Basic example
```php
$props = new PropertiesHolder(["foo"=>"bar"]);
$props->get("foo", "default"); //returns "bar";
$props->get("unset_prop", "default"); //returns "default";
```

### Adding or updating properties
```php
//set a single property
$props->set("foo", "bar");

//set multiple properties
$props->set(["foo"=>"bar", "foo_2"=>"bar_2"]);
```
### Removing properties
```php
//remove a single property
$props->remove("foo");

//remove multiple properties
$props->remove(["foo", "foo_2"]);
```