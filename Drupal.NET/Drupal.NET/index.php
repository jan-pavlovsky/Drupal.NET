<?php

/**
 * @file
 * The PHP page that serves all page requests on a Drupal installation.
 *
 * All Drupal code is released under the GNU General Public License.
 * See COPYRIGHT.txt and LICENSE.txt files in the "core" directory.
 */

use Drupal\Core\DrupalKernel;
use Symfony\Component\HttpFoundation\Request;

echo "Drupal.NET index start\n";

//$autoloader = require_once 'autoload.php';
//Replaced:

$autoloader = ComposerAutoloaderInitDrupal8::getLoader();

echo "1\n";

$kernel = new DrupalKernel('prod', $autoloader);

echo "2\n";

$request = Request::createFromGlobals();
$response = $kernel->handle($request);
$response->send();

$kernel->terminate($request, $response);
