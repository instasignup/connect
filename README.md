## Installation

Just run `composer install [package_name]`

After that all these functions should be available in every PHP file (via composer's autoloader)

- [handle_cors_request](#handle_cors_request)

- [get_domain](#get_domain)

- [get_http_method](#get_http_method)

- [check_http_method](#check_http_method)

- [handle_upload](#handle_upload)

- [handle_json_request](#handle_json_request)

- [config](#config)

- [url](#url)

- [auth_url](#auth_url)

- [is_ajax_request](#is_ajax_request)

- [login_redir](#login_redir)

- [abort](#abort)

- [redirect](#redirect)

- [request](#request)

- [request_keys](#request_keys)

- [add_route](#add_route)

- [router](#router)

- [jwt_cookie_name](#jwt_cookie_name)

- [user](#user)

- [user_id](#user_id)

- [check_login](#check_login)

- [site_set_cookie](#site_set_cookie)

- [user_login](#user_login)

- [user_logout](#user_logout)

- [user_activity_find](#user_activity_find)

- [user_activity_insert](#user_activity_insert)

- [user_info_public](#user_info_public)

- [guest_id](#guest_id)

- [check_captcha](#check_captcha)

- [bootstrap](#bootstrap)

### handle_cors_request

Handles a CORS request

```php
function handle_cors_request($extra = [])
```


### get_domain

Returns domain of the app

```php
function get_domain()
```


### get_http_method

Returns the HTTP method

```php
function get_http_method($allowed = ['get', 'post', 'options'])
```


### check_http_method

Returns the HTTP method

```php
function check_http_method(...$allowed)
```


### handle_upload

Handles a file upload

```php
function handle_upload($names = NULL, $destDir = NULL, $allowedExt = NULL)
```


### handle_json_request

Process PHP json request

```php
function handle_json_request()
```


### config

Gets value from config file

```php
function config($name, $default)
```


### url

Creates a URL for current app

```php
function url($url, $params = [])
```


### auth_url

Creates a pre-authenticated url

```php
function auth_url($url, $user_id, $activity = 'link_click', $data = [])
```


### is_ajax_request

Check if it is a ajax request

```php
function is_ajax_request()
```


### login_redir

Redirect to login page with error

```php
function login_redir($message = '')
```


### abort

Aborts a request with 403 error code

```php
function abort($message = '', $code = 403)
```


### redirect

Redirect to another url

```php
function redirect($location, $code = 302, $message = NULL)
```


### request

Returns a request param

 @return string|array

```php
function request($name = NULL, $default = NULL)
```


### request_keys

Extracts all the keys from request (returns false if any key is missing)

```php
function request_keys(...$keys)
```


### add_route

Adds a route for router

```php
function add_route(string $path, $action, $method = '', $auth = FALSE)
```


### router

Simplest PHP router

```php
function router()
```


### jwt_cookie_name

Returns the name of the JWT COOKIE

```php
function jwt_cookie_name()
```


### user

Get logged in user

```php
function user($key = '', $default = NULL, $jwt_key = NULL)
```


### user_id

Logged in user's id

```php
function user_id()
```


### check_login

Checks if the user is logged-in (returns user_id) otherwise aborts

```php
function check_login()
```


### site_set_cookie

Sets a global cookie

```php
function site_set_cookie($name, $value, $expires = 0)
```


### user_login

Log in a user by starting session

```php
function user_login($user, $expires = 86400, $key = '')
```


### user_logout

Logs out existing user

```php
function user_logout()
```


### user_activity_find

Find a activity by name (or creates it)

```php
function user_activity_find($activity_name)
```


### user_activity_insert

Insert a user activity into user activity table

```php
function user_activity_insert($activity_name, $user_id = NULL)
```


### user_info_public

All publicly accessible user info

```php
function user_info_public($user = NULL)
```


### guest_id

Checks if the user is authenticated in guest mode and if so returns the user_id (false otherwise)

```php
function guest_id($jwt_key = NULL)
```


### check_captcha

Checks if there is a need to verify captcha

```php
function check_captcha()
```


### bootstrap

Handles setting up environment for handling http requests

```php
function bootstrap($env)
```


