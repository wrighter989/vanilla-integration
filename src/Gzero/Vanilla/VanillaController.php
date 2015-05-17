<?php namespace Gzero\Vanilla;

use Illuminate\Auth\AuthManager;
use Illuminate\Config\Repository;
use Illuminate\Routing\Controller;
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

    private $config;

    /**
     * @param AuthManager $auth
     */
    public function __construct(AuthManager $auth, Repository $config)
    {
        $this->auth   = $auth;
        $this->config = $config;
    }


    /**
     * Connect method. It's returning jsonp response
     */
    public function index()
    {
        $refererDomain = parse_url(\Request::server('HTTP_REFERER'), PHP_URL_HOST);
        if ($refererDomain === $this->config->get('vanilla-integration::forum_domain')) {
            \Debugbar::disable();
            $clientID = $this->config->get('vanilla-integration::client_id');
            $secret   = $this->config->get('vanilla-integration::secret');
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
            return '';
        } else {
            return \App::abort(404);
        }
    }
}
