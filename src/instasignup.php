<?php

if (!function_exists('is_user')) {
    /**
     * Gets the logged-in user
     */
    function is_user() {
        if (!empty($GLOBALS['IS-USER'])) {
            return $GLOBALS['IS-USER'];
        } elseif (!empty($cookie = $_COOKIE['JWT-IS'])) {
            return $GLOBALS['IS-USER'] = _is_request('auth', ['jwt' => $cookie]);
        }

        return NULL;
    }
}

if (!function_exists('is_user_id')) {
    /**
     * Gets the user_id of logged-in user
     */
    function is_user_id() {
        $user = is_user();
        return !empty($user['id']) ? $user['id'] : 0;
    }
}

if (!function_exists('is_user_projects')) {
    /**
     * Returns all projects of logged-in user
     */
    function is_user_projects() {
        return _is_request('projects', ['user_id' => is_user_id()]);
    }
}

if (!function_exists('is_user_subscriptions')) {
    /**
     * Returns all subscriptions of logged-in user
     */
    function is_user_subscriptions($plan) {
        return $plan ? is_subscription_read(is_user_id(), $plan) : _is_request('subscriptions', ['user_id' => is_user_id()]);
    }
}

if (!function_exists('is_user_project')) {
    /**
     * Returns details of a user project by id or name
     */
    function is_user_project($value, $key = 'name') {
        return _is_request('project', ['user_id' => is_user_id(), $key => $value]);
    }
}

if (!function_exists('is_users')) {
    /**
     * Returns list of all users in your site
     */
    function is_users($filters = []) {
        return _is_request('users', $filters);
    }
}

if (!function_exists('is_user_create')) {
    /**
     * Creates a new user
     */
    function is_user_create($data) {
        if (empty($data['email'])) throw new Exception("'email' is required in data");
        return _is_request('user/create', $data);
    }
}

if (!function_exists('is_user_read')) {
    /**
     * reads a user
     * Key values: id, email, username, or phone
     */
    function is_user_read($value, $key = 'id') {
        return _is_request('user/read', [$key => $value]);
    }
}

if (!function_exists('is_user_update')) {
    /**
     * updates a user
     * Key values: id, email, username, or phone
     */
    function is_user_update($value, $key = 'id') {
        return _is_request('user/update', [$key => $value]);
    }
}

if (!function_exists('is_user_delete')) {
    /**
     * deletes a user
     * Key values: id, email, username, or phone
     */
    function is_user_delete($value, $key = 'id') {
        return _is_request('user/delete', [$key => $value]);
    }
}

if (!function_exists('is_projects')) {
    /**
     * Returns list of all projects in your site
     */
    function is_projects($filters = []) {
        return _is_request('projects', $filters);
    }
}

if (!function_exists('is_project_create')) {
    /**
     * Creates a new project
     */
    function is_project_create($name, $data, $user_id = 0) {
        return _is_request('project/create', ['user_id' => $user_id ?: is_user_id(), 'name' => $name, 'data' => $data]);
    }
}

if (!function_exists('is_project_read')) {
    /**
     * reads a project
     */
    function is_project_read($value, $key = 'id') {
        return _is_request('project/read', [$key => $value]);
    }
}

if (!function_exists('is_project_update')) {
    /**
     * updates a project
     */
    function is_project_update($value, $key = 'id') {
        return _is_request('project/update', [$key => $value]);
    }
}

if (!function_exists('is_project_delete')) {
    /**
     * deletes a project
     */
    function is_project_delete($value, $key = 'id') {
        return _is_request('project/delete', [$key => $value]);
    }
}

if (!function_exists('is_subscriptions')) {
    /**
     * Returns list of all subscriptions in your site
     */
    function is_subscriptions($filters = []) {
        return _is_request('subscriptions', $filters);
    }
}

if (!function_exists('is_subscription_create')) {
    /**
     * Creates a new subscription
     */
    function is_subscription_create($user_id, $plan) {
        return _is_request('subscription/create', ['user_id' => $user_id, 'plan' => $plan]);
    }
}

if (!function_exists('is_subscription_read')) {
    /**
     * reads a subscription
     */
    function is_subscription_read($user_id, $plan) {
        return _is_request('subscription/read', ['user_id' => $user_id, 'plan' => $plan]);
    }
}

if (!function_exists('is_subscription_delete')) {
    /**
     * deletes a subscription
     */
    function is_subscription_delete($user_id, $plan) {
        return _is_request('subscription/delete', ['user_id' => $user_id, 'plan' => $plan]);
    }
}

if (!function_exists('_is_request')) {
    /**
     * @internal
     *
     * create http request to IS server
     */
    function _is_request($url, $payload, $method = 'POST') {
        $client = new \GuzzleHttp\Client(['verify' => FALSE]);
        $apiKey = getenv('IS_API_KEY');
        $secret = getenv('IS_API_SECRET');

        if (empty($apiKey) || empty($secret)) return trigger_error("Please set IS_API_KEY and IS_SECRET in your .env file", E_ERROR);

        $url = sprintf('https://www.instasignup.host/api/connect/v1/%s', $url);
        $hash = base64_encode(hash_hmac('sha1', sprintf('%s\n%s\n%s', $method, parse_url($url, PHP_URL_PATH), json_encode($payload)), $secret, TRUE));

        try {
            $response = $client->post($url . '?' . http_build_query(['apiKey' => $apiKey, 'sig' => $hash, 'XDEBUG_SESSION_START' => 'PHPSTORM']), ['json' => $payload]);
            if ($response->getStatusCode() === 200) {
                return @json_decode($response->getBody()) ?: [];
            }
        } catch (\GuzzleHttp\Exception\ClientException $exception) {
            $error = (string) $exception->getResponse()->getBody();
        }

        return abort('API Error: ' . $error ?? 'unknown');
    }
}