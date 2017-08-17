<?php

namespace App\Repositories;

use App\Repositories\GetEncrypter;
use App\User;
use Hash;
use Session;

// define('API_URL', 'http://api.pricing');
// define('API_URL', 'http://pricing_api.local/index.php');
define('API_URL', 'http://api.pricing.netcengroup.com');

class ApiRequestRepository
{

    private $username = null;
    private $passwordHash = null;

    public function getPasswordHash($username)
    {

        if (isset($this->username) && $this->username === $username) {
            return $this->passwordHash;
        }

        return null;
    }

    private function prepareAuthDetails($uriPath = "", $username = null, $password = null, $company_name = null)
    {
        $authHeaders = array();
        if (!empty($username) && !empty($password)) {

            $request = sprintf('Basic %s', base64_encode("{$username}:{$password}:{$company_name}"));

            $authHeaders['headers'] = array('Authorization' => $request);
        }

        return $authHeaders;
    }

    public function IssueGETRequest($url, $username = null, $password = null, $company_name = null)
    {
        // Hash password
        $this->username = $username;
        $this->passwordHash = bin2hex(GetEncrypter::GetHMACService($username)->hash("{$username}:{$password}"));

        $client = new \GuzzleHttp\Client($this->prepareAuthDetails($url, $username, $this->passwordHash, $company_name));

        $response = $client->request('GET', $url);

        if ($response->getStatusCode() === 200) {
            return (string) $response->getBody();
        } else {
            return null;
        }
    }

    public function IssuePOSTRequest($url, $content, $username = null, $password = null, $company_name = null)
    {

        // Hash password
        $password = bin2hex(GetEncrypter::GetHMACService($username)->hash("{$username}:{$password}"));

        if (empty($content)) {
            $error = array(
                'error' => 'Invalid Request: No data specified.',
            );
            return json_encode($error);
        }

        $client = new \GuzzleHttp\Client($this->prepareAuthDetails($url, $username, $password, $company_name));

        $body['username'] = $username;
        $body['password'] = $password;
        $body['company_name'] = $company_name;

        $response = $client->request('POST', $url, ['body' => json_encode($body)]);

        if ($client->isSuccess()) {
            return (string) $response->getBody();
        } else {
            return null;
        }
    }

    protected function IssuePUTRequest($url, $content, $username = null, $password = null, $company_name = null)
    {

        if (empty($username)) {
            $username = $this->user_name;
        }
        if (empty($password)) {
            $password = $this->hmac;
        }

        if (empty($content)) {
            $error = array(
                'error' => 'Invalid Request: No data specified.',
            );
            return json_encode($error);
        }

        $client = new \GuzzleHttp\Client($this->prepareAuthDetails($url, $username, $password, $company_name));

        $body['username'] = $this->user_name;
        $body['password'] = $this->password;
        $body['company_name'] = $this->company_name;

        $response = $client->request('PUT', $url, ['body' => json_encode($body)]);

        if ($client->isSuccess()) {
            return (string) $response->getBody();
        } else {
            return null;
        }
    }

    /**
     * Show a list of all available users.
     *
     * @return boolean
     */
    private function recordApiUser($user_id, $username, $password, $company_name, $company_id, $primary_role)
    {
        // Check if user exists in db by user_id
        // dd($username);
        if (User::where('user_id', $user_id)->count() === 1) {
            // User exists, update the user's data if changed

            $existingUser = User::where('user_id', $user_id)->first();

            if ($company_id !== $existingUser->company_id) {
                $existingUser->company_id = $company_id;
            }

            if ($username !== $existingUser->username) {
                $existingUser->username = $username;
            }

            if ($company_name !== $existingUser->company_name) {
                $existingUser->company_name = $company_name;
            }

            if ($primary_role !== $existingUser->primary_role) {
                $existingUser->primary_role = $primary_role;
            }

            $existingUser->save();

            return User::where('user_id', $user_id)->orderBy('updated_at', 'desc')->first();

        } else {
            // User does not exist, creating new user ...

            $newUser = new User;
            $newUser->user_id = $user_id;
            $newUser->username = $username;
            $newUser->password = $password;
            $newUser->company_name = $company_name;
            $newUser->company_id = $company_id;
            $newUser->primary_role = $primary_role;

            $saved = $newUser->save();

            return $newUser;
        }

    }

    /**
     */
    public function authenticateUser($username, $password, $company_name)
    {

        $apiResponse = $this->IssueGETRequest(API_URL . '/auth', $username, $password, $company_name);

        $apiResponse = collect(json_decode($apiResponse));

        if (!$apiResponse->isEmpty()) {

            $user = collect($apiResponse->get('user'));

            $user_id = $user->get('user_id');

            //check on employee status
            if (!empty($user_id) && $user->get('active') === true) {

                $primary_role = collect($user->get('employee'))->get('primary_role');
                $company_id = collect($user->get('company'))->get('company_id');
                $permissions = collect($user->get('permissions'))->toJson();

                // Store permissions in session
                session()->put('permissions', $permissions);

                // Create record for this user in frontend's database
                return array('authentiactedUser' =>
                    $this->recordApiUser($user_id, $username, Hash::make($password), $company_name, $company_id, $primary_role),
                    'apiHash' => $this->passwordHash);

            } else {

                return null;

            }

        } else {

            return null;

        }

    }

}
