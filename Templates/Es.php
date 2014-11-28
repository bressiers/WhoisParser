<?php
/**
 * Novutec Domain Tools
 * 
 * Licensed under the Apache License, Version 2.0 (the "License");
 * you may not use this file except in compliance with the License.
 * You may obtain a copy of the License at
 * http://www.apache.org/licenses/LICENSE-2.0
 * 
 * Unless required by applicable law or agreed to in writing, software
 * distributed under the License is distributed on an "AS IS" BASIS,
 * WITHOUT WARRANTIES OR CONDITIONS OF ANY KIND, either express or implied.
 * See the License for the specific language governing permissions and
 * limitations under the License.
 *
 * @category   Novutec
 * @package    DomainParser
 * @copyright  Copyright (c) 2007 - 2013 Novutec Inc. (http://www.novutec.com)
 * @license    http://www.apache.org/licenses/LICENSE-2.0
 */

/**
 * @namespace Novutec\WhoisParser\Template
 */
namespace Novutec\WhoisParser\Template;

use Novutec\WhoisParser\Template\Type\Regex;

/**
 * Template for .ES
 *
 * @category   Novutec
 * @package    WhoisParser
 * @copyright  Copyright (c) 2007 - 2013 Novutec Inc. (http://www.novutec.com)
 * @license    http://www.apache.org/licenses/LICENSE-2.0
 */
class Es extends Regex
{

    /**
	 * Blocks within the raw output of the whois
	 * 
	 * @var array
	 * @access protected
	 */
    protected $blocks = array(1 => '/domain name:(?>[\x20\t]*)(.*?)(?=registrant:)/is', 
            2 => '/registrant name:(?>[\x20\t]*)(.*?)(?=domain servers)/is', 
            3 => '/domain servers:(?>[\x20\t]*)(.*?)(?=\>\>\> last update)/is');

    /**
	 * Items for each block
	 * 
	 * @var array
	 * @access protected
	 */
    protected $blockItems = array(
            1 => array('/creation date:(?>[\x20\t]*)(.+)$/im' => 'created', 
                    '/expiration date:(?>[\x20\t]*)(.+)$/im' => 'expires'), 
            2 => array('/registrant name:(?>[\x20\t]*)(.+)$/im' => 'contacts:owner:name'), 
            3 => array('/name server [0-9]:(?>[\x20\t]*)(.+)$/im' => 'nameserver', 
                    '/ipv4 server [0-9]:(?>[\x20\t]*)(.+)$/im' => 'ips'));

    /**
     * RegEx to check availability of the domain name
     *
     * @var string
     * @access protected
     */
    protected $available = '/there is no information available on/i';
}