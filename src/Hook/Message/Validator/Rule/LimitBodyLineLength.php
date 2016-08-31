<?php
/**
 * This file is part of HookMeUp.
 *
 * (c) Sebastian Feldmann <sf@sebastian.feldmann.info>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */
namespace HookMeUp\App\Hook\Message\Validator\Rule;

use HookMeUp\App\Git\CommitMessage;

/**
 * Class LimitBodyLineLength
 *
 * @package HookMeUp
 * @author  Sebastian Feldmann <sf@sebastian-feldmann.info>
 * @link    https://github.com/sebastianfeldmann/hookmeup
 * @since   Class available since Release 0.9.0
 */
class LimitBodyLineLength extends Base
{
    /**
     * Length limit
     *
     * @var int
     */
    protected $maxLength;

    /**
     * Constructor.
     *
     * @param int $length
     */
    public function __construct($length = 72)
    {
        $this->hint      = 'Body lines should not exceed ' . $length . ' characters';
        $this->maxLength = $length;
    }

    /**
     * Check if a body line doesn't exceed the max length limit.
     *
     * @param  \HookMeUp\App\Git\CommitMessage $msg
     * @return bool
     */
    public function pass(CommitMessage $msg)
    {
        $lineNr = 1;
        foreach ($msg->getBodyLines() as $line) {
            if (strlen($line) > $this->maxLength) {
                $this->hint .= PHP_EOL . 'Line ' . $lineNr . ' of your body exceeds the max line length';
                return false;
            }
            $lineNr++;
        }
        return true;
    }
}
