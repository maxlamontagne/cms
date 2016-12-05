<?php
/**
 * @link      https://craftcms.com/
 * @copyright Copyright (c) Pixel & Tonic, Inc.
 * @license   https://craftcms.com/license
 */
namespace craft\mail\transportadapters;

/**
 * Sendmail implements a Sendmail transport adapter into Craft’s mailer.
 *
 * @author Pixel & Tonic, Inc. <support@pixelandtonic.com>
 * @since  3.0
 */
class Sendmail extends BaseTransportAdapter
{
    // Static
    // =========================================================================

    /**
     * @inheritdoc
     */
    public static function displayName()
    {
        return 'Sendmail';
    }

    // Public Methods
    // =========================================================================

    /**
     * @inheritdoc
     */
    public function getTransportConfig()
    {
        return [
            'class' => 'Swift_SendmailTransport',
        ];
    }
}
