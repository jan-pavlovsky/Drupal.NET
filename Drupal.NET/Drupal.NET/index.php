 , <?php

/**
 * @file
 * The PHP page that serves all page requests on a Drupal installation.
 *
 * All Drupal code is released under the GNU General Public License.
 * See COPYRIGHT.txt and LICENSE.txt files in the "core" directory.
 */

use Drupal\Core\DrupalKernel;
use Symfony\Component\HttpFoundation\Request;

require_once 'autoload.php';
//Replaced in PeachPie version of Autoloader

if(class_exists('ComposerAutoloaderInitDrupal8')) {
    $autoloader = ComposerAutoloaderInitDrupal8::getLoader();
} else {
    echo "Composer Autoloader for Drupal not included";
} 

//print_r($autoloader);
$kernel = new DrupalKernel('prod', $autoloader);

$request = Request::createFromGlobals();
$response = $kernel->handle($request);
$response->send();

$kernel->terminate($request, $response);
