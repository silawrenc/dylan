dylan
=====

### basic usage
Call `sanitise($value, $callables)` to sanitise a value where `$callables` is a callable or array of callables.

````php
//returns integer 5
sanitise('5', tointeger()));
````
chaining filters

````php
// returns integer 7
sanitise('foo', [tointeger(), add(7)]);
````

### sanitising schemas
Use the `dylan` and `key` functions to build a sanitisation schema.

##### key
The `key` function takes three arguments:
````php
function key($key, $callable = null, $inputs = null) {
````
The first, `$key` is the resultant key for the output key/value pair in the schema. `$callable` is a callable or array of callables that act on the raw data. Omitting this argument allows you to define that a key must be present, but not constrain its value. The final argument, `$inputs` defines the key(s) from the raw input that are passed into the callable stack. Omitting this argument results in it defaulting to the `$key` provided. Using different value(s) allows you to 'map' raw incoming schemas to a given, consistent schema. Any inputs not set in the raw data will default to `null` rather than throwing.

##### dylan
The `dylan` function takes a single argument which is an array of callables that are to act on the schema to be validated - typically an array of `key` functions. Each of those callables must return an array of key-value pairs it expects to be included in the output schema - all other keys will be stripped.

##### usage
defining a schema, no sanitisation
````php
$schema = dylan([key('foo'), key('bar')]);

// will return ['foo'=> null, 'bar' => null]
sanitise(['nothing' => 'here], $schema);
````

defining a schema with some sanitisation
````php
$schema = dylan([
  key('foo', floor()),
  key('bar', lowercase())
]);

$input = [
  'foo' => 3.7,
  'bar' => 'HELLO',
  'bonus' => 'data',
];

// will return ['foo'=> 3, 'bar' => 'hello']
sanitise($input, $schema);
````
defining a schema with sanitisation and mapping
````php
$schema = dylan([
  key('foo', modulo(12)),
  key('bar', toboolean(), 'notbar')
]);

$input = [
  'foo' => 15,
  'notbar' => 'data',
];

// will return ['foo'=> 3, 'bar' => true]
sanitise($input, $schema);
````

map fields to a date
````php
$schema = dylan([
  key('date', 'acme_date_making_function', ['year', 'month', 'day']),
]);

$input = [
  'year' => 1998,
  'month' => 5,
  'day' => 13
];

// will return ['date'=> '1998-05-13'] (or whatever)
sanitise($input, $schema);
````

