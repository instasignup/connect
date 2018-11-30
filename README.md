## Installation

Just run `composer install [package_name]`

After that all these functions should be available in every PHP file (via composer's autoloader)

- [is_user](#is_user)

- [is_user_id](#is_user_id)

- [is_user_projects](#is_user_projects)

- [is_user_subscriptions](#is_user_subscriptions)

- [is_user_project](#is_user_project)

- [is_users](#is_users)

- [is_user_create](#is_user_create)

- [is_user_read](#is_user_read)

- [is_user_update](#is_user_update)

- [is_user_delete](#is_user_delete)

- [is_projects](#is_projects)

- [is_project_create](#is_project_create)

- [is_project_read](#is_project_read)

- [is_project_update](#is_project_update)

- [is_project_delete](#is_project_delete)

- [is_subscriptions](#is_subscriptions)

- [is_subscription_create](#is_subscription_create)

- [is_subscription_read](#is_subscription_read)

- [is_subscription_delete](#is_subscription_delete)

- [_is_request](#_is_request)

### is_user

Gets the logged-in user

```php
function is_user()
```


### is_user_id

Gets the user_id of logged-in user

```php
function is_user_id()
```


### is_user_projects

Returns all projects of logged-in user

```php
function is_user_projects()
```


### is_user_subscriptions

Returns all subscriptions of logged-in user

```php
function is_user_subscriptions($plan)
```


### is_user_project

Returns details of a user project by id or name

```php
function is_user_project($value, $key = 'name')
```


### is_users

Returns list of all users in your site

```php
function is_users($filters = [])
```


### is_user_create

Creates a new user

```php
function is_user_create($data)
```


### is_user_read

Reads a user
 Key values: id, email, username, or phone

```php
function is_user_read($value, $key = 'id')
```


### is_user_update

Updates a user
 Key values: id, email, username, or phone

```php
function is_user_update($value, $key = 'id')
```


### is_user_delete

Deletes a user
 Key values: id, email, username, or phone

```php
function is_user_delete($value, $key = 'id')
```


### is_projects

Returns list of all projects in your site

```php
function is_projects($filters = [])
```


### is_project_create

Creates a new project

```php
function is_project_create($name, $data, $user_id = 0)
```


### is_project_read

Reads a project

```php
function is_project_read($value, $key = 'id')
```


### is_project_update

Updates a project

```php
function is_project_update($value, $key = 'id')
```


### is_project_delete

Deletes a project

```php
function is_project_delete($value, $key = 'id')
```


### is_subscriptions

Returns list of all subscriptions in your site

```php
function is_subscriptions($filters = [])
```


### is_subscription_create

Creates a new subscription

```php
function is_subscription_create($user_id, $plan)
```


### is_subscription_read

Reads a subscription

```php
function is_subscription_read($user_id, $plan)
```


### is_subscription_delete

Deletes a subscription

```php
function is_subscription_delete($user_id, $plan)
```


### _is_request

@internal

 create http request to IS server

```php
function _is_request($url, $payload, $method = 'POST')
```


