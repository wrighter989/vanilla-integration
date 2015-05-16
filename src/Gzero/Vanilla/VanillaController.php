<?php namespace Gzero\Vanilla;

use Illuminate\Auth\AuthManager;
use \Illuminate\Routing\Controller;
use Illuminate\Support\Facades\Input;

/**
 * This file is part of the GZERO CMS package.
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 *
 * Class VanillaController
 *
 * @package    Gzero\Vanilla
 * @author     Adrian Skierniewski <adrian.skierniewski@gmail.com>
 * @copyright  Copyright (c) 2014, Adrian Skierniewski
 */
class VanillaController extends Controller {

    /**
     * @var AuthManager
     */
    private $auth;

    /**
     * @param AuthManager $auth
     */
    public function __construct(AuthManager $auth)
    {
        $this->auth = $auth;
    }


    /**
     *
     */
    public function index()
    {
        \Debugbar::disable();
        $clientID = \Config::get('vanilla-integration::client_id');
        $secret   = \Config::get('vanilla-integration::secret');
        $user     = [];
        if ($this->auth->check()) {
            $currentUser      = $this->auth->user();
            $user['uniqueid'] = $currentUser->id;
            $user['name']     = $currentUser->firstName . ' ' . $currentUser->lastName;
            $user['email']    = $currentUser->email;
        }
        // Generate the jsConnect string.
        // This should be true unless you are testing.
        // You can also use a hash name like md5, sha1 etc which must be the name as the connection settings in Vanilla.
        $secure = true;
        WriteJsConnect($user, Input::only(['client_id', 'signature', 'callback', 'timestamp']), $clientID, $secret, $secure);
    }
}
