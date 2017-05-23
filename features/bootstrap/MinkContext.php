<?php

/*
 * This file is part of the Behat MinkExtension.
 * (c) Konstantin Kudryashov <ever.zet@gmail.com>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace PantheonSystems\PantheonWordPressUpstreamTests\Behat;

use Behat\Behat\Context\TranslatableContext;
use Behat\Gherkin\Node\TableNode;
use Behat\MinkExtension\Context\MinkContext as BehatMinkContext;


class MinkContext extends BehatMinkContext {

  /**
   * Build URL, based on provided path.
   *
   * @param string $path Relative or absolute URL.
   * @return string
   */
  public function locatePath($path)
  {
    if (strtolower(substr($path, 0, '4')) === 'http') {
      return $path;
    }
    $ext = pathinfo($path, PATHINFO_EXTENSION);
    $url = $this->getMinkParameter('base_url');
    if (strpos($path, 'wp-admin') !== false || in_array($ext, ['htm', 'html', 'md', 'php', 'txt'], true)) {
      $url = $url . 'wp';
    }
    return rtrim($url, '/') . '/' . ltrim($path, '/');
  }


}
