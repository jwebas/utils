# Jwebas Utils #

A collection of useful PHP functions

## Requirements

Utils requires PHP 7.1.3+.

## Installation

The recommended way to install is via Composer:

```
composer require jwebas/utils
```

## Usage

### Array helper

```php
use Jwebas\Utils\Arr;

// Determine whether the given value is array accessible.
Arr::accessible($value): bool

// Add an element to an array using "dot" notation if it doesn't exist.
Arr::add(array $array, string $key, $value): array

// Determine if the given key exists in the provided array.
Arr::exists($array, $key): bool

// Returns the first element in an array.
Arr::first(array $array)

// Returns the first key in an array.
Arr::firstKey(array $array)

// Remove one or many array items from a given array using "dot" notation.
Arr::forget(array &$array, $keys): void

// Get an item from an array using "dot" notation.
Arr::get(array $array, string $key, $default = null)

// Check if an item or items exist in an array using "dot" notation.
Arr::has($array, $keys): bool

// Returns the last element in an array.
Arr::last(array $array)

// Returns the last key in an array.
Arr::lastKey(array $array)

// Push an item onto the beginning of an array.
Arr::prepend(array $array, $value, $key = null): array

// Get a value from the array, and remove it.
Arr::pull(array &$array, string $key, $default = null)

// Set an array item to a given value using "dot" notation.
//If no key is given to the method, the entire array will be replaced.
Arr::set(array &$array, string $key, $value): array

// Convert the array into a query string.
Arr::query(array $array): string

// Filter the array using the given callback.
Arr::where(array $array, callable $callback): array

// If the given value is not an array and not null, wrap it in one.
Arr::wrap($value): array
```


### File system

```php
use Jwebas\Utils\FS;

// Get basename.
FS::basename(string $path): string

// Function to strip additional / or \ in a path name.
FS::clean(string $path, $dirSep = DIRECTORY_SEPARATOR): string

// Get dirname.
FS::dirName(string $path): string

// Checks whether a file or directory exists.
FS::exists(string $path): bool

// Get file extension.
FS::extension(string $path): string

// Get filename.
FS::filename(string $path): string

// Check is current path is directory.
FS::isDir(string $path): bool

// Check is current path is regular file
FS::isFile(string $path): bool

// Get realpath.
FS::realpath(string $path): string

// Removes a directory (and its contents) recursively.
FS::rmDir(string $dir, bool $traverseSymlinks = false): bool

// Strip off the extension if it exists.
FS::stripExtension(string $path): string
```


### String helper

```php
use Jwebas\Utils\Str;

// Transliterate a UTF-8 value to ASCII.
Str::ascii(string $value, string $language = 'en'): string

// Convert a value to camel case.
Str::camel(string $value): string

// Determine if a given string contains a given substring.
Str::contains(string $haystack, $needles): bool

// Determine if a given string ends with a given substring.
Str::endsWith(string $haystack, $needles): bool

// Convert a string to kebab case.
Str::kebab(string $value): string

// Return the length of the given string.
Str::length(string $value, $encoding = null): int

// Limit the number of characters in a string.
Str::limit(string $value, int $limit = 100, string $end = '...'): string

// Convert the given string to lower-case.
Str::lower(string $value): string

// Generate a more truly "random" alpha-numeric string.
Str::random(int $length = 16): string

// Generate a URL friendly "slug" from a given string.
Str::slug(string $title, string $separator = '-', $language = 'en'): string

// Convert a string to snake case.
Str::snake(string $value, string $delimiter = '_'): string

// Determine if a given string starts with a given substring.
Str::startsWith(string $haystack, $needles): bool

// Convert a value to studly caps case.
Str::studly(string $value): string

// Returns the portion of string specified by the start and length parameters.
Str::substr(string $string, int $start, $length = null): string

// Convert the given string to title case.
Str::title(string $value): string

// Make a string's first character uppercase.
Str::ucfirst(string $string): string

// Convert the given string to upper-case.
Str::upper(string $value): string

// Limit the number of words in a string.
Str::words(string $value, int $words = 100, string $end = '...'): string
```

### Url helper

```php
use Jwebas\Utils\Url;

// Check is ssl (https) is enabled.
Url::httpsEnabled(): bool

// Check if string is external url.
Url::isExternal(string $url, bool $strict = true): bool
```

### Links
* Illuminate Support (Laravel) - https://github.com/illuminate/support
* JBZoo Utils - https://github.com/JBZoo/Utils

### TODO
* Add tests

## License

The MIT License (MIT).
