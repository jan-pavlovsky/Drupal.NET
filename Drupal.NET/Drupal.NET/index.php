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

include 'test.php';
echo "Drupal.NET index start\n";

require_once 'autoload.php';
//Replaced:

print(class_exists('ComposerAutoloaderInitDrupal8'));

$autoloader = ComposerAutoloaderInitDrupal8::getLoader();

//print_r($autoloader);
$kernel = new DrupalKernel('prod', $autoloader);

require __DIR__ . '/core/lib/Drupal/Core/DrupalKernel.php';

print(class_exists('Drupal\Core\DrupalKernel'));
print(class_exists('core\Drupal\Core\DrupalKernel'));

$kernel = new DrupalKernel('prod', $autoloader);

$request = Request::createFromGlobals();
$response = $kernel->handle($request);
$response->send();

$kernel->terminate($request, $response);
